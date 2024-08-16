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
if (isset($_GET['work_id'])) {
    $booking_id = intval($_GET['work_id']);
    $_SESSION['work_id'] = $booking_id;
} elseif (isset($_SESSION['work_id'])) {
    $booking_id = $_SESSION['work_id'];
} else {
    die('ต้องระบุ Booking ID.');
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
        <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Billing Period</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Work_id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Period
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pay Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Percent
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Payment Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <?php
                        $stmt = $conn->query("SELECT payments_id, works_id, paydate, amount, percent, payment_status FROM payments_period WHERE works_id = $booking_id");
                        $installment_count = 1;
                        if (mysqli_num_rows($stmt) > 0) {
                            echo "<tbody>";
                            while ($billing = mysqli_fetch_assoc($stmt)) {
                        ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        #<?php echo htmlspecialchars($billing['works_id']); ?>_<?php echo htmlspecialchars($billing['payments_id']); ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        งวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($billing['paydate']); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($billing['amount']); ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        <?php echo htmlspecialchars($billing['percent']); ?> %
                                    </td>
                                    <td class="py-4 px-6 flex">
                                        <?php
                                        if ($billing['payment_status'] == "1") {
                                        ?>
                                            <!-- <a class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                                กำลังตรวจสอบการจ่าย
                                            </a> -->
                                            <span class="bg-gray-300 h-5 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">กำลังตรวจสอบการจ่าย</span>

                                        <?php
                                        } else if ($billing['payment_status'] == "2") {
                                        ?>
                                            <!-- <a class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            จ่ายเงินสำเร็จ
                                            </a> -->
                                            <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">จ่ายงวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?></span>
                                        <?php
                                        } else if ($billing['payment_status'] == "3") {
                                        ?>
                                            <span class="bg-red-100 h-5 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">ปฏิเสธการจ่ายเงินงวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?></span>
                                        <?php
                                        } else if ($billing['payment_status'] == "4") {
                                        ?>
                                            <span class="bg-green-100 h-5 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">จ่ายงวดชำระครั้งที่ <?php echo htmlspecialchars($installment_count); ?></span>

                                        <?php
                                        } else {
                                        ?>
                                            <a href="payment_work.php?payment_id=<?php echo urlencode($billing['payments_id']); ?>&work_id=<?php echo urlencode($billing['works_id']); ?>&amount=<?php echo urlencode($billing['amount']); ?>" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                จ่ายงวดชำระ
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                $installment_count++;
                            }
                            echo "</tbody>";
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div>

    </div>
</body>

</html>