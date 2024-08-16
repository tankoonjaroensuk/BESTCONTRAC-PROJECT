<?php session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor') {
    header('Location: ./login.php');
    exit();
}
require_once('./condb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylecon.css">
    <?php include("./cdn.php") ?>

</head>

<body>
    <!-- nav -->
    <?php include("./headercon.php") ?>

    <!-- sild bar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="indexcontrac.php" class=" flex items-center p-2 text-white rounded-lg dark:text-white  bg-red-800 group">
                        <svg class="w-5 h-5 text-white-500 transition duration-75 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">โปรไฟล์ส่วนตัว</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="100" data-dropdown-trigger="hover" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">งานของฉัน</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
                <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                        <li>
                            <a href="current_job.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">งานปัจจุบัน</a>
                        </li>
                        <li>
                            <a href="work_history.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ผลงานเก่า</a>
                        </li>
                    </ul>
                </div>

                <li>
                    <a href="membercon.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">สมาชิกผู้รับเหมา</span>
                    </a>
                </li>
                <li>
                    <a onclick="openNewWindow()" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">แชท</span>
                    </a>
                </li>
                <li>
                    <a href="documentcon.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6.905 9.97a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72V18a.75.75 0 0 0 1.5 0v-4.19l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                            <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">เอกสารส่วนตัว</span>
                    </a>
                </li>
                <li>
                    <a href="consultation.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">ประวัติการรับงาน</span>
                    </a>
                </li>
                <li>
                    <a href="payment_period.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 20 18">
                            <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">ประวัติการเงิน</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- profile crud -->
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 lg:px-0 mx-auto max-w-2xl lg:py-20 lg:mt-0 mt-10">
            <h2 class="mb-4 mt-10 text-xl font-bold text-gray-900 dark:text-white">Profile Contractor</h2>
            <form action="poss/contracindex.php" method="post" enctype="multipart/form-data" id="form">
                <?php
                $query = $conn->query("SELECT * FROM `contractor_information` WHERE `b_name` = '{$_SESSION['id']}' ");
                $fetch = mysqli_fetch_assoc($query);
                $count = $conn->query("SELECT COUNT(sub_id) as count FROM `contractor_member` WHERE member_con = '{$_SESSION['id']}'; ");
                $count = mysqli_fetch_array($count)
                ?>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ฺusiness Name" value="<?php echo $_SESSION['bname']; ?>" readonly>
                        </div>
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Experience</label>
                            <input type="text" name="ex_year" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Work Experience" value="<?php echo $fetch['ex_year'] ?>">
                        </div>
                        <div class="w-full">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Established</label>
                            <input type="text" name="b_year" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Year" value="<?php echo $fetch['b_year'] ?>">
                        </div>
                        <div>
                            <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of teams
                            </label>
                            <input type="text" name="p_amount" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" value="<?php echo $count[0] ?> คน" readonly>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ฺusiness Name" value="<?php echo $_SESSION['bname']; ?>" readonly>
                        </div>
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Experience</label>
                            <input type="text" name="ex_year" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Work Experience" required="">
                        </div>
                        <div class="w-full">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Established</label>
                            <input type="number" name="b_year" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Year" required="">
                        </div>
                        <div>
                            <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of teams
                            </label>
                            <input type="number" name="p_amount" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="จำนวนสมาชิก" readonly>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <div class="block w-full ">
                            <?php
                            $query = $conn->query("SELECT biz_type, img_intro FROM `contractor_information` WHERE `b_name` = '{$_SESSION['id']}' ");
                            $fetch = mysqli_fetch_assoc($query);
                            $str = explode(",", $fetch['biz_type']);
                            ?>
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                            <select name="skilled[]" id="skilled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" multiple>
                                <?php if (isset($_POST['skilled'])) {
                                    print_r($_POST['skilled']);
                                } ?>
                                <?php
                                $options = [
                                    "งานเคมี" => "งานเคมี",
                                    "งานช่างไม้" => "งานช่างไม้",
                                    "งานช่างก่อสร้าง" => "งานช่างก่อสร้าง",
                                    "งานช่างแอร์" => "งานช่างแอร์",
                                    "งานเก็บ" => "งานเก็บ",
                                    "งานทำความสะอาด" => "งานทำความสะอาด",
                                    "งานสวน" => "งานสวน",
                                    "งานช่างสี" => "งานช่างสี",
                                    "งานช่างประปา" => "งานช่างประปา",
                                    "งานช่างไฟฟ้า" => "งานช่างไฟฟ้า"
                                ];
                                // แสดงตัวเลือกทั้งหมดที่ไม่ได้ถูกเลือก
                                foreach ($options as $value => $label) {
                                    if (!in_array($value, $str)) {
                                        echo "<option value=\"$value\">$label</option>";
                                    }
                                }

                                // แสดงตัวเลือกที่ถูกเลือกแล้ว
                                foreach ($str as $item) {
                                    echo "<option value=\"$item\" selected >$item</option>";
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    } else {
                    ?>
                    <div class="block w-full ">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select name="skilled[]" id="skilled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" multiple>
                            <option value="งานเคมี">งานเคมี</option>
                            <option value="งานช่างไม้">งานช่างไม้</option>
                            <option value="งานช่างก่อสร้าง">งานช่างก่อสร้าง</option>
                            <option value="งานช่างแอร์">งานช่างแอร์</option>
                            <option value="งานเก็บ">งานเก็บ</option>
                            <option value="งานทำความสะอาด">งานทำความสะอาด</option>
                            <option value="งานสวน">งานสวน</option>
                            <option value="งานช่างสี">งานช่างสี</option>
                            <option value="งานช่างประปา">งานช่างประปา</option>
                            <option value="งานช่างไฟฟ้า">งานช่างไฟฟ้า</option>
                        </select></div>
                    <?php
                    }
                    ?>
                    <?php
                    $query = $conn->query("SELECT * FROM `contractor_information` WHERE `b_name` = '{$_SESSION['id']}' ");
                    $fetch = mysqli_fetch_assoc($query);

                    ?>
                    <div class="sm:col-span-2"><?php
                                                if (mysqli_num_rows($query) > 0) {
                                                ?>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="biz_detail" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"><?php echo $fetch['biz_detail'] ?></textarea>
                    </div>
                <?php
                                                } else {
                ?>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="biz_detail" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                    </div>
                <?php
                                                }
                ?>

                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload image profile</label>
                    <?php
                    $query = $conn->query("SELECT * FROM `contractor_information` WHERE `b_name` = '{$_SESSION['id']}' ");
                    $fetch = mysqli_fetch_assoc($query);
                    if ($fetch !== null) {
                        if (!empty($fetch['img_intro'])) {
                    ?>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" style="background-image: <?php echo "url(./intro_image/" . $fetch['img_intro'] . ")" ?>; background-size: cover" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <input id="dropzone-file" type="file" class="hidden" name="img" id="imgInput" />
                                    <img loading="lazy" width="20%" height="10%" id="previewImg" alt="">
                                </label>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" name="img_intro" id="imgInput" />
                                    <img loading="lazy" width="20%" height="10%" id="previewImg" alt="">
                                </label>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="bg-contain flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="img_intro" id="imgInput" />
                                <img loading="lazy" width="20%" height="10%" id="previewImg" alt="">
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                </div>
                <button name="submit-profile" style="background: #B20C01 !important;" type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Submit
                </button>
            </form>
        </div>
    </section>
</body>
<script src="js/select-multi.js"></script>
<script>
    new MultiSelectTag('skilled') //ID SELECT MULTI 

    //add button เอกสาร pdf
    document.addEventListener('DOMContentLoaded', function() {
        var addButton = document.getElementById('addButton');
        var documentsInfo = document.querySelector('.documents-info');
        var inputCount = documentsInfo.getElementsByTagName('input').length;

        addButton.addEventListener('click', function(e) {
            e.preventDefault();

            if (inputCount < 5) {
                var newInput = document.createElement('input');
                newInput.type = 'file';
                newInput.setAttribute('name', 'pdf-information-contractor[]');
                newInput.accept = 'application/pdf';
                newInput.classList.add('file-for-pdf');
                newInput.style.width = '1513px';
                newInput.style.height = '85px';
                newInput.style.padding = '10px';
                newInput.style.fontSize = '40px';
                newInput.style.fontFamily = "'Prompt', sans-serif";
                newInput.style.outline = 'none';
                newInput.style.background = '#F9F9F9';
                newInput.style.boxShadow = '5px 5px 17px #c8c8c8, -5px -5px 17px #ffffff';
                newInput.style.border = 'none';
                newInput.style.borderRadius = '10px';
                newInput.style.transition = 'all .5s';
                newInput.style.color = '#09244B';

                documentsInfo.appendChild(newInput);
                inputCount++;
            } else {
                alert('Maximum of 3 documents can be added. ');
            }
        });
    });

    // smoothScroll
    function smoothScrollTo(target, duration) {
        var targetElement = document.querySelector(target);
        if (!targetElement) return;

        var targetPosition = targetElement.getBoundingClientRect().top;
        var startPosition = window.pageYOffset;
        var startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            var timeElapsed = currentTime - startTime;
            var run = ease(timeElapsed, startPosition, targetPosition, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }


    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.choice-scroll a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var href = this.getAttribute('href');
                smoothScrollTo(href, 1000); // เลื่อนช้าลงใน 1 วินาที
            });
        });
    });

    document.getElementById("addMember").onclick = function() {
        document.getElementById("popupForm").style.display = "block";
    }

    document.querySelector(".close-button").onclick = function() {
        document.getElementById("popupForm").style.display = "none";
    }
</script>

</html>