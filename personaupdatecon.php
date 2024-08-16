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

<>
    <!-- nav -->
    <?php include("./headercon.php") ?>

    <!-- sild bar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="indexcon.php" class="flex items-center p-2 text-white rounded-lg dark:text-white  bg-red-800 group">
                        <svg class="w-5 h-5 text-white-500 transition duration-75 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
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
    <section class="bg-white">
        <div class="max-w-screen-xl mx-auto px-4 md:px-0">
            <!-- Starts component -->
            <div x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
                <!-- Tab List -->
                <ul role="tablist" class="-mb-px flex items-stretch gap-2 text-slate-500">
                    <!-- Tab 1 -->
                    <li> <button @click="activeTab = 0" :aria-selected="activeTab === 0" :class="{ 'bg-red-50 text-red-600': activeTab === 0 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium bg-red-50 text-red-600" role="tab" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                            </svg> <span>My Account</span></button> </li> <!-- Tab 2 -->
                    <li> <button @click="activeTab = 1" :aria-selected="activeTab === 1" :class="{ 'bg-red-50 text-red-600': activeTab === 1 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                            <span>Authentication</span></button> </li>
                    

                </ul> <!-- Panels -->
                <div role="tabpanels" class="rounded-b-md border rounded-xl overflow-hidden border-gray-200 mt-2 bg-white">
                    <section x-show="activeTab === 0" role="tabpanel" class="p-8">
                        <form action="poss/personalupcon.php" method="post">
                            <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Personal Information</h2>
                                    <!-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->

                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <?php
                                        $queryPrivacy = $conn->query("SELECT * FROM `userprofile` WHERE `user_id` = \"{$_SESSION['id']}\" ");
                                        $privacy = mysqli_fetch_assoc($queryPrivacy);
                                        ?>
                                        <div class="sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                            <div class="mt-2">
                                                <input type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                            <div class="mt-2">
                                                <input type="text" name="lname" value="<?php echo $_SESSION['lname']; ?>" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="citizen" class="block text-sm font-medium leading-6 text-gray-900">ID card number</label>
                                            <div class="mt-2">
                                                <input type="text" name="citizen" value="<?php if (!empty($privacy['citizen_id'])) {
                                                                                                echo base64_decode($privacy['citizen_id']);
                                                                                            } ?>" id="citizen" autocomplete="citizen" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="col-span-3">
                                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                            <div class="mt-2">
                                                <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" id="address" autocomplete="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                                            <div class="mt-2">
                                                <input type="text" name="state" value="<?php echo $_SESSION['state']; ?>" id="state" autocomplete="state" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="zipcode" class="block text-sm font-medium leading-6 text-gray-900">ZIP code</label>
                                            <div class="mt-2">
                                                <input type="text" name="zipcode" value="<?php echo $_SESSION['zipcode']; ?>" id="zipcode" autocomplete="zipcode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="submit" name="submit" class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                </div>
                            </div>
                        </form>
                    </section>

                    <section x-show="activeTab === 1" role="tabpanel" class="p-8">
                        <div>
                            <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
                                <div class=" border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px] mb-5">Verify Account</h2>
                                    <div class="mb-4 border-b border-gray-100 dark:border-gray-700">
                                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                            <li class="me-2" role="presentation">
                                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="phone-tab" data-tabs-target="#phone" type="button" role="tab" aria-controls="phone" aria-selected="false">Phone</button>
                                            </li>
                                            <li class="me-2" role="presentation">
                                                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="email-tab" data-tabs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">Email</button>
                                            </li>

                                        </ul>
                                    </div>
                                    <div id="default-tab-content">
                                        <div class="hidden p-4 rounded-lg " id="phone" role="tabpanel" aria-labelledby="phone-tab">
                                            <?php $stmt = $conn->query("SELECT * FROM `userprofile` WHERE `user_id` = '{$_SESSION['id']}' ");
                                            while ($row3 = mysqli_fetch_assoc($stmt)) {
                                                if ($row3['verify__phone'] == '1') {
                                            ?>

                                                    <form class=" mx-auto" action="poss/verity-phone.php" method="post">
                                                        <div class="flex items-center">
                                                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border rounded-s-lg " type="button">
                                                                +66 (TH)
                                                            </button>
                                                            <div class="relative w-full">
                                                                <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="phone number" name="phone" value="<?php echo $_SESSION['phone']; ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">Phone Number Verified Successfully. But if you want to change your number, <a href="#" class="text-red-700">click here.</a> </p>
                                                    </form>
                                                <?php
                                                } else {
                                                ?>
                                                    <form class=" mx-auto" action="poss/verity-phone.php" method="post">
                                                        <div class="flex items-center">
                                                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border rounded-s-lg " type="button">
                                                                +66 (TH)
                                                            </button>
                                                            <div class="relative w-full">
                                                                <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="phone number" name="phone" value="<?php echo $_SESSION['phone']; ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">We will send you an SMS with a verification code.</p>
                                                        <button type="submit" class="text-white text-nowrap w-full lg:w-48 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send verification code</button>
                                                    </form>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="hidden p-4 rounded-lg " id="email" role="tabpanel" aria-labelledby="email-tab">
                                            <?php $stmt = $conn->query("SELECT * FROM `userprofile` WHERE `user_id` = '{$_SESSION['id']}' ");
                                            while ($row3 = mysqli_fetch_assoc($stmt)) {
                                                if ($row3['verify__email'] == '1') {
                                            ?>
                                                    <form class=" mx-auto" action="poss/verity-email.php" method="post">
                                                        <div class="flex items-center">
                                                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border rounded-s-lg " type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                                </svg>
                                                                Email
                                                            </button>
                                                            <div class="relative w-full">
                                                                <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" name="email" placeholder="email" value="<?php echo $_SESSION['email']; ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">Email Verified Successfully. But if you want to change your email, <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-red-700">click here.</a>
                                                    </form>
                                                <?php
                                                } else {
                                                ?>
                                                    <form class=" mx-auto" action="poss/verity-email.php" method="post">
                                                        <div class="flex items-center">
                                                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border rounded-s-lg " type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                                </svg>
                                                                Email
                                                            </button>
                                                            <div class="relative w-full">
                                                                <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" name="email" placeholder="email" value="<?php echo $_SESSION['email']; ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">We will send you an email address with a verification code.</p>
                                                        <button type="submit" class="text-white text-nowrap w-full lg:w-48 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" name="ver-mail">Send verification code</button>
                                                    </form>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>

                 





                </div>
            </div>
        </div>
    </section>







    </body>

</html>