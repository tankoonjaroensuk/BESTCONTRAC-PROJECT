<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
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
if (!empty($_GET['id']) && !empty($_GET['action'])) {

   
        $job_id = $_GET['id'];
        $action = $_GET['action']; 

        $sql = "UPDATE booking_list SET action = '$action' WHERE job_id = $job_id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

        header('Location: ../consultation.php');

}
?>