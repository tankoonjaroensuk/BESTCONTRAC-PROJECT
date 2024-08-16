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
require_once("../condb.php");
session_start();

$email = $_POST['email'];
$old_password = $_POST['password'];
$new_password = $_POST['npassword'];

$result = $conn->query("SELECT * FROM `userprofile` WHERE `email` = '{$email}' ");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row['password'];
    $stored_password = base64_decode($stored_password);

    if ($stored_password != $new_password && $old_password == $stored_password) {

        $hashed_password = base64_encode($new_password);

        $conn->query("UPDATE `userprofile` SET `password` = '{$hashed_password}' WHERE `email` = '{$email}' ");

        // echo "Password updated successfully!"
        echo "<script>Swal.fire({
            title: 'Reset Password Sussess!',
            text: 'You will be redirected to another page!',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay You Bet win !'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../login.php';
            }
        })</script>";
        ;
    } else {
        echo "<script>Swal.fire({
            title: 'Incorrect old password!',
            text: 'No',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay You Bet win !'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../resetpassword.php';
            }
        })</script>";
    }
} else {
   
    echo "<script>Swal.fire({
        title: 'Email  not found!',
        text: 'Email Invalid, Please Try Again.',
        icon: 'question',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Okay You Bet win !'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../resetpassword.php';
        }
    })</script>";

}

$conn->close();
?>
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
