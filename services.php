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
</head>

<body>
    <div class="container mx-auto">
        <?php include('./headder.php') ?>
        <!-- <div class="choice-contractor py-10 flex justify-center items-center">
            <div class="container mx-aut rounded-lg">
                <h1 class="text-center font-bold text-[#09244B] lg:text-[57px]">ค้นหาผู้รับเหมาทั้งหมด</label>
                    <div class="px-5"></div>
                    <h2 class="text-stone-700 text-xl font-bold">Apply filters</h2>
                    <p class="mt-1 text-sm">Use filters to further refine search</p>
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex flex-col">
                            <label for="name" class="text-stone-600 text-sm font-medium">Name</label>
                            <input type="text" id="name" placeholder="raspberry juice" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="manufacturer" class="text-stone-600 text-sm font-medium">Manufacturer</label>
                            <input type="manufacturer" id="manufacturer" placeholder="cadbery" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="date" class="text-stone-600 text-sm font-medium">Date of Entry</label>
                            <input type="date" id="date" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="status" class="text-stone-600 text-sm font-medium">Status</label>

                            <select id="status" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option>Dispached Out</option>
                                <option>In Warehouse</option>
                                <option>Being Brought In</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                        <button class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>
                        <button class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Search</button>
                    </div>
            
        </div> -->


        <div class="choice-contractor pb-10 ">
            <div class="text-choice text-center">
                <h1 class="lg:text-[57px]  text-[#09244B]">ผลงานผู้รับเหมาทั้งหมด</h1>
            </div>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 lg:grid-col-2 pt-10 pb-10">
                <?php
                $limit = 3; 
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;
                $sql = "SELECT COUNT(*) FROM works";
                $result = $conn->query($sql);
                $row = $result->fetch_row();
                $total_rows = $row[0];
                $total_pages = ceil($total_rows / $limit);

                $stmt1 = $conn->query("SELECT * FROM `work_information` LIMIT $offset, $limit");
                while ($row1 = mysqli_fetch_assoc($stmt1)) {
                    $picture = $conn->query("SELECT * FROM work_gallery WHERE work_id = '{$row1['work_id']}' LIMIT 1");
                    $firstPic = mysqli_fetch_assoc($picture);
                ?>
                    <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm ms-10">
                        <a href="workcontractorfruser.php?project_id=<?php echo $row1['work_id']; ?>" class="z-20 absolute h-full w-full top-0 left-0 ">&nbsp;</a>
                        <div class="h-auto overflow-hidden">
                            <div class="h-44 overflow-hidden relative">
                                <?php if ($firstPic) { ?>
                                    <img src="image_work/<?php echo $firstPic['image_name'] ?>" alt="work-contractor ">
                                <?php } else { ?>
                                    <img src="image_work/default.png" alt="No image available">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bg-white py-4 px-3">
                            <div class="flex justify-between items-center">
                                <h3 class="text-md mb-2 font-medium"><?php echo $row1['w_name']; ?></h3>

                                <div class="flex relative z-40  items-center gap-2">
                                    <h3 class="flex text-xs mb-2 font-medium">
                                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                                <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                                            </svg></i> &nbsp; <?php echo $row1['w_district']; ?>
                                    </h3>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mb-2">
                                type work
                            </p>
                            <h3 class="text-xs mb-2 font-medium">ใช้เวลาก่อสร้าง <?php echo $row1['w_province']; ?> วัน</h3>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="flex items-center  justify-center space-x-px h-8 text-sm">
                    <li>
                        <a href="?page=<?php echo max(1, $page - 1); ?>" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li>
                            <a href="?page=<?php echo $i; ?>" class="flex items-center justify-center px-3 h-8 leading-tight <?php if ($page == $i) echo 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'; ?> text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li>
                        <a href="?page=<?php echo min($total_pages, $page + 1); ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>