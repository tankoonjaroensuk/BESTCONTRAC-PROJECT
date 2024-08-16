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
    <!-- <link rel="stylesheet" href="css/booking.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://unpkg.com/alpinejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@ryangjchandler/alpine-tooltip@1.2.0/dist/cdn.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.turbo.min.js"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
</head>

<body>
    <div class="container mx-auto">
        <?php include('./headder.php') ?>


        <input type="hidden" name="job_id" value="<?php echo $_row['job_id']; ?>"></input>
        <?php $stmt = $conn->query("SELECT * FROM `booking_list` WHERE `job_id` = '{$_GET['job_id']}' ");
        while ($row = mysqli_fetch_assoc($stmt)) {
            $query = $conn->query("SELECT `userprofile`.`bname` FROM `booking_list` JOIN `userprofile` ON `booking_list`.`con_id` = `userprofile`.`user_id` WHERE `booking_list`.`con_id` = {$row['con_id']}");
            $fetch = mysqli_fetch_assoc($query);
            if ($row['action'] == "accept") {
        ?>
                <div class="accept a contractor">
                    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
                        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                            <div class="relative">
                                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">1</a>
                                        <span class="font-semibold text-gray-900">Booking</span>
                                    </li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-green-600 text-xs font-semibold text-white ring ring-green-600 ring-offset-2" href="#">2</a>
                                        <span class="font-semibold text-green-800">accept by Contractor</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:px-10 lg:px-20 xl:px-32 w-full">
                        <form class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                            <p class="text-xl font-medium">Fill in booking information</p>
                            <p class="text-gray-400">กรอกข้อมูลการจองเข้าปรึกษา</p>
                            <div class="">
                                <label for="Fullname" class="mt-4 mb-2 block text-sm font-medium">ชื่อ นามสกุล </label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Full name" value="<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="email" class="mt-4 mb-2 block text-sm font-medium">อีเมล</label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" value="<?php echo $_SESSION['email']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="size" class="mt-4 mb-2 block text-sm font-medium">ขนาดพื้นที่ (ตารางเมตร)</label>
                                <div class="relative">
                                    <input type="text" id="size" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="size" value="<?php echo $row['l_size']; ?>" name="place-size" required readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                                        </svg>

                                    </div>
                                </div>
                                <label for="date" class="mt-4 mb-2 block text-sm font-medium">เลือกวันที่ต้องการจอง</label>
                                <div class="relative max-w">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="text" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="<?php echo $row['bdate']; ?>" name="date" required readonly>
                                </div>

                            </div>
                            <label for="time" class="mt-4 mb-2 block text-sm font-medium">เลือกเวลาที่ต้องการจอง</label>
                            <input type="time" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="time" value="<?php echo $row['btime']; ?>" required readonly>

                            <div class="relative ">
                                <label title="Click to upload" for="button2" class="mt-8 cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                    <div class="w-max relative">
                                        <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon" width="512" height="512">
                                    </div>
                                    <div class="relative">
                                        <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                                            <a href="file/<?php echo $row['job_db']; ?>"><?php echo $row['job_db']; ?> </a>
                                        </span>
                                        <span class="mt-0.5 block text-sm text-gray-500">PDF Only</span>
                                    </div>
                                </label>
                            </div>
                            <a onclick="openNewWindow()" type="button" class="mt-10 mb-8  rounded-md bg-sky-700 px-6 py-3 font-medium text-white" name="submit">คุยแชทกับผู้รับเหมา</a>
                        </form>
                    </div>
                </div>

            <?php
            } else if ($row['action'] == "reject") {
            ?>
                <div class="reject a contractor">
                    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
                        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                            <div class="relative">
                                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">1</a>
                                        <span class="font-semibold text-gray-900">Booking</span>
                                    </li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-xs font-semibold text-white ring ring-red-600 ring-offset-2" href="#">2</a>
                                        <span class="font-semibold text-gray-500">ถูกปฏิเสธจากผู้รับเหมา</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:px-10 lg:px-20 xl:px-32 w-full">
                        <form class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                            <p class="text-xl font-medium">Fill in booking information</p>
                            <p class="text-gray-400">กรอกข้อมูลการจองเข้าปรึกษา</p>
                            <div class="">
                                <label for="Fullname" class="mt-4 mb-2 block text-sm font-medium">ชื่อ นามสกุล</label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Full name" value="<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="email" class="mt-4 mb-2 block text-sm font-medium">อีเมล</label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" value="<?php echo $_SESSION['email']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="size" class="mt-4 mb-2 block text-sm font-medium">ขนาดพื้นที่ (ตารางเมตร)</label>
                                <div class="relative">
                                    <input type="text" id="size" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="size" value="<?php echo $row['l_size']; ?>" name="place-size" required readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                                        </svg>

                                    </div>
                                </div>
                                <label for="date" class="mt-4 mb-2 block text-sm font-medium">เลือกวันที่ต้องการจอง</label>
                                <div class="relative max-w">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="text" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="<?php echo $row['bdate']; ?>" name="date" required readonly>
                                </div>

                            </div>
                            <label for="time" class="mt-4 mb-2 block text-sm font-medium">เลือกเวลาที่ต้องการจอง</label>
                            <input type="time" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="time" value="<?php echo $row['btime']; ?>" required readonly>

                            <div class="relative ">
                                <label title="Click to upload" for="button2" class="mt-8 cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                    <div class="w-max relative">
                                        <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon" width="512" height="512">
                                    </div>
                                    <div class="relative">
                                        <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                                            <a href="file/<?php echo $row['job_db']; ?>"><?php echo $row['job_db']; ?> </a>
                                        </span>
                                        <span class="mt-0.5 block text-sm text-gray-500">PDF Only</span>
                                    </div>
                                </label>
                               
                            </div>
                            <button class="mt-10 mb-8  rounded-md bg-red-900 px-6 py-3 font-medium text-white" name="submit">ถูกปฏิเสธจากผู้รับเหมา</button>
                        </form>
                    </div>
                </div>
            <?php
            } else {
            ?>

                <div class="wait a contractor">
                    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
                        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                            <div class="relative">
                                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">1</a>
                                        <span class="font-semibold text-gray-500">Booking</span>
                                    </li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2" href="#">2</a>
                                        <span class="font-semibold text-gray-900">Wait Contractor</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:px-10 lg:px-20 xl:px-32 w-full">
                        <form class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                            <p class="text-xl font-medium">Fill in booking information</p>
                            <p class="text-gray-400">กรอกข้อมูลการจองเข้าปรึกษา</p>
                            <div class="">
                                <label for="Fullname" class="mt-4 mb-2 block text-sm font-medium">Full name</label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Full name" value="<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" value="<?php echo $_SESSION['email']; ?>" readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                </div>
                                <label for="size" class="mt-4 mb-2 block text-sm font-medium">ขนาดพื้นที่ (ตารางเมตร)</label>
                                <div class="relative">
                                    <input type="text" id="size" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="size" value="<?php echo $row['l_size']; ?>" name="place-size" required readonly />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                                        </svg>

                                    </div>
                                </div>
                                <label for="date" class="mt-4 mb-2 block text-sm font-medium">เลือกวันที่ต้องการจอง</label>
                                <div class="relative max-w">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="text" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="<?php echo $row['bdate']; ?>" name="date" required readonly>
                                </div>

                            </div>
                            <label for="time" class="mt-4 mb-2 block text-sm font-medium">เลือกเวลาที่ต้องการจอง</label>
                            <input type="time" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="time" value="<?php echo $row['btime']; ?>" required readonly>

                            <div class="relative ">
                                <label title="Click to upload" for="button2" class="mt-8 cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                    
                                    <div class="w-max relative">
                                        <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon" width="512" height="512">
                                    </div>
                                    <div class="relative">
                                        <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                                            <a href="file/<?php echo $row['job_db']; ?>"><?php echo $row['job_db']; ?> </a>
                                        </span>
                                        <span class="mt-0.5 block text-sm text-gray-500">PDF Only</span>
                                    </div>
                                </label>
                            </div>
                            <button class="mt-10 mb-8  rounded-md bg-gray-900 px-6 py-3 font-medium text-white" name="submit">รอผู้รับเหมาพิจารณาการจอง</button>
                        </form>
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
    <script>
        function openNewWindow() {
            const newWindow = window.open("./chat-real-time/users.php", "newWindow", "width=650,height=850");

            const checkWindowClosed = setInterval(function() {
                if (newWindow.closed) {
                    clearInterval(checkWindowClosed);
                    window.location.href = "./historybooking.php"; 
                }
            }, 500); 
        }
    </script>
</body>

</html>