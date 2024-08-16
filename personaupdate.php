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
    <link rel="stylesheet" href="css/personalupdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://unpkg.com/alpinejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@ryangjchandler/alpine-tooltip@1.2.0/dist/cdn.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <div class="container mx-auto">
        <?php include('./headder.php') ?>

        <section class="bg-white">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto  relative p-8">
                <div class="text-base text-gray-500 lg:mb-5">
                    <div>
                        <h1>Profile <p class="text-base font-semibold leading-7 text-gray-900 lg:text-[50px]"> <?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?></p>
                        </h1>

                    </div>
                </div>
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
                        <li> <button @click="activeTab = 2" :aria-selected="activeTab === 2" :class="{ 'bg-red-50 text-red-600': activeTab === 2 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"></path>
                                </svg> <span>Booking History</span></button> </li>
                        <li> <button @click="activeTab = 3" :aria-selected="activeTab === 3" :class="{ 'bg-red-50 text-red-600': activeTab === 3 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"></path>
                                </svg> <span>Billing Package</span></button> </li>
                    </ul> <!-- Panels -->
                    <div role="tabpanels" class="rounded-b-md border rounded-xl overflow-hidden border-gray-200 mt-2 bg-white">
                        <section x-show="activeTab === 0" role="tabpanel" class="p-8">
                            <form action="poss/personalup.php" method="post">
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
                                                    <?php
                                                    if (!empty($_SESSION['citizen_id'])) {
                                                    ?>
                                                        <input type="text" name="citizen" value="" id="citizen" autocomplete="citizen" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" name="citizen" value="<?php if (!empty($privacy['citizen_id'])) {
                                                                                                        echo base64_decode($privacy['citizen_id']);
                                                                                                    } ?>" id="citizen" autocomplete="citizen" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="col-span-3">
                                                <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                                <div class="mt-2">
                                                    <?php
                                                    if (!empty($_SESSION['address'])) {
                                                    ?>
                                                        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" id="address" autocomplete="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" name="address" value="" id="address" autocomplete="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                                                <div class="mt-2">
                                                    <?php
                                                    if (!empty($_SESSION['state'])) {
                                                    ?>
                                                        <input type="text" name="state" value="<?php echo $_SESSION['state']; ?>" id="state" autocomplete="state" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" name="state" value="" id="address" autocomplete="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="zipcode" class="block text-sm font-medium leading-6 text-gray-900">ZIP code</label>
                                                <div class="mt-2">
                                                    <?php
                                                    if (!empty($_SESSION['zipcode'])) {
                                                    ?>
                                                        <input type="text" name="zipcode" value="<?php echo $_SESSION['zipcode']; ?>" id="zipcode" autocomplete="zipcode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" name="zipcode" value="" id="zipcode" autocomplete="zipcode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    }
                                                    ?>
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
                                        <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px] mb-10">Verify Account</h2>
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
                                                                    <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="phone number" name="phone" value="<?php echo $row3['phone']; ?>" readonly />
                                                                </div>

                                                            </div>
                                                            <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">Phone Number Verified Successfully. But if you want to change your number, <a data-id="<?php echo $row3['user_id']; ?>" data-number="<?php echo $row3['phone']; ?>" id="defaultModalButton1" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-red-700">click here.</a> </p>
                                                        </form>
                                                    <?php
                                                    } else if ($row3['verify__phone'] == '0') {
                                                    ?>
                                                        <form class=" mx-auto" action="poss/verity-phone.php" method="post">
                                                            <div class="flex items-center">
                                                                <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border rounded-s-lg " type="button">
                                                                    +66 (TH)
                                                                </button>
                                                                <div class="relative w-full flex">
                                                                    <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="phone number" name="phone" value="<?php echo $row3['phone']; ?>" readonly />
                                                                    <a data-id="<?php echo $row3['user_id']; ?>" data-number="<?php echo $row3['phone']; ?>" id="defaultModalButton1" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-2 ms-2">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                                        </svg>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                            <p id="helper-text-explanation" class="mt-2 mb-4 text-sm text-gray-500 dark:text-gray-400">We will send you an SMS with a verification code.</p>
                                                            <button type="submit" class="text-white w-full lg:w-48 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send verification code</button>
                                                        </form>
                                                    <?php
                                                    } else {
                                                    ?>

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
                                                            <button type="submit" class="text-white w-full lg:w-48 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" name="ver-mail">Send verification code</button>
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

                        <section x-show="activeTab === 2" role="tabpanel" class="p-8">
                            <form>
                                <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
                                    <div class="border-b border-gray-900/10 pb-12">
                                        <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Booking history</h2>
                                        <!-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->

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
                                                            pay_date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            pay_type
                                                        </th>

                                                        <th scope="col" class="px-6 py-3">
                                                            Contractor Name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $stmt3 = $conn->query("SELECT * FROM `booking_list` WHERE `user_id`= {$_SESSION['id']}");
                                                while ($booking = mysqli_fetch_assoc($stmt3)) {
                                                ?>
                                                    <tbody>
                                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                #<?php echo $booking['job_id']; ?>
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                booking_<?php echo $booking['b_type']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <?php echo $booking['bdate']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <?php echo $booking['btime']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                name Contractor
                                                            </td>
                                                            <td class="py-4 flex gap-2">
                                                                <?php
                                                                if ($booking['action'] == "accept") {
                                                                ?>
                                                                    <?php
                                                                    if ($booking['b_type'] == "2") {
                                                                    ?>
                                                                        <span class="bg-green-100 h-5 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">accept</span>
                                                                        <?php
                                                                        if (!empty($booking['boq_file'])) {
                                                                        ?>
                                                                            <a href="./boq_file/<?php echo $booking['boq_file'] ?>" target="_blank" class="p-1 rounded-md bg-emerald-500 hover:bg-emerald-600">
                                                                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2" />
                                                                                </svg>
                                                                            </a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a href="#" target="_blank" class="p-1 rounded-md bg-red-500 hover:bg-red-600 cursor-no-drop">
                                                                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2" />
                                                                                </svg>
                                                                            </a>
                                                                        <?php

                                                                        }
                                                                        ?>


                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">accept</span>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                <?php
                                                                } else if ($booking['action'] == "reject") {
                                                                ?>
                                                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">reject</span>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="bg-gray-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">Wait Contractor</span>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="px-6 py-4 text-right">
                                                                <a data-modal-target="default-modal" data-modal-toggle="default-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">รายละเอียด</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
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
                            </form>
                        </section>

                        <section x-show="activeTab === 3" role="tabpanel" class="p-8">
                            <form>
                                <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
                                    <div class="border-b border-gray-900/10 pb-12">
                                        <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Billing Package</h2>
                                        <!-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Service name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Billing number
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            pay_date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            pay_type
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Price
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $stmt1 = $conn->query("SELECT * FROM `payment_detail` WHERE `user_payment`= {$_SESSION['id']}");
                                                while ($payment = mysqli_fetch_assoc($stmt1)) {
                                                ?>
                                                    <tbody>
                                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $payment['type_package']; ?>
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                <?php echo $payment['t_id']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <?php echo $payment['pay_date']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <?php echo $payment['pay_type']; ?>
                                                            </td>
                                                            <td class="px-6 py-4">฿
                                                                <?php echo $payment['pay_amount']; ?>
                                                            </td>
                                                            <td class="px-6 py-4 text-right">
                                                                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline">รายละเอียด</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                            </form>
                        </section>

                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Update phone number
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="user_id" name="user_id" value="some_user_id">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                                <input type="number" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="phone" value="phone" required>
                                            </div>

                                        </div>
                                        <button type="submit" name="update_number" style="background-color: #B20C01 !important;" type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script>
    document.querySelectorAll('[data-modal-toggle="defaultModal"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action

            const id = this.getAttribute('data-id');
            const phone = this.getAttribute('data-number');
            // Make an AJAX call or fetch to get the data for this ID
            document.getElementById('phone').value = phone
            document.getElementById('user_id').value = id;


        });
    });
</script>
<?php
if (isset($_POST['update_number'])) {
    $phone = $_POST['phone'];
    $user_id = $_POST['user_id'];
    $stmt = $conn->prepare("UPDATE userprofile SET phone = ? WHERE user_id = ?");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("si", $phone, $user_id);
    if ($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    } else {
        echo "<script>Swal.fire({
            title: 'Update Phone Number Success',
            text: 'Welcome to Best Contrac',
             icon: 'success',
             confirmButtonColor: '#B20C01',
             confirmButtonText: 'Go To website'
        }).then((result) => {
            if (result.isConfirmed) {
                 window.location.href = './personaupdate.php';
             }
         })</script>";
    }
    $stmt->close();
    $conn->close();
}
?>


</html>