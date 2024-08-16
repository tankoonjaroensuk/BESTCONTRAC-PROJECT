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
        <form>
                                <div class="max-w-screen-xl items-center justify-between mx-auto p-4 mt-10">
                                    <div class="border-b border-gray-900/10 pb-12">
                                        <h2 class="text-base font-semibold leading-7 text-gray-900 lg:text-[30px]">Billing Package history</h2>
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

    </div>
</body>

</html>