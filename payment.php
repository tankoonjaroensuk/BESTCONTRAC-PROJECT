<?php
use Infobip\Model\EmailLogsResponse;
require_once('./condb.php');

if (isset($_POST['package'])) {
    $selectedPackagePrice = $_POST['package'];
    $query = $conn->query("SELECT * FROM package WHERE package_id = '$selectedPackagePrice' ");
    $fetch = mysqli_fetch_assoc($query);
    $selectedPackagePrice = $fetch['amout_package'];
    $amountToCharge = $fetch['amout_package'] * 100;
    $type = 'package';
} else {
    $selectedPackagePrice = 'Not Found Package';
    $amountToCharge = 0;
}

session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'user') {
    header('Location: ./login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <section class="antialiased  min-h-screen p-4">
            <div class="h-full">
                <div class="relative px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto" x-data="{ card: true }">
                    <div class="bg-white px-8 pb-6 rounded-b">
                        <div class="flex justify-center mb-6">
                            <div class="relative flex w-full p-1 bg-gray-50 rounded">
                                <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
                                    <span class="absolute inset-0 w-1/2 bg-white rounded border border-gray-200 shadow-sm transform transition duration-150 ease-in-out" :class="card ? 'translate-x-0' : 'translate-x-full'"></span>
                                </span>
                                <button class="relative flex-1 text-sm font-medium p-1 transition duration-150 ease-in-out focus:outline-none focus-visible:ring-2" @click.prevent="card = true">Pay With Online Banking</button>
                                <button class="relative flex-1 text-sm font-medium p-1 transition duration-150 ease-in-out focus:outline-none focus-visible:ring-2" @click.prevent="card = false">Pay With Card </button>
                            </div>
                        </div>
                        <form action="pay_online.php" method="post" enctype="multipart/form-data">
                            <div x-show="card">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-nr">เลขที่บัญชี กสิกรไทย
                                            <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <label for="npm-install-copy-button" class="sr-only">Label</label>
                                            <input id="npm-install-copy-button" type="text" class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="036-3-82876-0" disabled readonly>
                                            <button data-copy-to-clipboard-target="npm-install-copy-button" data-tooltip-target="tooltip-copy-npm-install-copy-button" class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                                <span id="default-icon">
                                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                                    </svg>
                                                </span>
                                                <span id="success-icon" class="hidden inline-flex items-center">
                                                    <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <span id="default-tooltip-message">Copy to clipboard</span>
                                                <span id="success-tooltip-message" class="hidden">Copied!</span>
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-name">ชื่อบัญชีธนาคาร <span class="text-red-500">*</span></label>
                                        <input id="card-name" class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="นาย แทนคุณ เจริญสุข" disabled readonly />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="file_pay">อัปโหลด ใบเสร็จการโอนเงิน<span class="text-red-500">*</span></label>
                                        <input id="file_pay" name="image_pay" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="file" required />

                                    </div>
                                    <input type="hidden" name="package" value="<?php echo htmlspecialchars($selectedPackagePrice); ?>">
                                    <input type="text" name="type" value="<?php echo $type ?>" hidden>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-4">
                                        <button name="pay_onlinebanking" class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Pay <?php echo htmlspecialchars($selectedPackagePrice); ?>.00 THB</button>
                                    </div>
                                    <div class="text-xs text-gray-500 italic text-center">You'll be charged %7 for VAT in Thailand</div>
                                </div>
                        </form>
                    </div>
                    <div x-show="!card" x-cloak>
                        <div>
                            <div class="mb-4">
                                <form name="checkoutForm" method="POST" action="checkout.php">
                                    <div class="w-full font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out  bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">
                                        <input type="hidden" name="package" value="<?php echo htmlspecialchars($selectedPackagePrice); ?>">
                                        <input type="text" name="type" value="<?php echo $type ?>" hidden>
                                        <script type="text/javascript" src="https://cdn.omise.co/omise.js" data-key="pkey_test_5z82pmcct8a9vkowopg" data-image="https://scontent.fbkk22-8.fna.fbcdn.net/v/t39.30808-6/432995021_930444285426683_3261725009997351016_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_ohc=Pk_r8HMe0pwAX_dihTP&_nc_ht=scontent.fbkk22-8.fna&oh=00_AfAMK6ZxOShGcVzjH_FcaDBFo_is_1iKsySkq9HXsh_4SA&oe=6609A53B" data-frame-label="Best Contrac" data-button-label="Credit / Debit" data-submit-label="ชำระเงิน" data-location="no" data-amount="<?php echo htmlspecialchars($amountToCharge); ?>" data-currency="thb">
                                        </script>
                                    </div>
                                </form>
                            </div>
                            <div class="text-xs text-gray-500 italic text-center">You'll be charged $253, including $48 for VAT in Italy</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
