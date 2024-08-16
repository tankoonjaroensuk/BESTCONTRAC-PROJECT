้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body>
    
</body>
</html>

<?php
require_once('./condb.php');
session_start();

if (isset($_POST['pay_onlinebanking'])) {
    $paydate = date('Y-m-d');
    $pay_time = date('H:i:s');
    $type = $_POST['type'];
    $selectedPackagePrice = isset($_POST['package']) ? $_POST['package'] : 'Not Found Package';
    $pay_type = "Online Bankking Payment";

    if ($_FILES['image_pay']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['image_pay']['tmp_name'];
        $image_name = $_FILES['image_pay']['name'];
        $image_path = "./payment_file/" . $image_name;
        if (move_uploaded_file($temp_name, $image_path)) {
            $stmt = $conn->prepare("INSERT INTO `payment_detail` (`user_payment`, `pay_date`, `pay_time`, `pay_amount`, `pay_type`, `type_package`, `image_pay`) VALUES (?, ?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die('Error preparing statement: ' . $conn->error);
            }

            $stmt->bind_param('sssssss', $_SESSION['id'], $paydate, $pay_time, $selectedPackagePrice, $pay_type, $type, $image_name);

            if ($stmt->execute()) {
                echo "<script>Swal.fire({
                    title: 'ชำระเงินสำเร็จ',
                    text: 'payment successfully!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = './index.php';
                    }
                });</script>";
            } else {
                echo 'Error saving payment record: ' . $stmt->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Form submission not detected.";
}



