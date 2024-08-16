<?php session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor') {
    header('Location: ./login.php');
    exit();
}

require_once('./condb.php');
$work_id = isset($_GET['work_id']) ? $_GET['work_id'] : null;
?>

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
    <?php include("./headercon.php") ?>

    <!-- sild bar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="indexcon.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="indexcontrac.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">โปรไฟล์ส่วนตัว</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="100" data-dropdown-trigger="hover" class="flex items-center p-2 text-white rounded-lg dark:text-white  bg-red-800 group">
                        <svg class="w-5 h-5 text-white-500 transition duration-75 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                        <span class="flex-1 ms-3 whitespace-nowrap">Document</span>
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
    <div class="max-w-screen-xl mx-auto px-4 md:px-0">
        <div class="items-start mt-20 justify-between md:flex">
            <div class="max-w-lg mt-10">
                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">
                    Update Work Flow ID: <?php echo ($work_id) ?>
                </h3>
                <p class="text-gray-600 mt-2">
                    อัปเดตการทำงานในแต่ละครั้งเพื่อให้ผู้ว่าจ้างทราบถึงการทำงาน
                </p>

            </div>
        </div>
        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
            <table class="w-full table-auto text-sm text-left bg-gray-50">
                <thead class=" text-gray-600 font-medium border-b">
                    <tr>
                        <th class="py-3 px-6">ID</th>
                        <th class="py-3 px-6">PERIOD</th>
                        <th class="py-3 px-6">AMOUNT</th>
                        <th class="py-3 px-6">STATUS PAYMENT</th>
                        <th class="py-3 px-6">UPDATE</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 divide-y">
                    <?php
                    $stmt = $conn->query("SELECT pp.payments_id, pp.works_id, pp.payment_status, pp.update_detail, pp.amount, ip.* FROM payments_period pp JOIN works w ON pp.works_id = w.booking_id LEFT JOIN image_period ip ON w.booking_id = ip.work_id WHERE w.booking_id = $work_id");
                    $installment_count = 1;
                    while ($billing = mysqli_fetch_assoc($stmt)) { {
                    ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">ID: <?php echo ($billing['payments_id']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">งวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo ($billing['amount']) ?> บาท</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if (($billing['payment_status'] == "2")) {
                                    ?>
                                        <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">ชำระเงินสำเร็จ</span>

                                    <?php
                                    } else if (($billing['payment_status'] == "3")) {
                                    ?>
                                        <span class="bg-red-100 h-5 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">ปฏิเสธการจ่ายเงินงวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?></span>

                                    <?php
                                    } else if (($billing['payment_status'] == "1")) {
                                    ?>
                                        <span class="bg-gray-600 h-5 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">รอผู้ว่าจ้างตรวจสอบการชำระเงิน</span>

                                    <?php
                                    } else if (($billing['payment_status'] == "4")) {
                                    ?>
                                        <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">ชำระเงินสำเร็จ</span>


                                    <?php
                                    } else {
                                    ?>
                                        <span class="bg-gray-100 h-5 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">ยังไม่มีการชำระ</span>

                                    <?php } ?>
                                </td>

                                <?php if (($billing['payment_status'] == "2")) {
                                ?>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button data-id="<?php echo htmlspecialchars($billing['payments_id'], ENT_QUOTES, 'UTF-8'); ?>" data-details="<?php echo htmlspecialchars($billing['update_detail'], ENT_QUOTES, 'UTF-8'); ?>" data-image="<?php echo htmlspecialchars($billing['image_name'], ENT_QUOTES, 'UTF-8'); ?>" id="updateProductButton" data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            อัพเดตผลงาน
                                        </button>
                                    </td>
                                <?php
                                } else if (($billing['payment_status'] == "3")) {
                                ?>

                                <?php
                                } else if (($billing['payment_status'] == "4")) {
                                ?>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                            อัพเดตผลงานสำเร็จ
                                        </button>
                                    </td>
                                <?php
                                } else if (($billing['payment_status'] == "1")) {
                                ?>

                                <?php
                                } else {
                                ?>

                                <?php
                                }
                                ?>

                            </tr>
                            <div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Work_flow</h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 1 11 1.414 1.414L11.414 10l4.293 4.293a1 1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="payment_id" value="" id="payment_id">
                                            <div class="sm:col-span-2 mb-5">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Details Project</label>
                                                <textarea id="description" name="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description detail for work.."></textarea>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload image profile</label>
                                                <main class="container mx-auto max-w-screen-lg h-full">
                                                    <article aria-label="File Upload Modal" class="flex flex-col bg-white shadow-xl rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                                                        <div id="overlay" class="w-full h-96 absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md opacity-0">
                                                            <i>
                                                                <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                    <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                                                </svg>
                                                            </i>
                                                            <p class="text-lg text-blue-700">Drop files to upload</p>
                                                        </div>

                                                        <section class="h-full overflow-auto p-8 w-full flex flex-col">
                                                            <header class="border-dashed border-2 border-gray-400 py-6 flex flex-col justify-center items-center">
                                                                <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                                                    <span>Drag and drop your</span>&nbsp;<span>files</span>
                                                                </p>
                                                                <input id="hidden-input" name="w_image[]" type="file" multiple class="hidden" />
                                                                <button id="button" type="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                                                    Upload a file
                                                                </button>
                                                            </header>

                                                            <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                                                To Upload
                                                            </h1>

                                                            <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                                                <li id="empty" class="h-full w-full text-center flex flex-col justify-center items-center">
                                                                    <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                                                    <span class="text-small text-gray-500">No files selected</span>
                                                                </li>
                                                            </ul>
                                                        </section>

                                                    </article>
                                                </main>
                                                <template id="image-template">
                                                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-2/6 xl:w-1/8 h-24">
                                                        <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                                            <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />
                                                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                                <h1 class="flex-1"></h1>
                                                                <div class="flex">
                                                                    <span class="p-1">
                                                                        <i>
                                                                            <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                                <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                                                            </svg>
                                                                        </i>
                                                                    </span>

                                                                    <p class="p-1 size text-xs"></p>
                                                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h20v-2z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </section>
                                                        </article>
                                                    </li>
                                                </template>

                                                <template id="file-template">
                                                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-2/6 xl:w-1/8 h-24">
                                                        <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                                <h1 class="flex-1"></h1>
                                                                <div class="flex">
                                                                    <span class="p-1">
                                                                        <i>
                                                                            <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                                <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                                                            </svg>
                                                                        </i>
                                                                    </span>
                                                                    <p class="p-1 size text-xs"></p>
                                                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h20v-2z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </section>
                                                        </article>
                                                    </li>
                                                </template>
                                            </div>
                                            <button type="submit" name="update_project" style="background-color: #B20C01 !important;" class="mt-4 text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Add Project
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    <?php
                            $installment_count++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <script>
        document.querySelectorAll('[data-modal-toggle="updateProductModal"]').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default action

                const id = this.getAttribute('data-id');
                console.log(id)
                const detail = this.getAttribute('data-details');
                const image = this.getAttribute('data-image');

                // Make an AJAX call or fetch to get the data for this ID
                document.getElementById('payment_id').value = id
                document.getElementById('description').value = detail
                document.getElementById('hidden-input').value = image

            });
        });

        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage ?
                imageTempl.content.cloneNode(true) :
                fileTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024 ?
                file.size > 1048576 ?
                Math.round(file.size / 1048576) + "mb" :
                Math.round(file.size / 1024) + "kb" :
                file.size + "b";

            isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });

            empty.classList.add("hidden");
            target.prepend(clone);

            FILES[objectURL] = file;
        }

        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }
        };

        // use to check if a file is being dragged
        const hasFiles = ({
                dataTransfer: {
                    types = []
                }
            }) =>
            types.indexOf("Files") > -1;

        let counter = 0;

        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }

        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }
        gallery.onclick = ({
            target
        }) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };

        // print all selected files
        document.getElementById("submit").onclick = () => {
            alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
            console.log(FILES);
        };

        // clear entire selection
        document.getElementById("cancel").onclick = () => {
            while (gallery.children.length > 0) {
                gallery.lastChild.remove();
            }
            FILES = {};
            empty.classList.remove("hidden");
            gallery.append(empty);
        };
    </script>
</body>

</html>

<?php
if (isset($_POST['update_project'])) {
    $description = $_POST['description'];
    $payment_id = $_POST['payment_id'] ?? null;

    if ($payment_id === null) {
        die("Error: payment_id is not set.");
    }

    $images = $_FILES['w_image'];

    $sql_update = "UPDATE payments_period SET update_detail = ?, payment_status = 4 WHERE payments_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('si', $description, $payment_id);
    if ($stmt_update->execute()) {
        if (!empty($images['name'][0])) {
            $total_files = count($images['name']);
            for ($i = 0; $i < $total_files; $i++) {
                $image_name = $images['name'][$i];
                $image_tmp_name = $images['tmp_name'][$i];
                $image_folder = 'image_work_pr/' . $image_name;
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    $sql_insert = "INSERT INTO image_period (work_id, image_name) VALUES (?, ?)";
                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bind_param('is', $payment_id, $image_name);
                    $stmt_insert->execute();
                    echo "<script>Swal.fire({
            title: 'Update Work Flow Sussess!',
            text: 'You will be redirected to another page!',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'enter '
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './current_job.php';
            }
        })</script>";
                } else {
                    echo "Error uploading file: " . $image_name;
                }
            }
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt_update->close();
    $conn->close();
}
?>