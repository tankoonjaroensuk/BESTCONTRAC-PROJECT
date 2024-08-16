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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = 'user';
    $ex_year = $_POST['ex_year'];
    $p_amount = $_POST['p_amount'];
    $b_year = $_POST['b_year'];
    $biz_detail = $_POST['biz_detail'];

    $str_skilled = "";
    if (isset($_POST['skilled']) && is_array($_POST['skilled'])) {
        foreach ($_POST['skilled'] as $skill) {
            $str_skilled .= $skill . ","; 
        }
        $str_skilled = rtrim($str_skilled, ","); 
    }

    $query = $conn->query("SELECT * FROM `contractor_information` WHERE `b_name` = '{$_SESSION['id']}' ");
    $fetch = mysqli_fetch_assoc($query);

    date_default_timezone_set('Asia/Bangkok');
    $time2 = date('YmdHis');
    $allowedex = array('png', 'jpg', 'jpeg');
    
    // Default to the existing image name or a placeholder if none exists
    $newname = !empty($fetch['img_intro']) ? $fetch['img_intro'] : "default_image_name.jpg";

    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
        $name = $_FILES['img']['name'];
        $fileexit = pathinfo($name, PATHINFO_EXTENSION);
        if (in_array($fileexit, $allowedex)) {
            $newname = $_SESSION['id'] . '_intro_' . $time2 . '.' . $fileexit;
            move_uploaded_file($_FILES["img"]["tmp_name"], "../intro_image/" . $newname);
        } else {
            echo "<script>
                Swal.fire(
                    'ผิดพลาด!',
                    'ไม่สามารถบันทึกข้อมูลได้ นามสกุลไฟล์ไม่ถูกต้อง',
                    'error'
                )
                </script>";
            exit; // Exit the script to prevent further processing
        }
    }

    if (mysqli_num_rows($query) == 0) {
        $stmt = $conn->prepare("INSERT INTO contractor_information (`b_name`,`ex_year`,`p_amount`,`b_year`,`biz_detail`,`img_intro`,`biz_type`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss', $_SESSION['id'], $ex_year, $p_amount, $b_year, $biz_detail, $newname, $str_skilled);
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
                     window.location.href = '../indexcontrac.php';
                 }
             })</script>";
        }
    } else {
        $stmt = $conn->prepare("UPDATE contractor_information SET ex_year = ?,`p_amount` = ?,`b_year` = ?,`biz_detail` = ? , img_intro = ? , biz_type = ? WHERE b_name = ?");
        $stmt->bind_param('sssssss', $ex_year, $p_amount, $b_year, $biz_detail, $newname, $str_skilled, $_SESSION['id']);
        $stmt->execute();
        $stmt->close();

        if ($stmt) {
            echo "<script>Swal.fire({
                title: 'Update Profile Success!',
                text: 'Update information Success !',
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
                title: 'Update Profile Failed!',
                text: ' Please Try Again.',
                 icon: 'error',
                 confirmButtonColor: '#B20C01',
                 confirmButtonText: 'Back'
            }).then((result) => {
                if (result.isConfirmed) {
                    refrechrate = 0;
                     window.location.href = '../indexcontrac.php';
                 }
             })</script>";
        }
    }
}
?>