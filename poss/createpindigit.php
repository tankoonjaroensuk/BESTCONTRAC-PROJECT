<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
    <link rel="website icon" href="/image/best_contrac_Logo-website.png" type="png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/css/back.css">

</head>

<body>

</body>

</html>
<?php

session_start();
require_once("../condb.php");
if (isset($_POST["submit"])) {

    $pin1 = $_POST['pin1'];
    $pin2 = $_POST['pin2'];
    $pin3 = $_POST['pin3'];
    $pin4 = $_POST['pin4'];
    $pin5 = $_POST['pin5'];
    $pin6 = $_POST['pin6']; //ดึงค่า input

    $pin = $pin1 . "" . $pin2 . "" . $pin3 . "" . $pin4 . "" . $pin5 . "" . $pin6 . ""; //ต่อ string 
    $encode = base64_encode($pin); //เข้ารหัส 
    $stmt = $conn->prepare("SELECT * FROM `userprofile` WHERE user_id LIKE ?"); 
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (empty($row["pin_digit"])) {
        $stmt = $conn->prepare(" UPDATE `userprofile` SET pin_digit = '{$encode}' WHERE `user_id` LIKE ? ");
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        // Header("Location: ../index.php"); //first
         if ( $_SESSION['user'] == 'user'){
            // Header("Location: ../index.php");
            echo "<script>Swal.fire({
                title: 'Remember Your Pincode',
                text: 'Pincode For Login ',
                 icon: 'success',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Go To website'
            }).then((result) => {
                if (result.isConfirmed) {
                     window.location.href = '../index.php';
                 }
             })</script>";
    
        } else if ( $_SESSION['user'] == 'contractor') {
            echo "<script>Swal.fire({
                title: 'Remember Your Pincode',
                text: 'Pincode For Login ',
                 icon: 'success',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Go To website'
            }).then((result) => {
                if (result.isConfirmed) {
                     window.location.href = '../indexcontrac.php';
                 }
             })</script>";
        }
    } else {
        if ($row['pin_digit'] == $encode && $_SESSION['user'] == 'user'){
            // Header("Location: ../index.php");
            echo "<script>Swal.fire({
                title: 'Pincode in successfully',
                text: 'Welcome to Best Contrac',
                 icon: 'success',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Go To website'
            }).then((result) => {
                if (result.isConfirmed) {
                     window.location.href = '../index.php';
                 }
             })</script>";
        } 
        
        else if ($row['pin_digit'] == $encode && $_SESSION['user'] == 'contractor') {
            echo "<script>Swal.fire({
                title: 'Pincode in successfully Contractor',
                text: 'Welcome to Best Contrac',
                 icon: 'success',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Go To website'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../indexcontrac.php';
                }
             })</script>";
        }
        else if ($row['pin_digit'] == $encode && $_SESSION['user'] == 'admin') {
            echo "<script>Swal.fire({
                title: 'Pincode in successfully',
                text: 'Admin Page',
                 icon: 'success',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Go To website'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../indexadmin.php';
                }
             })</script>";
        }
        else {
            echo "<script>Swal.fire({
                title: 'Pin Code Failed',
                text: 'Pin Code Invalid, Please Try Again.',
                 icon: 'error',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Back'
            }).then((result) => {
                if (result.isConfirmed) {
                    refrechrate = 0;
                     window.location.href = '../createpindigit.php';
                 }
             })</script>";
        }

        
        
    }
}


?>