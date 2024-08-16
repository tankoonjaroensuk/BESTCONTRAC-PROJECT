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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://unpkg.com/alpinejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@ryangjchandler/alpine-tooltip@1.2.0/dist/cdn.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <section class=" py-14 ">
            <?php $stmt = $conn->query("SELECT `work_information`.*, us.bname FROM `work_information` JOIN userprofile us ON work_con = us.user_id
            WHERE work_information.work_id LIKE {$_GET['project_id']}");
            $row = mysqli_fetch_assoc($stmt);
            $queryPic = $conn->query("SELECT * FROM work_gallery WHERE work_id = '{$_GET['project_id']}' ");

            ?>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
                <input type="hidden" name="con_id" value="<?php echo $_GET['project_id']; ?>">
                <div class="mb-5 rounded-full flex lg:justify-between">
                    <h1 class="text-4xl lg:text-5xl font-manrope text-[#09244B] font-bold "><?php echo $row['w_name']; ?></h1>
                    <a href="booking.php?project_id=<?php echo $row['work_id']; ?>" class="text-white lg:px-10 bg-[#B20C01] hover:bg-[#921A12]/90 font-medium rounded-lg text-lg sm:px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        &nbsp; Booking
                    </a>
                </div>
                <div class="mb-10 rounded-full flex ">
                    <h3 class="text-[40px] font-manrope text-[#09244B] font-samibold  "><?php echo $row['bname'] ?></h3>
                </div>
                <div class="mb-16 rounded-full " style="width: 70%;">
                    <p class="text-[20px] font-manrope text-[#09244B]   "><?php echo $row['w_detail']; ?></p>
                </div>

                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                        <?php
                        $i = 1;
                        while ($pic = mysqli_fetch_assoc($queryPic)) {
                        ?>
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img style="object-fit: cover; width:100%; object-position:center;" src="./image_work/<?php echo $pic['image_name'] ?>" alt="">
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                    <!-- Slider controls  -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>



            </div>
        </section>

        <section class="lg:py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative mb-10">
                <div class="rounded-full flex">
                    <h1 class="text-4xl lg:text-5xl font-manrope text-[#09244B] font-bold">ผลงานที่ผ่านมา</h1>
                </div>
            </div>

            <?php
            $stmt1 = $conn->query("SELECT * FROM `work_information` WHERE `work_con` = {$row['work_con']} AND `work_id` != {$_GET['project_id']}");
            while ($row1 = mysqli_fetch_assoc($stmt1)) {
                $picture = $conn->query("SELECT * FROM work_gallery WHERE work_id = '{$row1['work_id']}' ");
                $firstPic = mysqli_fetch_assoc($picture);
            ?>
                <a href="workcontractorfruser.php?project_id=<?php echo $row1['work_id'] ?>">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative mb-10 ">
                        <div class="grid grid-cols-1 md:grid-cols-2 ">
                            <div class="mt-12 md:mt-0">
                                <img src="image_work/<?php echo $firstPic['image_name'] ?>" alt="About Us Image" class="object-cover h-96rounded-lg shadow-md">
                            </div>
                            <div class="lg:ms-10 lg:mt-0 mt-5">
                                <h2 class="text-3xl font-samibold text-gray-900 sm:text-4xl lg:mb-10 mb-5"><?php echo $row1['w_name']; ?></h2>
                                <div class="">
                                    <a class="text-blue-500 hover:text-blue-600 font-medium"><?php echo $row1['w_district']; ?>
                                    </a>
                                </div>
                                <p class="mt-4 text-gray-600 text-lg"><?php echo $row1['w_detail']; ?></p>
                            </div>
                        </div>

                    </div>
                </a>
            <?php
            }
            ?>
        </section>

        <section class="lg:py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative mb-10 sm:mb-0">
                <div class=" rounded-full flex">
                    <h1 class="text-[50px] font-manrope text-[#09244B] font-bold">สมาชิกผู้รับเหมา</h1>

                </div>
                <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800 mt-5 lg:mt-15">
                    <?php
                    $querySyntax = "SELECT * FROM work_information
                     JOIN contractor_member ON work_information.work_con = contractor_member.member_con
                     WHERE work_information.work_id  = '{$_GET['project_id']}'";
                    $stmt5 = $conn->query($querySyntax);
                    while ($row5 = mysqli_fetch_assoc($stmt5)) {
                    ?>
                        <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                            <figcaption class="flex items-center justify-center ">
                                <img class="rounded-full w-9 h-9" src="image_member/<?php echo $row5['image_p'] ?>" alt="profile picture">
                                <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                                    <div><?php echo $row5['sub_n'] ?> xxxxx</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400 ">งานที่ถนัด: <?php echo $row5['sub_skill'] ?></div>
                                </div>
                            </figcaption>
                        </figure>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </section>

        <section class="lg:py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative mb-10">
                <div class=" rounded-full flex">
                    <h1 class="text-[50px] font-manrope text-[#09244B] font-bold">เอกสารอ้างอิง</h1>
                </div>
                <?php
                $querySyntax = "SELECT * FROM work_information
                     JOIN contractor_document ON work_information.work_con = contractor_document.doc_con
                     WHERE work_information.work_id  = '{$_GET['project_id']}'";
                $stmt = $conn->query($querySyntax);
                while ($row = mysqli_fetch_assoc($stmt)) {
                ?>
                    <div class="relative">
                        <label title="Click to upload" for="button2" class="mt-8 cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                            <div class="w-max relative">
                                <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon" width="512" height="512">
                            </div>

                            <div class="relative">
                                <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                                    <a href="contractor_information_document/<?php echo $row['doc_name'] ?>"><?php echo $row['doc_name'] ?></a>

                                </span>
                                <span class="mt-0.5 block text-sm text-gray-500">Open File PDF</span>
                            </div>

                        </label>
                    </div>
                <?php
                }
                ?>

            </div>
        </section>

        <section class="lg:py-10 lg:px-20">
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                <?php
                if (!function_exists('renderStars')) {
                    function renderStars($count)
                    {
                        $html = '<div class="flex items-center">';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $count) {
                                $html .= '<svg class="w-4 h-4 text-yellow-800 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>';
                            } else {
                                $html .= '<svg class="w-4 h-4 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>';
                            }
                        }
                        $html .= '</div>';
                        return $html;
                    }
                }

                $joinreview = $conn->query("SELECT 
            * 
            FROM booking_list 
            JOIN userprofile ON userprofile.user_id = booking_list.user_id
            JOIN work_information ON work_information.work_id = booking_list.con_id
            JOIN works ON works.booking_id = booking_list.job_id
            WHERE booking_list.con_id = '{$_GET['project_id']}'");

                if ($joinreview->num_rows > 0) {
                    while ($row12 = mysqli_fetch_assoc($joinreview)) {
                        $review_value = $row12['rating'];
                ?>
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16" class="text-gray-500">Jan 26, 2024</time>
                                <a href="#" class="relative z-10 rounded-full bg-[#C2443B] px-3 py-1.5 font-medium text-white hover:bg-[#B20C01]">รีโนเวทบ้าน</a>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        <?php echo $row12['project_name'] ?>
                                    </a>
                                </h3>
                                <p class="mt-5 mb-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                    <?php echo $row12['review'] ?>
                                </p>
                                <?php echo renderStars($review_value); ?>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                <img src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a>
                                            <span class="absolute inset-0"></span>
                                            <?php echo $row12['fname'] ?> <?php echo $row12['lname'] ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </article>
                <?php
                    }
                } else {
                    echo '<article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">Jan 26, 2024</time>
                        <a href="#" class="relative z-10 rounded-full bg-[#C2443B] px-3 py-1.5 font-medium text-white hover:bg-[#B20C01]">รีโนเวทบ้าน</a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                
                            </a>
                        </h3>
                        <p class="mt-5 mb-5 line-clamp-3 text-sm leading-6 text-gray-600">
                            <svg class="w-4 h-4 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </p>
                        
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a>
                                    <span class="absolute inset-0"></span>
                                    ไม่มีผู้ว่าจ้างรีวิว
                                </a>
                            </p>
                        </div>
                    </div>
                </article>';
                }
                ?>

            </div>
        </section>


    </div>

</body>

</html>