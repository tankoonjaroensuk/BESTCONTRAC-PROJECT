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
session_start();

require_once("../condb.php"); {

    if (isset($_POST['add_work'])) {

        $query = $conn->query("SELECT * FROM `work_information` WHERE `work_con` = '{$_SESSION['id']}' ");

        $work_name = $_POST['w_name'];
        $work_detail = $_POST['w_detail'];
        $district = $_POST['w_district'];
        $startDate = new DateTime($_POST['start-date']);
        $endDate = new DateTime($_POST['end-date']);
        $interval = $startDate->diff($endDate);
        $duration = $interval->days;
        $days = $interval->days;

        date_default_timezone_set('Asia/Bangkok');
        $time = date('Y/m/d H:i:s');
        $time2 = date('YmdHis');

        $allowedex = array('png', 'jpeg', 'jpg');

        $newname = ['w_image'];

        if ($_FILES['w_image']['size'] != 0) {
            $name = $_FILES['w_image']['name'];
            $fileexit = pathinfo($name, PATHINFO_EXTENSION);
            if (in_array($fileexit, $allowedex)) {
                $newname = $_SESSION['id'] . '_work-contractor_' . $time2 . '.' . $fileexit;
                $task1 = move_uploaded_file($_FILES["w_image"]["tmp_name"], "../image_work/" . $newname);
            } else {
                echo "<script>
                    Swal.fire(
                        'ผิดพลาด!',
                        'ไม่สามารถบันทึกข้อมูลได้ นามสกุลไฟล์ไม่ถูกต้อง',
                        'error'
                    )
                    </script>";
            }
            
            $stmt = $conn->prepare("INSERT INTO `work_information`(`work_con`,`w_name`,`w_detail`,`w_province`,`w_district`,`w_image`) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('ssssss', $_SESSION['id'], $work_name, $work_detail, $days, $district, $newname,);
            $stmt->execute();
            $stmt->close();

            if ($stmt) {
                echo "<script>Swal.fire({
                        title: 'Create Profile Success!',
                        text: 'data information Success !',
                         icon: 'success',
                         confirmButtonColor: '#B20C01',
                         confirmButtonText: 'Go To website'
                    }).then((result) => {
                        if (result.isConfirmed) {
                             window.location.href = '../indexcontrac.php';
                         }
                     })</script>";
            } else {
                echo "<script>Swal.fire({
                        title: 'Create Profile Failed!',
                        text: ' Please Try Again.',
                         icon: 'error',
                         confirmButtonColor: '#B20C01',
                         confirmButtonText: 'Back'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            refrechrate = 0;
                             window.location.href = '../crud-member.php';
                         }
                     })</script>";
            }
        }
    }
}
?>