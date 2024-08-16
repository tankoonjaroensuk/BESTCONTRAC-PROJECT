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
if (isset($_POST["submit"])) {
    
    $query = $conn->query("SELECT * FROM `booking_list` WHERE `user_id` = '{$_SESSION['id']}' ");
    $con_id = $_GET['con_id'];
    $date_components = explode('/', $_POST['date']);
    $formatted_date = $date_components[2] . '-' . $date_components[0] . '-' . $date_components[1];
    $size = $_POST['place-size'];
    $time = $_POST['time'];
    $time_with_seconds = $time . ":00";
    $b_type = 1;
    
    date_default_timezone_set('Asia/Bangkok');
    // $time = date('m/d/Y H:i:s');
    $time2 = date('YmdHis');
  
    $allowedex = array('pdf');

    if ($_FILES['pdf-1']['size'] != 0) {
        $name = $_FILES['pdf-1']['name'];
        $exs = pathinfo($name, PATHINFO_EXTENSION);
    
        if ($exs == 'pdf' && in_array($exs, $allowedex)) {
            $newname = $_SESSION['id'] . '_' . $time2 . '.' . $exs;
            $task1 = move_uploaded_file($_FILES["pdf-1"]["tmp_name"], "../file/" . $newname);
            $query = $conn->query("INSERT INTO `booking_list`(`user_id`,`con_id`,`job_db`, `bdate`, `l_size`, `btime`,`b_type`) VALUES ('$_SESSION[id]','$con_id','$newname', '$formatted_date', '$size', '$time_with_seconds' , '$b_type')");
            
            $select = $conn->query("SELECT `job_id` FROM `booking_list` WHERE `job_db` = '{$newname}' AND `con_id` = '{$con_id}' ");
            $fetch = mysqli_fetch_assoc($select);

        } else {
            echo "<script>
                Swal.fire(
                    'ผิดพลาด!',
                    'ไม่สามารถบันทึกข้อมูลได้ ไฟล์ต้องเป็น PDF เท่านั้น',
                    'error'
                )
                </script>";
        }
    }
    echo "<script>Swal.fire({
        title: 'Booking Sussess!',
        text: 'การจองเข้าปรึกษาของจะท่านถูกส่งไปถึงผู้รับเหมาหลังกดยืนยัน ',
         icon: 'success',
         confirmButtonColor: '#B20C01',
         confirmButtonText: 'Go To website'
    }).then((result) => {
        if (result.isConfirmed) {
             window.location.href = '../bookingsuccess1.php?job_id={$fetch['job_id']}';
         }
     })</script>"
     ;
}

?>