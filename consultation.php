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
    <?php include("./cdn.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

</head>

<body>
    <!-- nav -->
    <?php include("./headercon.php") ?>

    <!-- sild bar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                
                <li>
                    <a href="indexcontrac.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
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
                    <a href="consultation.php" class="flex items-center p-2 text-white rounded-lg dark:text-white  bg-red-800 group">
                        <svg class="w-5 h-5 text-white-500 transition duration-75 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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

    <section class="p-8">
        <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-5">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Consultation</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">การปรึกษาของผู้รับเหมา</p>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    job_id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booking Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    size
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stmt = $conn->query("SELECT * FROM `booking_list` bl JOIN work_information wi ON wi.work_id = bl.con_id WHERE wi.work_con = {$_SESSION['id']} ");
                            while ($row = mysqli_fetch_assoc($stmt)) {
                            ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['job_id']; ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        booking_<?php echo $row['b_type']; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['bdate']; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['btime']; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['l_size']; ?>
                                    </td>

                                    <?php if ($row['action'] == "accept") { ?>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accept</span>
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <?php
                                            if ($row['b_type'] == 1 || $row['b_type'] == '1') {
                                            ?>
                                                <a data-update2-id="<?php echo $row['job_id'] ?>" id="deleteModal" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">ยืนยัน จบการปรึกษารอบที่ 1
                                                </a>
                                            <?php
                                            } else if ($row['b_type'] == 2 || $row['b_type'] == '2') {
                                            ?>
                                                <?php
                                                if ($row['boq_file'] == '') {
                                                ?>
                                                    <a data-id="<?php echo $row['job_id'] ?>" id="updateProductButton" data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" data-boq-id="<?php echo $row['job_id'] ?>" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        แนบไฟล์ BOQ
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    กำลังรอผู้ว่าจ้าง จ้างงาน...
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            } else if ($row['b_type'] == 0 || $row['b_type'] == '0') {
                                            ?>
                                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">ยกเลิกการว่าจ้าง</span>
                                            <?php
                                            } else if ($row['b_type'] == 3 || $row['b_type'] == '3') {
                                            ?>
                                                <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">ยอมรับการว่าจ้าง</span>
                                                <a data-id-order="<?php echo $row['job_id'] ?>" id="orderModal" data-modal-target="orderModal" data-modal-toggle="orderModal" data-price-id="<?php echo $row['value_work'] ?>" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    แบ่งจ่ายงวดงาน</a>

                                            <?php
                                            }
                                            ?>

                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                </svg>
                                            </button>
                                            <!-- modal รายละเอียดการจอง -->
                                            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                รายละเอียดการจอง
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                            </p>
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php
                                    } else if ($row['action'] == "reject") {
                                    ?>
                                        <td class="px-6 py-4">
                                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Reject</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                </svg>
                                            </button>
                                            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                รายละเอียดการจอง
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                            </p>
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


                                    <?php
                                    } else {
                                    ?>
                                        <td class="px-6 py-4">
                                            <span class="bg-gray-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">Waiting for confirmation
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a method="POST" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="poss/process_order.php?id=<?php echo $row['job_id'] ?>&action=accept">
                                                Accept
                                            </a>
                                            <a method="POST" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="poss/process_order.php?id=<?php echo $row['job_id'] ?>&action=reject">
                                                reject
                                            </a>
                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                </svg>
                                            </button>
                                            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                รายละเอียดการจอง
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                            </p>
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                <?php
                            }
                                ?>
                                </tr>

                        </tbody>
                        <!-- modal ยืนยันการจบงาน -->
                        <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">คุณยืนยันการจบการปรึกษารอบที่ 1 ใช่ไหม</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancel</button>
                                        <form method="POST" enctype="multipart/form-data">
                                            <!-- Hidden input to send job_id -->
                                            <input type="hidden" name="id" id="job_id_value">
                                            <button type="submit" name="update_booking1" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes, I'm sure</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Update การส่งไฟล์ BOQ -->
                        <div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            กรอกรายละเอียด
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="grid gap-4 sm:grid-cols-2">
                                            <div>
                                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bookind ID</label>
                                                <input type="number" name="id" id="booking-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly placeholder="booking_id">
                                            </div>
                                            <div>
                                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="number" value="" name="value_work" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="มูลค่างาน" required>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                                <input name="boq_f" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button type="submit" name="submit_boq" class="text-red-900 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Update การส่งงวดงาน -->
                        <div id="orderModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            กรอกรายละเอียด
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="#" method="post" id="formPayment" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bookind ID</label>
                                                <input type="number" name="id" id="order_work" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly placeholder="booking_id">
                                            </div>
                                            <div>
                                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="number" name="value_work" id="price_work" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="มูลค่างาน" readonly>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                                <input name="order_f" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="installment-count" class="block text-sm font-medium text-gray-700">จำนวนงวด</label>
                                                <select id="installment-count" name="installment-count" class="sm:col-span-2 mt-1 block w-full p-2 border border-gray-300 rounded-md" onchange="calculateInstallments()" required>
                                                    <option value="" disabled selected>เลือกจำนวนงวด</option>
                                                    <option value="2">2 งวด</option>
                                                    <option value="3">3 งวด</option>
                                                    <option value="4">4 งวด</option>
                                                    <option value="5">5 งวด</option>
                                                    <option value="6">6 งวด</option>
                                                </select>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <div id="installment-container" class="">

                                                </div>
                                                <div id="result" class="text-green-500 mt-4"></div>
                                            </div>

                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button type="submit" name="submit_order" class="text-red-900 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    document.querySelectorAll('[data-modal-toggle="updateProductModal"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const id = this.getAttribute('data-boq-id');

            document.getElementById('booking-id').value = id
        });
    })
    document.querySelectorAll('[data-modal-toggle="deleteModal"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const id = this.getAttribute('data-update2-id');

            document.getElementById('job_id_value').value = id
        });
    })
    document.querySelectorAll('[data-modal-toggle="orderModal"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id-order');
            const pricework = this.getAttribute('data-price-id');

            document.getElementById('order_work').value = id
            document.getElementById('price_work').value = pricework
        });
    })

    function calculateInstallments() {
        const totalAmount = parseFloat(document.getElementById('price_work').value);
        const installmentCount = parseInt(document.getElementById('installment-count').value);
        const installmentContainer = document.getElementById('installment-container');
        installmentContainer.innerHTML = '';
        if (isNaN(totalAmount) || isNaN(installmentCount)) {
            alert('กรุณากรอกจำนวนเงินทั้งหมดและเลือกจำนวนงวด');
            return;
        }

        const installmentAmount = totalAmount / installmentCount;
        const percentagePerInstallment = (installmentAmount / totalAmount) * 100;

        for (let i = 1; i <= installmentCount; i++) {
            const installmentDiv = document.createElement('div');
            installmentDiv.innerHTML = `
            <label for="installment-${i}" class="block text-sm font-medium text-gray-700">งวดที่ ${i}</label>
            <input type="number" id="installment-${i}" name="installment_${i}" value="${installmentAmount.toFixed(2)}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-100" readonly>
            <label for="date-${i}" class="block text-sm font-medium text-gray-700 mt-2">วันที่ชำระ ${i}</label>
            <input type="date" id="date-${i}" name="paydate${i}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        `;
            installmentContainer.appendChild(installmentDiv);
        }

        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `
        <p>แต่ละงวดคิดเป็น ${percentagePerInstallment.toFixed(2)}% ของจำนวนเงิน ${totalAmount.toFixed(2)} ทั้งหมด</p>
    `;
    }
</script>

</html>


<?php
if (isset($_POST['update_booking1'])) {

    $job_id = intval($_POST['id']);

    $sql = "SELECT b_type FROM booking_list WHERE job_id = $job_id";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b_type = $row['b_type'];
        if ($b_type == 1) {
            $update_sql = "UPDATE booking_list SET b_type = 2 WHERE job_id = $job_id";

            if ($conn->query($update_sql) === TRUE) {
                echo "<script> window.location.href = './consultation.php' </script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
}
?>


<?php
if (isset($_POST['submit_boq'])) {
    $booking_id = $_POST['id'];
    $price = $_POST['value_work'];
    $file_name = $_FILES['boq_f']['name'];
    $file_tmp = $_FILES['boq_f']['tmp_name'];
    $upload_dir = 'boq_file/';

    if (!empty($file_name)) {
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to upload file.";
        }
    }
    $sql = "UPDATE booking_list SET value_work='$price', boq_file='$file_name' WHERE job_id='$booking_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script> window.location.href = './consultation.php' </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<?php
if (isset($_POST['submit_order'])) {
    // Get form data
    $work_id = $_POST['id'];
    $value_work = $_POST['value_work'];
    $installment_count = $_POST['installment-count'];
    $permonth = $value_work / $installment_count;

    // Debug: Check form data
    echo "Debug info: work_id = $work_id, value_work = $value_work, installment_count = $installment_count<br>";

    // Handle file upload
    $target_dir = "tor_file/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["order_f"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size (example: 5MB maximum)
    if ($_FILES["order_f"]["size"] > 5000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types = ['jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx']; // Add other allowed file types here
    if (!in_array($fileType, $allowed_types)) {
        echo "Sorry, only " . implode(", ", $allowed_types) . " files are allowed.<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["order_f"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["order_f"]["name"])) . " has been uploaded.<br>";

            // Insert data into works table
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime($start_date . ' + ' . ($installment_count - 1) . ' months'));

            echo "Debug info: work_id = $work_id, value_work = $value_work, start_date = $start_date, end_date = $end_date, target_file = $target_file<br>";

            $sql_works = "INSERT INTO works (booking_id, price, start_date, end_date, tor_file) VALUES ('$work_id', '$value_work', '$start_date', '$end_date', '$target_file')";

            if ($conn->query($sql_works) === TRUE) {
                echo "Work details saved successfully.<br>";
            } else {
                echo "Error inserting into works table: " . $sql_works . "<br>" . $conn->error . "<br>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }

    // Insert data into payments_period table
    $start_date = date('Y-m-d');
    $percent = (100 / $installment_count);

    for ($i = 1; $i <= $installment_count; $i++) {
        $sql = "INSERT INTO payments_period (works_id, paydate, amount, percent) VALUES ('$work_id', '$start_date', '$permonth', '$percent')";

        if ($conn->query($sql) === TRUE) {
            echo "Installment $i saved successfully.<br>";
        } else {
            echo "Error inserting into payments_period table: " . $sql . "<br>" . $conn->error . "<br>";
        }

        // Adjust the date for the next installment if needed
        $start_date = date('Y-m-d', strtotime($start_date . ' + 1 month'));
    }

    $conn->close();
}

?>