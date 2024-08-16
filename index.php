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
require_once('./condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contrac</title>
    <link rel="website icon" href="image/best_contrac_Logo-website.png" type="png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/alpinejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <div class="container mx-auto">
        <?php include('./headder.php') ?>
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg carousel-css">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carautoousel-item>
                    <img src="image/house-isolated-field.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></a>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/brannerreal.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/modern-residential-district-with-green-roof-balcony-generated-by-ai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/banner.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/6125421.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
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
        <div class="choice-contractor pb-10 ">
            <div class="text-choice text-center">
                <h1 class="lg:text-[57px]  text-[#09244B]"> มองหาผู้รับเหมาอยู่รึเปล่า ?</h1>
                <h2 class="pt-5 lg:text-[27px] ">เรามีผู้รับเหมาที่มีความชำนาญหลากหลาย พร้อมตัวกรองที่เหนือชั้น ทำให้คุณสามารถพบสิ่งที่ต้องการได้</h2>
            </div>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 lg:grid-col-2 pt-10 pb-10">
                <?php
                $query = $conn->query("SELECT * FROM `style` ORDER BY `job_db` ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <a class="relative mx-auto max-w-md overflow-hidden rounded-lg bg-white shadow" href="style.php?style=<?php echo $row['style_name'] ?>">
                        <div>
                            <img src="image/<?php echo $row['picture'] ?>" class="w-full object-cover" alt="" />
                        </div>
                        <div class="absolute inset-0 z-10 bg-gradient-to-t from-black"></div>
                        <div class="absolute inset-x-0 bottom-0 z-20 p-4">
                            <h3 class="text-xl font-medium text-white"><?php echo $row['style_name'] ?></h3>
                            <p class="mt-1 text-white text-opacity-80"><?php echo $row['description'] ?></p>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <diiv class="max-w-8xl mx-auto container bg-white dark:bg-gray-900 pt-16">
            <div>
                <div role="contentinfo" class="flex items-center flex-col px-4">
                    <p tabindex="0" class="focus:outline-none uppercase text-sm text-center text-gray-600 dark:text-gray-200 leading-4">Why Best Contrac</p>
                    <hh1 tabindex="0" class="mt-2 md:text-[50px] text-[#09244B] font-bold tracking-tight sm:text-[40px] text-[25px] lg:text-[57px] w-auto">ทำไมต้องผู้รับเหมาของเรา ?</hh1>
                </div>
                <div tabindex="0" aria-label="group of cards" class="focus:outline-none mt-20 flex flex-wrap justify-center gap-10 px-4">
                    <div tabindex="0" aria-label="card 1" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-bold leading-tight text-gray-800 dark:text-white">รวมรวมช่างที่ความชำนาญ</h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 dark:text-gray-200 leading-normal pt-2">พวกเรารวบรวมช่างที่มีประสบการณ์และความชำนาญตรงตามที่ลูกค้าต้องการเพื่อให้งานออกมาดีที่สุด</p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 2" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/icon_and_text-SVG2.svg" alt="check">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-semibold leading-tight text-gray-800 dark:text-white">ตัวกลางการติดต่อระหว่างทั้งสองฝ่าย</h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 dark:text-gray-200 leading-normal pt-2">พวกเรามีช่วยเป็นตัวกลางที่จะช่วยให้ลูกค้าและผู้รับเหมาติดต่อกันได้เพื่อตกลงและทำข้อสัญญา</p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 3" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/icon_and_text-SVG3.svg" alt="html tag">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-semibold leading-tight text-gray-800 dark:text-white">จองคิวง่ายเป็นระบบ พร้อมปรึกษาก่อนรับงาน</h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 dark:text-gray-200 leading-normal pt-2">จองคิวสะดวก และยังสามารถนัดวันที่กำหนด พร้อมก่อนปรึกษาก่อนจะเริ่มงาน</p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 4" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/icon_and_text-SVG4.svg" alt="monitor">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-semibold leading-tight text-gray-800 dark:text-white"> งบก่อสร้างไม่บานปลาย
                            </h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 dark:text-gray-200 leading-normal pt-2">ทำการตกลงราคา และแจ้งราคาชัดเจนก่อนตัดสินใจเริ่มงาน ทุกครั้ง</p>
                        </div>
                    </div>
                </div>
            </div>
        </diiv>

        <div class="grid grid-rows-1 grid-cols-1 md:grid-cols-2 ">
            <div class="relative w-full bg-white pt-4 pb-8 mt-8 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10">
                <div class="mx-auto px-5">
                    <div class="flex flex-col ">
                        <h2 class="mt-5 text-start text-3xl font-bold tracking-tight md:text-5xl">FAQ</h2>
                        <p class="mt-3 text-lg font-light text-start text-gray-500 dark:text-gray-400 sm:text-xl">Have many questions

                        </p>
                    </div>
                    <div class="mx-auto mt-8 grid max-w-xl divide-y divide-neutral-200">
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> How does the billing work?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Springerdata offers a variety of
                                    billing options, including monthly and annual subscription plans, as well as pay-as-you-go
                                    pricing for certain services. Payment is typically made through a credit card or other
                                    secure online payment method.
                                </p>
                            </details>
                        </div>
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> Can I get a refund for my subscription?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a 30-day money-back
                                    guarantee for most of its subscription plans. If you are not satisfied with your
                                    subscription within the first 30 days, you can request a full refund. Refunds for
                                    subscriptions that have been active for longer than 30 days may be considered on a
                                    case-by-case basis.
                                </p>
                            </details>
                        </div>
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> How do I cancel my subscription?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">To cancel your subscription, you can
                                    log in to your account and navigate to the subscription management page. From there, you
                                    should be able to cancel your subscription and stop future billing.
                                </p>
                            </details>
                        </div>
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> Is there a free trial?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a free trial of our software
                                    for a limited time. During the trial period, you will have access to a limited set of
                                    features and functionality, but you will not be charged.
                                </p>
                            </details>
                        </div>
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> How do I contact support?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">If you need help with our platform or
                                    have any other questions, you can contact the company's support team by submitting a support
                                    request through the website or by emailing support@ourwebsite.com.
                                </p>
                            </details>
                        </div>
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                    <span> Do you offer any discounts or promotions?</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We may offer discounts or promotions
                                    from time to time. To stay up-to-date on the latest deals and special offers, you can sign
                                    up for the company's newsletter or follow it on social media.
                                </p>
                            </details>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-900 lg:ps-10">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-start text-gray-900 dark:text-white">Contact Us</h2>
                    <p class="mb-8 lg:mb-16 font-light text-start text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
                    <form action="poss/writeemail.php" class="space-y-8" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                            <input type="email" id="email" name="semail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="<?php echo $_SESSION['email']; ?>" required>
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                            <input type="text" id="subject" name="sname" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Message</label>
                            <textarea id="message" rows="6" name="smessage" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Please Comment..."></textarea>
                        </div>
                        <button type="submit" name="sendme-submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="background-color: #B20C01 !important;">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('./footer.php') ?>

</body>

</html>