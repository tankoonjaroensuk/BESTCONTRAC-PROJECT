<?php
session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
require_once('./condb.php');

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

        <div class="">
            <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
                <input type="hidden" name="con_id" value="<?php echo $_GET['project_id']; ?>"></input>
                <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                    <div class="relative">
                        <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                            <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                <a class="flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-xs font-semibold text-white ring ring-red-600 ring-offset-2" href="#">1</a>
                                <span class="font-semibold text-gray-900">Booking</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                <div class="px-4 pt-8">
                    <p class="text-xl font-medium">การจองเพื่อเข้ารับการปรึกษา</p>
                    <p class="text-gray-400">โปรดตรวจเช็ครายละเอียดการจองและโปรไฟล์ผู้รับเหมาที่ท่านเลือก</p>
                    <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                        <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                            <?php
                            $stmt = $conn->query("SELECT `work_information`.*, us.bname FROM `work_information` JOIN userprofile us ON work_con = us.user_id WHERE work_id = {$_GET['project_id']}");
                            $row = mysqli_fetch_assoc($stmt);
                            ?>
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="text-lg font-semibold"><?php echo $row['w_name']; ?></span>
                                <span class="float-right text-gray-400"><?php echo $row['bname'] ?></span>
                                <p class="text-xs font-bold"><?php echo $row['w_district']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0" action="./poss/booking.php?con_id=<?php echo $_GET['project_id'] ?>" method="POST" enctype="multipart/form-data">
                    <p class="text-xl font-medium">Fill in booking information</p>
                    <p class="text-gray-400">กรอกข้อมูลการจองเข้าปรึกษา</p>
                    <div class="">
                        <label for="Fullname" class="mt-4 mb-2 block text-sm font-medium">ชื่อ นามสกุล</label>
                        <div class="relative">
                            <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Full name" value="<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?>" readonly />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </div>
                        <label for="email" class="mt-4 mb-2 block text-sm font-medium">อีเมล์</label>
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
                            <input type="text" id="size" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="size" name="place-size" required />
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
                            <!-- ใช้ datepicker สำหรับเลือกวันที่ -->
                            <input datepicker datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" name="date" required>
                        </div>

                    </div>
                    <label for="time" class="mt-4 mb-2 block text-sm font-medium">เลือกเวลาที่ต้องการจอง</label>
                    <!-- เลือกเวลา -->
                    <input type="time" class="bg-gray-50 border shadow-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="time" required>

                    <div class="relative ">
                        <!-- เลือกไฟล์ PDF สำหรับอัปโหลด -->
                        <label title="Click to upload" for="button2" class="mt-8 cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                            <div class="w-max relative">
                                <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon" width="512" height="512">
                            </div>
                            <div class="relative">
                                <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                                    อัปโหลดไฟล์
                                </span>
                                <span class="mt-0.5 block text-sm text-gray-500">PDF Only</span>
                            </div>
                        </label>
                        <input type="file" accept="application/pdf" class="file-for-pdf" name="pdf-1" id="button2">
                    </div>
                    <!-- ปุ่ม submit -->
                    <button class="mt-10 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>