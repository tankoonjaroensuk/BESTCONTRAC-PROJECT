<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="/image/best_contrac_Logo-website.png" type="png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/css/back.css">
</head>
<body>
    
</body>
<?php
    session_start();
    require_once '../vendor/autoload.php';
    use Twilio\Rest\Client;
    $sid    = "ACdce609ea2032ca66543c0fae7fc0ab11";
    $token  = "cddcc94fc6d8a46115bda51686e1f7d4";
    $twilio = new Client($sid, $token);

    function formatNumberThai($number) {
        if(strpos($number,"0") === 0){
            $formatterNumber = '+66' . substr($number,1);
        }else{
            $formatterNumber = $number;
        }
        return $formatterNumber ;
    }

    $phone = formatNumberThai($_POST['phone']);

    $otp = rand(100000,999999);
    $_SESSION['phoneOtp'] = $otp;
    $fullname = $_SESSION['fname']." ".$_SESSION['lname'];

    $message = $twilio->messages
      ->create($phone, // to
        array(
          "from" => "+15165709540",
          "body" => "Hello {$fullname},<br>
          Please use the following One Time Password(OTP) {$otp} 
          Thank you,
          Best Contrac Team"
        )
      );

header("Location: ../otp-phone.php ");




?>


