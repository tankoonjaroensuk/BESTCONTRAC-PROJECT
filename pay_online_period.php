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

if (isset($_POST['pay_online_banking'])) {
    $paydate = date('Y-m-d');
    $pay_time = date('H:i:s');
    $payment_id = $_POST['payment_id']; // Retrieve payment_id
    $amount = $_POST['amount']; // Retrieve amount (if needed)
    $pay_type = "Online Banking Payment";

    // Handle file upload
    if ($_FILES['image_pay']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['image_pay']['tmp_name'];
        $image_name = $_FILES['image_pay']['name'];
        $image_path = "./payment_file/" . $image_name;

        // Move uploaded file to desired location
        if (move_uploaded_file($temp_name, $image_path)) {
            // Update payment status in database for the specified payment_id
            $stmt = $conn->prepare("UPDATE payments_period SET payment_status = 1, slipt_image = ? WHERE payments_id = ?");

            if ($stmt === false) {
                die('Error preparing statement: ' . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param('si', $image_name, $payment_id);

            if ($stmt->execute()) {
                // Payment successfully updated
                echo "<script>Swal.fire({
                    title: 'ชำระเงินสำเร็จ',
                    text: 'payment successfully!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = './billing.php';
                    }
                });</script>";
                // Redirect or handle further logic
            } else {
                // Error updating payment status
                echo 'Error updating payment status: ' . $stmt->error;
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


?>