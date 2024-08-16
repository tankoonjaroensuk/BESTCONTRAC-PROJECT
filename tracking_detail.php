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

        if ($allPaid) {
            echo "
            <div id=\"bottom-banner\" tabindex=\"-1\" class=\"fixed bottom-0 start-0 z-50 flex justify-between w-full p-4 border-t border-blue-200 bg-blue-200 dark:bg-blue-700 dark:border-blue-600\">
            <div class=\"flex items-center mx-auto\">
                <p class=\"flex items-center text-sm font-normal text-gray-500 dark:text-gray-400\">
                    <span class=\"inline-flex p-1 me-3 bg-gray-200 rounded-full dark:bg-gray-600 w-6 h-6 items-center justify-center\">
                        <svg class=\"w-3.5 h-3.5 text-gray-500 dark:text-gray-400\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"currentColor\" viewBox=\"0 0 20 20\">
                            <path d=\"M18.435 7.546A2.32 2.32 0 0 1 17.7 5.77a3.354 3.354 0 0 0-3.47-3.47 2.322 2.322 0 0 1-1.776-.736 3.357 3.357 0 0 0-4.907 0 2.281 2.281 0 0 1-1.776.736 3.414 3.414 0 0 0-2.489.981 3.372 3.372 0 0 0-.982 2.49 2.319 2.319 0 0 1-.736 1.775 3.36 3.36 0 0 0 0 4.908A2.317 2.317 0 0 1 2.3 14.23a3.356 3.356 0 0 0 3.47 3.47 2.318 2.318 0 0 1 1.777.737 3.36 3.36 0 0 0 4.907 0 2.36 2.36 0 0 1 1.776-.737 3.356 3.356 0 0 0 3.469-3.47 2.319 2.319 0 0 1 .736-1.775 3.359 3.359 0 0 0 0-4.908ZM8.5 5.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm3 9.063a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm2.207-6.856-6 6a1 1 0 0 1-1.414-1.414l6-6a1 1 0 0 1 1.414 1.414Z\"/>
                        </svg>
                        <span class=\"sr-only\">Discount</span>
                    </span>
                    <span>Receive a 5% discount on your next service use for review <a href=\"review.php?work_id=$booking_id\" class=\"flex items-center ms-0 text-sm font-medium text-blue-600 md:ms-1 md:inline-flex dark:text-blue-500 hover:underline\">Click to review here<svg class=\"w-3 h-3 ms-2 rtl:rotate-180\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 14 10\">
            <path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M1 5h12m0 0L9 1m4 4L9 9\"/>
          </svg></a></span>
                </p>
            </div>
            <div class=\"flex items-center\">
                <button data-dismiss-target=\"#bottom-banner\" type=\"button\" class=\"flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-black hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white\">
                    <svg class=\"w-3 h-3\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 14 14\">
                        <path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6\"/>
                    </svg>
                    <span class=\"sr-only\">Close banner</span>
                </button>
            </div>
        </div>";
        } else {
            echo "<p class=\"mt-2 text-sm text-gray-500\">No payments found.</p>";
        }
        ?>
    </div>
</body>


</html>