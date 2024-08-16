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

    <main id="content">
        <?php include('./headder.php') ?>
        <div class="md:max-w-screen-sm text-center pt-24 pb-6 mx-auto">
            <h1 class="mb-2 text-2xl font-bold md:text-4xl dark:text-white">ข้อกำหนดและเงื่อนไขของ Bestcontrac
            </h1>
            <p class="text-gray-700 dark:text-neutral-400">อัปเดตล่าสุด: วันที่ 19 กรกฎาคม พ.ศ. 2567</p>
        </div>
        <div class="md:max-w-screen-sm lg:max-w-[992px] px-4 sm:px-6 lg:px-8 pb-12 md:pt-6 sm:pb-20 mx-auto">
            <div class="grid gap-4 md:gap-8">
                <div>
                    <p class="mb-8 dark:text-neutral-400 text-xl">การใช้บริการของ Bestcontrac (ซึ่งต่อไปนี้จะเรียกว่า “เรา”, “ของเรา” หรือ “บริษัท”) ถือว่าคุณยอมรับข้อกำหนดและเงื่อนไขที่ระบุไว้ในเอกสารนี้ ("ข้อกำหนดและเงื่อนไข") คุณควรอ่านข้อกำหนดและเงื่อนไขเหล่านี้อย่างละเอียดก่อนที่คุณจะใช้บริการใด ๆ ของเรา</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อตกลงเบื้องต้น</h2>
                    <p class="mb-5 dark:text-neutral-400">การใช้บริการของ Bestcontrac (ซึ่งต่อไปนี้จะเรียกว่า “เรา”, “ของเรา” หรือ “บริษัท”) ถือว่าคุณยอมรับข้อกำหนดและเงื่อนไขที่ระบุไว้ในเอกสารนี้ ("ข้อกำหนดและเงื่อนไข") คุณควรอ่านข้อกำหนดและเงื่อนไขเหล่านี้อย่างละเอียดก่อนที่คุณจะใช้บริการใด ๆ ของเรา</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การเปลี่ยนแปลงข้อกำหนดและเงื่อนไข
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราอาจทำการปรับปรุงหรือเปลี่ยนแปลงข้อกำหนดและเงื่อนไขนี้เป็นระยะ ๆ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า การเปลี่ยนแปลงใด ๆ จะมีผลทันทีที่เผยแพร่ในเว็บไซต์ของเรา การใช้บริการต่อไปหลังจากการเปลี่ยนแปลงถือว่าคุณยอมรับข้อกำหนดและเงื่อนไขที่ปรับปรุงแล้ว

</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การใช้งานบริการ
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">คุณตกลงที่จะใช้บริการของเราตามกฎหมายที่เกี่ยวข้องและตามข้อกำหนดและเงื่อนไขนี้ การใช้บริการของเราสำหรับวัตถุประสงค์ที่ผิดกฎหมายหรือการละเมิดข้อกำหนดและเงื่อนไขอาจทำให้เราดำเนินการตามขั้นตอนที่จำเป็น
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การลงทะเบียนและบัญชี
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เพื่อใช้บริการบางอย่างของเรา คุณอาจต้องลงทะเบียนและสร้างบัญชี คุณตกลงที่จะให้ข้อมูลที่ถูกต้องและครบถ้วนในการลงทะเบียน และจะรับผิดชอบในการรักษาความลับของข้อมูลบัญชีและรหัสผ่านของคุณ
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ความรับผิดชอบ
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราไม่รับผิดชอบต่อความเสียหายหรือความสูญเสียที่เกิดจากการใช้บริการของเรา รวมถึงการใช้บริการที่ผิดกฎหมายหรือการละเมิดข้อกำหนดและเงื่อนไขนี้
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ลิขสิทธิ์และทรัพย์สินทางปัญญา
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เนื้อหาและทรัพย์สินทางปัญญาทั้งหมดในเว็บไซต์ของเรา รวมถึงเครื่องหมายการค้า, ลิขสิทธิ์, และสิทธิบัตร เป็นทรัพย์สินของเรา คุณไม่สามารถใช้หรือเผยแพร่เนื้อหาดังกล่าวโดยไม่ได้รับอนุญาตจากเรา
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การยกเลิกบริการ
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราขอสงวนสิทธิ์ในการยกเลิกหรือระงับการให้บริการแก่คุณหากคุณละเมิดข้อกำหนดและเงื่อนไขนี้
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การปฏิเสธความรับผิด
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">บริการทั้งหมดที่ให้โดยเราเป็นไปตาม "สภาพที่เป็นอยู่" และ "ตามความพร้อมใช้งาน" เราไม่รับประกันว่าบริการจะไม่หยุดชะงักหรือไม่มีข้อผิดพลาด
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อพิพาท
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">ข้อพิพาทที่เกิดขึ้นจากการใช้บริการของเราจะต้องได้รับการแก้ไขตามกฎหมายที่ใช้บังคับในประเทศไทย
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อกำหนดทั่วไป
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">ข้อกำหนดและเงื่อนไขนี้ถือเป็นข้อตกลงทั้งหมดระหว่างคุณและเราและแทนที่ข้อตกลงหรือการสื่อสารที่เกิดขึ้นก่อนหน้านี้
                    </p>
                    <p class="mb-5 dark:text-neutral-400">หากคุณมีคำถามหรือข้อสงสัยเกี่ยวกับข้อกำหนดและเงื่อนไขนี้ โปรดติดต่อเราที่ : service@bestcontrac.com
                    </p>
                    
                </div>
            </div>
        </div>
    </main>
    <?php include('./footer.php') ?>

</body>

</html>