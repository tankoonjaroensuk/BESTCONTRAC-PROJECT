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

// รับข้อมูลจากฟอร์ม
$userEmail = $_POST['semail']; 
$userName = $_POST['sname']; 
$message = $_POST['smessage']; 

// ตั้งค่าผู้ส่ง
$mail->setFrom('your-email@gmail.com', $userName); 
$mail->addReplyTo($userEmail, $userName); 


$mail->addAddress('jaroensuktankoon@gmail.com', 'Best Contrac'); 


$mail->isHTML(true);
$mail->Subject = 'New message from ' . $userName;
$mail->Body    = '<h1>Thank you for your questions and comments.</h1>' . nl2br($message) . '<br><h3>Best regards</h3><h5>Best Contrac</h5>';
$mail->AltBody = strip_tags($message);


try {
    $mail->send();
    echo "<script>Swal.fire({
        title: 'ได้รับเมลล์จากท่านแล้ว',
        text: 'Thank you',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../index.php';
        }
    })</script>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>
