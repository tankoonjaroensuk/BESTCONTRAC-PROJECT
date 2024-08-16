<?php
session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'user') {
    header('Location: ./login.php');
    exit();
}
require_once("./condb.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
    <link rel="website icon" href="image/best_contrac_Logo-website.png" type="png">
    <link rel="stylesheet" href="css/booking.css">
</head>

<body>
    <div class="container">
        <div class="navbar-login">
            <div class="logo-login">
                <img src="image/best_contrac_Logo.png" alt="" style="padding: 1rem 3rem;">
            </div>
            <div class="login-right list">
                <a href="#" class="item-list active">
                    Home
                </a>
                <a href="personaupdate.php" class="item-list">
                    About
                </a>
                <a href="#" class="item-list">
                    Services
                </a>
                <a href="#" class="item-list">
                    Contact
                </a>

                <div class="dropdown-index-logout">
                    <?php
                    if (!empty($_SESSION['fname'])) {
                        echo '<button class="index-logout">' . $_SESSION['fname'] . '</button>';
                    } else {
                        echo '<button class="index-logout">Not Fond</button>';
                    }
                    ?>
                    <div class="dropdown-logout">
                        <a href="profile.php">My Profile</a>
                        <a href="bookingsuccess1.php">Booking</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </div>



        <?php $stmt = $conn->query("SELECT * FROM `booking_list` WHERE `user_id` = '{$_SESSION['id']}' ");
        while ($row = mysqli_fetch_assoc($stmt)) {
            $query = $conn->query("SELECT `userprofile`.`bname` FROM `booking_list` JOIN `userprofile` ON `booking_list`.`con_id` = `userprofile`.`user_id` WHERE `booking_list`.`con_id` = {$row['con_id']}");
            $fetch = mysqli_fetch_assoc($query);
            if ($row['action'] == "accept") {
        ?>
                <div class="intro-bookingsus">
                    <div class="intro-contractor-booking">
                        <h1>การจองเข้าปรึกษาของท่านถูกยอมรับแล้ว</h1>
                    </div>
                    <div class="id-contractor-booking-detail">
                        <div class="detail-booking-user">
                            <div class="contractor-booking-detail">
                                <h1><?php echo $fetch['bname']; ?>#<?php echo $row['con_id']; ?></h1>
                            </div>
                            <div class="submit-talkhead">
                                <button class="submit-talk" type="submit" name="talk" style="background-color: #00BE2A;">จองสำเร็จแล้ว</button>
                            </div>
                            <div class="text-detail-bookinguser">
                                <p>วันที่ต้องการใช้บริการ : <span><?php echo $row['bdate_2']; ?></span></p>
                                <p>เวลาที่ต้องการใช้บริการ : <span><?php echo $row['btime_2']; ?></span></p>
                                <p>ช่องทางการปรึกษา : <span><?php echo $row['con_type2']; ?></span></p>
                                <p>ขนาดของสถานที่ : <span><?php echo $row['l_size2']; ?> ตารางเมตร</span></p>
                                <p>ไฟล์แนบ<span> <a href="file/<?php echo $row['job_db']; ?>"><?php echo $row['job_db']; ?> </a></span></p>
                            </div>
                        </div>
                        <a class="submit-nextacancel" href="payment.php?=<?php echo $row['action']; ?>">
                            <button class="submit-next" type="button" name="next" style="background-color: #B20C01;">จ่ายค่าธรรมเนียม</button>
                        </a>
                        <a class="submit-nextacancel" href="#.php?=<?php echo $row['action']; ?>">
                            <a class="submit-nexta" href="package.php?id_booking=<?php echo $row['job_id']; ?>">
                                <button class="cancel submit-next2" type="submit" name="next" style="background-color: #FFD337;">Package Premium</button>
                            </a>
                    </div>
                </div>
            <?php
            } else if ($row['action'] == "reject") {
            ?>
                <div class="intro-bookingsus">
                    <div class="intro-contractor-booking">
                        <h1>การจองเข้าปรึกษาของท่านถูกยกเลิก</h1>
                    </div>
                    <div class="id-contractor-booking-detail">
                        <div class="detail-booking-user">
                            <div class="contractor-booking-detail">
                                <h1><?php echo $fetch['bname']; ?>#<?php echo $row['con_id']; ?></h1>
                            </div>
                            <div class="submit-talkhead">
                                <button class="submit-talk" type="submit" name="talk" style="background-color: #980D04;">ยกเลิกการจอง</button>
                            </div>
                            <div class="text-detail-bookinguser">
                                <p>วันที่ต้องการใช้บริการ : <span><?php echo $row['bdate']; ?></span></p>
                                <p>เวลาที่ต้องการใช้บริการ : <span><?php echo $row['btime']; ?></span></p>
                                <p>ช่องทางการปรึกษา : <span><?php echo $row['con_type']; ?></span></p>
                                <p>ขนาดของสถานที่ : <span><?php echo $row['l_size']; ?> ตารางเมตร</span></p>
                                <!-- <input type="file" accept="application/pdf" class="file-for-pdf" name="pdf-booking-round1" readonly/> -->
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="intro-bookingsus">
                    <div class="intro-contractor-booking">
                        <h1>การจองเข้าปรึกษาของท่านถูกส่งไปถึงผู้รับเหมาแล้ว</h1>
                    </div>
                    <div class="id-contractor-booking-detail">
                        <div class="detail-booking-user">
                            <div class="contractor-booking-detail">
                                <h1><?php echo $fetch['bname']; ?>#<?php echo $row['con_id']; ?></h1>
                            </div>
                            <div class="submit-talkhead">
                                <button class="submit-talk" type="submit" name="talk" style="background-color: #808080;">รออนุมัติ</button>
                            </div>
                            <div class="text-detail-bookinguser">
                                <p>วันที่ต้องการใช้บริการ : <span><?php echo $row['bdate']; ?></span></p>
                                <p>เวลาที่ต้องการใช้บริการ : <span><?php echo $row['btime']; ?></span></p>
                                <p>ช่องทางการปรึกษา : <span><?php echo $row['con_type']; ?></span></p>
                                <p>ขนาดของสถานที่ : <span><?php echo $row['l_size']; ?> ตารางเมตร</span></p>
                                <!-- <input type="file" accept="application/pdf" class="file-for-pdf" name="pdf-booking-round1" readonly/> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
    </div>
</body>

</html>