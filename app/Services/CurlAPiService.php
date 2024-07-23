<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class CurlAPiService
{
    public function sendPostRequest($data, $url, $files)
    {
        // Initialize cURL session
        $ch = curl_init($url);

        // Initialize post fields
        $postFields = $data;

        // Add the file(s) to the payload if they exist
        if (!empty($files) && count($files) > 0) {
            foreach ($files as $key => $file) {
                if ($file) {
                    // Create a CurlFile instance
                    $postFields[$key] = new \CurlFile($file->getPathname(), $file->getMimeType(), $file->getClientOriginalName());
                }
            }
        }

        // Configure cURL options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            Log::error($error);
        }
        // Close cURL session
        curl_close($ch);
        Log::error($response);
        return $response;
    }

    public function sendPostRequestInObject($data, $url, $object)
    {
        $ch = curl_init($url);

        // Initialize post fields
        if($object && $object != ""){
            $postFields[$object] = $data;
        }else{
            $postFields = $data;
        }
        // Configure cURL options
        $payload = json_encode($postFields);
        // Log::info($payload);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            Log::error($error);
        }
        // Close cURL session
        curl_close($ch);
        // Log::error($response);
        return $response;
    }

    public function convertFileInBase64($file){
        // Get the file contents
        $fileContents = file_get_contents($file->getRealPath());

        // Encode the file contents to a base64 string
        $base64String = base64_encode($fileContents);

        return $base64String;
    }
}
