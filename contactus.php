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
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="image/logoaw.png" class="h-20" alt="Flowbite Logo" />
                <span class="text-xl text-gray-700 tracking-wider">BEST CONTRAC <p class="text-xs text-gray-600 tracking-wider ms-5">WE ARE SOLUTON</p></span>
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                    <a href="about.php" class="block py-2 px-3 text-gray-900 rounded text-xl hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">เกี่ยวกับเรา</a>
                    </li>
                    <li>
                        <a href="contactus.php" class="block py-2 px-3 text-gray-900 rounded text-xl hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">ติดต่อเรา</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="min-h-screen flex fle-col items-center justify-center mb-20 pb-20">
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
                            <input type="email" id="email" name="semail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="gmail.com" required="">
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                            <input type="text" id="subject" name="sname" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required="">
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

</body>

</html>