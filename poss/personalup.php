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
session_start(); // เรียกใช้ session_start()

if (isset($_POST["submit"])) {

    function Validate($citizenID) {
        $id_digits = str_split(str_replace('-', '', $citizenID));
        if (count($id_digits) !== 13) {
            return "FALSE";
        }
        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $sum += (int)$id_digits[$i] * (13 - $i);
        }
        $check_digit = (11 - ($sum % 11)) % 10;
        if ($check_digit != $id_digits[12]) {
            return "FALSE";
        } else {
            return "TRUE";
        }
    }

    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $citizen_id = $_POST["citizen"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    

    if(Validate($citizen_id) == "TRUE"){
    $citizen_id = base64_encode($citizen_id);
    $query = $conn -> query("UPDATE `userprofile`
                            SET `fname` =\"{$fname}\",`lname`=\"{$lname}\" ,`address`=\"{$address}\",`zipcode`=\"{$zipcode}\",`state`=\"{$state}\",`citizen_id`=\"{$citizen_id}\" 
                            WHERE `user_id` = \"{$_SESSION['id']}\" ");
        if($query) {
            echo "<script>Swal.fire({
                title: 'Profile Updated',
                text: 'Your profile has been successfully updated!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay You Bet win !'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to another page if needed
                    window.location.href = '../personaupdate.php';
                }
            });</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Profile Updated',
                text: 'Updated Failed',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Try again'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to another page if needed
                    window.location.href = '../personaupdate.php';
                }
            });</script>";
        }
    }else{
        echo "<script>Swal.fire({
            title: 'Updated Failed',
            text: 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Try again'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to another page if needed
                window.location.href = '../personaupdate.php';
            }
        });</script>";
    }
    if($query) {
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['citizen'] = $citizen;
        $_SESSION['address'] = $address;
        $_SESSION['state'] = $state;
        $_SESSION['zipcode'] = $zipcode;
        
    }
}

if(isset($_POST["update-email"])) {
    
}
?>
