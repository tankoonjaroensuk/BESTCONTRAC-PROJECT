<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/back.css">
    
</head>

<body>

</body>

</html>

<?php
session_start();
session_destroy();

echo "<script>Swal.fire({
     title: 'Log out Success',
     text: 'Thank You For Support',
     icon: 'success',
     confirmButtonColor: '#B20C01',
     confirmButtonText: 'Back'
 }).then((result) => {
     if (result.isConfirmed) {
         window.location.href = './login.php';
     }
 })</script>";
?>