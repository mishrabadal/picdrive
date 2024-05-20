<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_0b568d8402be0425490758fb7b3zz",
                  "X-Auth-Token:test_89a3af615042e1dbbd71e748c82"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://localhost/pic_drive/redirect.php/',
    'send_email' => true,
   
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
//$response = json_decode($response);
echo '<pre>';
$red = $response['longurl'];
// header("Location:https://test.instamojo.com/@badalkumarmishra988/?ref=preview");
print_r($response);


?>