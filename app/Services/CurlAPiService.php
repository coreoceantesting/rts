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

        return $response;
    }
}
