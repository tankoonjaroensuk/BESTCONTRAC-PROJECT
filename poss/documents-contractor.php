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

require_once("../condb.php"); 

if (isset($_POST['submit-documents']) && !empty($_FILES['pdf-information-contractor']['name'][0])) {
    date_default_timezone_set('Asia/Bangkok'); 
    
    $filename = "";
    $count_file = count($_FILES['pdf-information-contractor']['name']);

    for ($i = 0; $i < $count_file; $i++) {
        
        $fileTmpPath = $_FILES['pdf-information-contractor']['tmp_name'][$i];;
        $fileType = $_FILES['pdf-information-contractor']['type'][$i];
        $fileSize = $_FILES['pdf-information-contractor']['size'][$i];
        $fileName = $_FILES['pdf-information-contractor']['name'][$i];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileType == 'application/pdf') {
            $timeStamp = date('YmdHis'); 
            $newFileName = $_SESSION['id'].'_'.$i. '_' . $timeStamp . '.' . $fileExtension; // สมมติว่า $_SESSION['userid'] มีการกำหนดค่าไว้แล้ว
            $uploadPath = "../contractor_information_document/" . $newFileName;

            
            if(move_uploaded_file($fileTmpPath, $uploadPath)) {
                $query = $conn->query("INSERT INTO `contractor_document` VALUES(NULL,'{$_SESSION['id']}','{$newFileName}')");
            } 
        }
        
    }


        if ($fileType == 'application/pdf') {
            $timeStamp = date('YmdHis'); 
            $newFileName = $_SESSION['id'] . '_' . $timeStamp . '.' . $fileExtension; 
            $uploadPath = "../contractor_information_document/" . $newFileName;
            echo "<script> window.location.href = '../documentcon.php' </script>";
        } else {
            echo "ไฟล์ $fileName ไม่ใช่ไฟล์ PDF.<br>";
        }
} else {
    echo "ไม่มีไฟล์ถูกส่งมาหรือมีปัญหาในการอัปโหลดไฟล์.<br>";
}
?>


