<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://test.instamojo.com/api/1.1/payment-requests/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_0b568d8402be0425490758fb7b3",
                  "X-Auth-Token:test_89a3af615042e1dbbd71e748c82"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'https://www.google.com/',
    'send_email' => false,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => false,
    'email' => '',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

echo $response;

?>