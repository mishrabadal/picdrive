<?php
require("../../instamojo/Instamojo.php");




$api = new Instamojo\Instamojo('test_0b568d8402be0425490758fb7b3', 'test_89a3af615042e1dbbd71e748c82','https://test.instamojo.com/api/1.1/');
// try {
//       $response = $api->paymentRequestCreate(array(
//       "purpose" => $product_name,
//       "amount" => $price,
//       "buyer_name" => $name,
  
//       "send_email" => true,
     
//       "email" => $email,
    
//       "redirect_url" => "https://djtechblog.com/payments/thankyou.php",
      
//       ));

//   $pay_ulr = $response['longurl'];
  


//   header("Location: $pay_ulr");
//   exit();

// }
// catch (Exception $e) {
//   print('Error: ' . $e->getMessage());
// }
try {
    $response = $api->createPaymentRequest(array(
        "purpose" => "FIFA 16",
        "amount" => "3499",
        "send_email" => true,
        "email" => "foo@example.com",
        "redirect_url" => "https://www.google.com/"
        ));
    print_r($response);
    $payment_url = $response['longurl'];
    header("Location:$payment_url ");
}

catch (Exception $e) {
    print('Error: ' . $e->getMessage());
    
}

echo "bgb";
?>