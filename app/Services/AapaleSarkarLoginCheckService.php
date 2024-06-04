<?php

namespace App\Services;

class AapaleSarkarLoginCheckService
{
    // function to decrypt data
    function decryptTripleDES($data, $strKey, $strIV)
    {
        $key = utf8_decode($strKey);
        $iv = utf8_decode($strIV);
        $data = hex2bin($data);

        $decrypted = openssl_decrypt($data, "des-ede3-cbc", $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);

        return rtrim($decrypted, "\0");
    }

    // function to generate checksum value
    function generateCheckSumValue($reqStr)
    {
        $bytes = str_split($reqStr);
        $crc32 = crc32($reqStr);

        return sprintf("%u", $crc32);
    }

    function encryptTripleDES($data, $strKey, $strIV)
    {
        // Convert strings to bytes
        $key = mb_convert_encoding($strKey, 'ASCII');
        $iv = mb_convert_encoding($strIV, 'ASCII');
        $data = mb_convert_encoding($data, 'ASCII');

        // Pad the data to be a multiple of the block size
        $blockSize = 8; // TripleDES block size is 8 bytes
        $padding = $blockSize - (strlen($data) % $blockSize);
        $data = $data . str_repeat(chr($padding), $padding);

        // Encrypt the data
        $enc = openssl_encrypt($data, 'des-ede3-cbc', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);

        // Convert the encrypted data to a hexadecimal string
        $encHex = bin2hex($enc);

        return $encHex;
    }

    // function to check aapale sarkar data is proper and send request to aapale sarkar for get user data with status
    function checkDecryptData($soapEndpoint, $soapAction, $checkSumKey, $clientCode, $encryptedData, $strKey, $strIV)
    {
        $decryptedText = $this->decryptTripleDES($encryptedData, $strKey, $strIV);

        $rowData = explode('|', $decryptedText);
        $usrId = $rowData[0];
        $usrTimeStamp = $rowData[1];
        $usrSession = $rowData[2];
        $clientCheckSumValue = $rowData[3];
        $strServiceCookie = $rowData[4];

        $formattedString = sprintf("%s|%s|%s|%s|%s", $usrId, $usrTimeStamp, $usrSession, $checkSumKey, $strServiceCookie);

        $caluculatedCheckSumValue = $this->generateCheckSumValue($formattedString);
        // check the client provided checksum key and generated checksum key is equal or not
        if ($clientCheckSumValue == $caluculatedCheckSumValue) {
            // generate soap xml request to send the data for user request
            $requestXml = '<?xml version="1.0" encoding="utf-8"?>
                <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                    xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                    <soap12:Body>
                        <GetParameterNew xmlns="http://tempuri.org/">
                            <EncyKey>' . $encryptedData . '</EncyKey>
                            <DeptCode>' . $clientCode . '</DeptCode>
                        </GetParameterNew>
                    </soap12:Body>
                </soap12:Envelope>';


            // Set up the SOAP client
            $options = array(
                'uri' => $soapEndpoint,
                'location' => $soapEndpoint,
                'trace' => 1,
            );

            // call the soap client class provided by php
            $client = new \SoapClient(null, $options);

            // Make the SOAP request
            $response = $client->__doRequest($requestXml, $soapEndpoint, $soapAction, SOAP_1_2);


            // Load the XML string
            $doc = new \DOMDocument();
            $doc->loadXML($response);

            // Use XPath to extract the value of GetParameterNewResult
            $xpath = new \DOMXPath($doc);
            $xpath->registerNamespace("soap", "http://www.w3.org/2003/05/soap-envelope");
            $xpath->registerNamespace("ns", "http://tempuri.org/");

            // Query for the GetParameterNewResult element
            $result = $xpath->query("//soap:Body/ns:GetParameterNewResponse/ns:GetParameterNewResult");

            if ($result->length > 0) {
                $val = $result->item(0)->nodeValue;
                // Convert the string to hexadecimal
                $requestDecryStr = $this->decryptTripleDES($val, $strKey, $strIV);

                $xml = simplexml_load_string($requestDecryStr);

                // Convert the SimpleXMLElement to an array
                $decryptedArrayData = json_decode(json_encode($xml), true);
                return [true, $decryptedArrayData];
            } else {
                return [false];
            }
        } else {
            return [false];
        }
    }


    // function to send request to aapale sarkar
    function sendRequestToAapaleSarkar($soapEndpoint, $soapAction, $strKey, $strIV, $encryptedKey, $clientCode)
    {
        // generate soap xml request to send the data for user request
        $requestXml = '<?xml version="1.0" encoding="utf-8"?>
            <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
              <soap12:Body>
                <SetAppStatus xmlns="http://tempuri.org/">
                    <EncyKey>' . $encryptedKey . '</EncyKey>
                    <DeptCode>' . $clientCode . '</DeptCode>
                </SetAppStatus>
              </soap12:Body>
            </soap12:Envelope>';


        // Set up the SOAP client
        $options = array(
            'uri' => $soapEndpoint,
            'location' => $soapEndpoint,
            'trace' => 1,
        );

        // call the soap client class provided by php
        $client = new \SoapClient(null, $options);

        // Make the SOAP request
        $response = $client->__doRequest($requestXml, $soapEndpoint, $soapAction, SOAP_1_2);

        // Load the XML string
        $doc = new \DOMDocument();
        $doc->loadXML($response);

        // Use XPath to extract the value of GetParameterNewResult
        $xpath = new \DOMXPath($doc);
        $xpath->registerNamespace("soap", "http://www.w3.org/2003/05/soap-envelope");
        $xpath->registerNamespace("ns", "http://tempuri.org/");

        // Query for the GetParameterNewResult element
        $result = $xpath->query("//soap:Body/ns:SetAppStatusResponse/ns:SetAppStatusResult");

        if ($result->length > 0) {
            $val = $result->item(0)->nodeValue;
            // Convert the string to hexadecimal
            $requestDecryStr = $this->decryptTripleDES($val, $strKey, $strIV);

            $xml = simplexml_load_string($requestDecryStr);

            // Convert the SimpleXMLElement to an array
            $decryptedArrayData = json_decode(json_encode($xml), true);
            return [true, $decryptedArrayData];
        } else {
            return [false];
        }
    }


    // function to send get request using curl
    function validateAapaleSarkarPayment($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }
}
