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
    $user = 'contractor';
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = base64_encode($_POST["password"]);
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $bname = $_POST["bname"];
    $citizen = $_POST["citizen_id"];

    function Validate($citizenID)
    {
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

    if(Validate($citizen) == "TRUE"){

        $citizen = base64_encode($citizen);

        $check = $conn -> query("SELECT * FROM userprofile WHERE citizen_id = '{$citizen}' ");

        if(mysqli_num_rows($check) == 0){
            $stmt = $conn->prepare("INSERT INTO userprofile (`fname`,`lname`,`email`,`password`,`phone`,`user_type`,`bname`,`address`,`zipcode`,`state`,`citizen_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssssssss', $fname, $lname, $email, $password, $phone, $user, $bname, $address, $zipcode, $state, $citizen);
        
            $stmt->execute();
            $stmt->close();
            // $stmt = $conn -> query("INSERT INTO `userprofile`(`fname`, `lname`, `email`, `phone`, `password`) VALUES ('{$fname}','{$lname}','{$email}','{$phone}','{$password}')");
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
        }else{
            // echo "citizenID already";
            echo "<script>Swal.fire({
            title: 'Register Failed',
            text: 'The ID card number has already been used.',
             icon: 'error',
             confirmButtonColor: '#B20C01',
             confirmButtonText: 'Back'
        }).then((result) => {
            if (result.isConfirmed) {
                refrechrate = 0;
                 window.location.href = '../registercon.php';
             }
         })</script>";
        }


    }else{
        #  alert
        echo "<script>Swal.fire({
            title: 'Register Failed',
            text: 'Wrong citizen, Please Try Again.',
             icon: 'error',
             confirmButtonColor: '#B20C01',
             confirmButtonText: 'Back'
        }).then((result) => {
            if (result.isConfirmed) {
                refrechrate = 0;
                 window.location.href = '../registercon.php';
             }
         })</script>";    }
     // change page link to page phone send OTP Value before login ???

    // if (mysqli_num_rows($result) == 1) { 
    //     header("Location: ../index.php");
    // } else {
    //     echo "<script>alert('ล็อคอินไม่สำเร็จ')</script>";
    //     header("Location: ../login.php");
    // }
}
