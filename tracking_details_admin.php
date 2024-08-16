<?php
session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'admin') {
    header('Location: ./login.php');
    exit();
}
require_once('./condb.php');
if (isset($_GET['work_id'])) {
    $booking_id = intval($_GET['work_id']);
    $_SESSION['work_id'] = $booking_id;
} elseif (isset($_SESSION['work_id'])) {
    $booking_id = $_SESSION['work_id'];
} else {
    die('ต้องระบุ Booking ID.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./cdn.php") ?>
</head>

<body>
    <?php include("./headderadmin.php") ?>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg dark:text-white  bg-red-800 group">
                        <svg class="w-5 h-5 text-white-500 transition duration-75 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="workadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">งานทั้งหมด</span>
                    </a>
                </li>
                <li>
                    <a href="paymentadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">การเงิน</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 ">
        <?php
        $works_id = $booking_id;
        $query = "
            SELECT 
                payments_id, 
                works_id, 
                paydate, 
                amount, 
                percent, 
                payment_status, 
                update_detail
            FROM payments_period 
            WHERE works_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $works_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $allPaid = true;
        $installment_count = 1;

        if ($result->num_rows > 0) {
            echo "<tbody>";
            while ($billing = $result->fetch_assoc()) {
                if ($billing['payment_status'] != 4) {
                    $allPaid = false;
                }
        ?>
                <div class="flex justify-center bg-white px-6 lg:mt-20 mb-20 md:px-60">
                    <div class="space-y-6 border-l-2 border-dashed">
                        <div class="relative w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full <?php echo ($billing['payment_status'] == 4) ? 'text-blue-500' : 'text-gray-500'; ?>">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                            <div class="ml-6">
                                <h4 class="font-bold <?php echo ($billing['payment_status'] == 4) ? 'text-blue-500' : 'text-gray-500'; ?>">งวดชำระครั้งที่ <?php echo $installment_count ?> # <?php echo ($billing['payments_id']) ?></h4>
                                <?php if (empty($billing['update_detail'])) { ?>
                                    <p class="mt-2 max-w-screen-sm text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugit recusandae repudiandae laboriosam optio. Animi magni illum harum, dolorem eveniet voluptas voluptatem rem? Repellat aliquam autem, quae ea veritatis provident.</p>
                                <?php } else { ?>
                                    <p class="mt-2 max-w-screen-sm text-sm text-gray-500"><?php echo ($billing['update_detail']) ?></p>
                                <?php } ?>
                                <span class="mt-1 block text-sm font-semibold <?php echo ($billing['payment_status'] == 4) ? 'text-blue-500' : 'text-gray-500'; ?> mb-5"><?php echo $billing['paydate']; ?></span>
                                <div class="grid grid-cols-4 gap-10">
                                    <?php
                                    $images_stmt = $conn->query("SELECT image_name FROM image_period WHERE work_id = " . $billing['payments_id']);
                                    if ($images_stmt->num_rows > 0) {
                                        while ($image = $images_stmt->fetch_assoc()) {
                                    ?>
                                            <div>
                                                <img class="h-40 max-w-full rounded-lg" src="image_work_pr/<?php echo $image['image_name']; ?>" alt="">
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        echo "<div>
                                            <img class=\"h-auto max-w-full\" src=\"/docs/images/examples/image-1@2x.jpg\" alt=\"image description\">
                                        </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
                $installment_count++;
            }
            echo "</tbody>";
        } else {
            $allPaid = false;
        }

        $stmt->close();


        ?>
    </div>
</body>


</html>