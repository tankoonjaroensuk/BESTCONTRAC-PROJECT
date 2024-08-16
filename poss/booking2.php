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

if (isset($_POST["submit2"])) {

    $job_id = $_POST['job_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $placeSize = $_POST['place-size'];
    $conType = $_POST['type'];


    $query = "UPDATE `booking_list` SET `bdate_2` = ? , `btime_2` = ? , `l_size2` = ? , `con_type2` = ? WHERE `job_id` = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssssi", $date, $time, $placeSize, $conType, $job_id);

        if ($stmt->execute()) {
            echo "<script>Swal.fire({
                title: 'จองการปรึกษารอบ 2 สำเร็จ',
                text: 'booking successfully!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../bookingsuccess2.php';
                }
            });</script>";
          
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();


}
?>

