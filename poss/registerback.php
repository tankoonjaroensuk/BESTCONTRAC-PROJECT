<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contrac</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/css/back.css">

</head>
</html>
<?php
require_once("../condb.php");
if (isset($_POST["submit"])) {
    $user = 'user';
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = base64_encode($_POST["password"]);
    $phone = $_POST["phone"];
   

    $stmt = $conn->prepare("INSERT INTO userprofile (`fname`,`lname`,`email`,`password`,`phone`,`user_type`) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $fname, $lname, $email, $password, $phone,$user);
    $stmt->execute();
    $stmt->close();
        if ($stmt) {
            echo "<script>Swal.fire({
                title: 'Welcome to Best Contrac',
                text: 'You will be redirected to another page!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay You Bet win !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../login.php';
                }
            })</script>";
        }
        else  {
            echo "<script>Swal.fire({
                title: 'Register Failed',
                text: 'Email Or Password Invalid, Please Try Again.',
                 icon: 'error',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Back'
            }).then((result) => {
                if (result.isConfirmed) {
                    refrechrate = 0;
                     window.location.href = '../login.php';
                 }
             })</script>";
        }
}
?>