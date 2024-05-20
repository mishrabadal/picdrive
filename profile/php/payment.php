
<?php
$product_name = $_POST["product_name"] ;
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["mobile"];
$email = $_POST["email"];
require("../../instamojo/Instamojo.php");


$api = new Instamojo\Instamojo('test_0b568d8402be0425490758fb7b3', 'test_89a3af615042e1dbbd71e748c82','https://test.instamojo.com/api/1.1/');

try {
      $response = $api->paymentRequestCreate(array(
      "purpose" => "pic drive plan",
      "amount" => 10,
      
      "phone" => $phone,
      "send_email" => true,
      "send_sms" => true,
      "email" => $email,
      'allow_repeated_payments' => false,
      "redirect_url" => "https://djtechblog.com/payments/thankyou.php",
      "webhook" => "https://djtechblog.com/payments/webhook.php"
      ));

  $pay_ulr = $response['longurl'];
  


  header("Location: $pay_ulr");
  exit();

}
catch (Exception $e) {
  print('Error: ' . $e->getMessage());
}

?>
       
