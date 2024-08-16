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
        <div class="relative font-inter antialiased">
            <div class="w-full max-w-6xl mx-auto mt-20">
                <!-- Pricing table component -->
                <div x-data="{ isAnnual: true }">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-extrabold text-black sm:text-5xl">
                            Premium Package
                        </h2>
                        <p class="mt-4 text-xl text-black-200">
                            ปลดล็อคการดู BOQ ที่ผู้รับเหมาส่งให้ท่านได้ในแพ็คเก็ตราคาสุดคุ้ม
                        </p>
                    </div>
                    <form action="payment.php" method="post">

                        <div class="max-w-sm mx-auto mt-20 grid gap-6 lg:grid-cols-3 items-start lg:max-w-none">
                            <?php
                            $query = $conn->query("SELECT * FROM `package` ORDER BY `package_id` ");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <label class="h-full">
                                    <input type="radio" name="package" value="<?php echo $row['package_id'] ?>" class="hidden" />
                                    <div class="relative hover:border-blue-700 flex flex-col h-full p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-900 shadow shadow-slate-950/5">
                                        <div class="mb-5">
                                            <div class="text-slate-900 dark:text-slate-200 font-semibold mb-1"><?php echo $row['name_package'] ?></div>
                                            <div class="inline-flex items-baseline mb-2">
                                                <span class="text-slate-900 dark:text-slate-200 font-bold text-3xl">฿</span>
                                                <span class="text-slate-900 dark:text-slate-200 font-bold text-4xl" x-text="isAnnual ? '<?php echo $row['amout_package'] ?>' : '35'"></span>
                                                <span class="text-slate-500 font-medium">/Bath</span>
                                            </div>
                                        </div>
                                        <div class="text-slate-900 dark:text-slate-200 font-medium mb-3">Includes:</div>
                                        <ul class="text-slate-600 dark:text-slate-400 text-sm space-y-3 grow">
                                            <li class="flex items-center">
                                                <svg class="w-3 h-3 fill-emerald-500 mr-3 shrink-0" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.28 2.28L3.989 8.575 1.695 6.28A1 1 0 00.28 7.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 2.28z" />
                                                </svg>
                                                <span>เปิดไฟล์ BOQ <?php echo $row['number_openfile'] ?>/ครั้ง</span>
                                            </li>
                                        </ul>
                                    </div>
                                </label>
                            <?php
                            }
                            ?>
                             <div></div>
                            <button class="lg:mt-10 inline-flex justify-center whitespace-nowrap rounded-lg bg-sky-800 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-red-700 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 dark:focus-visible:ring-slate-600 transition-colors duration-150" type="submit" value="Submit" href="#">
                                Purchase Plan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const packageRadios = document.querySelectorAll('input[name="package"]');
        packageRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                // Remove the border-blue-500 class from all package divs
                document.querySelectorAll('.h-full > div').forEach(function(div) {
                    div.classList.remove('border-blue-500');
                });

                // Add the border-blue-500 class to the selected package div
                this.parentElement.querySelector('div').classList.add('border-blue-500');
            });
        });
    });
</script>

</html>