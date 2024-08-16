<?php
require_once('./condb.php');

$sql = "SELECT bdate, btime FROM booking_list";
$result = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if (mysqli_num_rows($result) > 0) {
    // สร้างอาร์เรย์เพื่อเก็บข้อมูลการจอง
    $bookings = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // เพิ่มข้อมูลการจองลงในอาร์เรย์
        $booking = array(
            "date" => $row["bdate"],
            "time" => $row["btime"]
        );
        array_push($bookings, $booking);
    }
    // ส่งข้อมูลในรูปแบบ JSON กลับไปยัง JavaScript
    echo json_encode($bookings);
} else {
    echo "0 results";
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);
?>
