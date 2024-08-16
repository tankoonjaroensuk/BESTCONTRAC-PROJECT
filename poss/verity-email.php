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
</html>


<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../vendor/autoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'joejeddoo@gmail.com';
$mail->Password = 'frevlpppvpsjxjll';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('joejeddoo@gmail.com', 'Best Contrac');

if(isset($_POST['ver-mail'])) {
    $email = $_POST['email'];
    $otpEmail = mt_rand(100000, 999999); 

    // เก็บค่า OTP ใน session เพื่อใช้ในการยืนยันภายหลัง
    $_SESSION['otpEmail'] = $otpEmail;

    $mail->addAddress($email);
    $mail->Subject = 'OTP code for email confirmation';
    $mail->Body = 'รหัส OTP ของคุณคือ: ' . $otpEmail;

    // ส่งอีเมล
    if (!$mail->send()) {
        echo  "<script>Swal.fire({
            title: 'Email  not found!',
            text: 'Email address not found, Please Try Again.',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Try Again'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../personaupdate.php';
            }
        })</script>";
    } else {
        header("Location: ../otp-email.php ");
    }
}

?>
