<?php

function send($text) {

    $endpoint = 'https://api.cognitive.microsofttranslator.com/';
    $subscriptionKey = '';
    $path = "translate?api-version=3.0";
    $url = $endpoint . $path . "&to=uk";

    $headers = [
        "Content-Type: application/json",
        "Ocp-Apim-Subscription-Key: $subscriptionKey",
        // Укажите регион, если требуется
        "Ocp-Apim-Subscription-Region: westeurope"
    ];

    $body = json_encode([
        ['Text' => $text]
    ]);

    if (!function_exists('curl_init')) {
        die("Sorry cURL is not installed!");
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die('Ошибка CURL: ' . curl_error($ch));
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode !== 200) {
        die("HTTP Error: $httpCode. Response: $response");
    }

    curl_close($ch);

    $responseData = json_decode($response, true);
    $text = $responseData[0]['translations'][0]['text'];
    return $text;
}