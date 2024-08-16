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
        <div class="md:max-w-screen-sm text-center px-4 sm:px-6 lg:px-8 pt-24 pb-6 mx-auto">
            <h1 class="mb-2 text-2xl font-bold md:text-4xl dark:text-white">นโยบายความเป็นส่วนตัว</h1>
            <p class="text-gray-700 dark:text-neutral-400">อัปเดตล่าสุด: วันที่ 19 กรกฎาคม พ.ศ. 2567</p>
        </div>
        <div class="md:max-w-screen-sm lg:max-w-[992px] px-4 sm:px-6 lg:px-8 pb-12 md:pt-6 sm:pb-20 mx-auto">
            <div class="grid gap-4 md:gap-8">
                <div>
                    <p class="mb-8 dark:text-neutral-400 text-xl">ยินดีต้อนรับสู่ BestContrac แพลตฟอร์มสำหรับหาผู้รับเหมาที่มีความชำนาญเฉพาะทาง นโยบายความเป็นส่วนตัวนี้จะอธิบายแนวทางปฏิบัติของเราเกี่ยวกับการเก็บรวบรวม การใช้งาน และการรักษาความปลอดภัยของข้อมูลส่วนบุคคลที่เป็นความลับที่คุณให้ผ่านแพลตฟอร์มของเรา โดยการใช้บริการของเรา ถือว่าคุณยอมรับการเก็บรวบรวมและการใช้ข้อมูลตามที่อธิบายไว้ในนโยบายนี้</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อมูลที่เก็บรวบรวม</h2>
                    <p class="mb-5 dark:text-neutral-400">ที่ BestContrac ความเป็นส่วนตัวของคุณคือสิ่งสำคัญ เราไม่แชร์ ขาย หรือให้เช่าข้อมูลส่วนบุคคลของคุณกับบุคคลที่สาม ข้อมูลทั้งหมดที่เก็บไว้ผ่านบริการของเราเป็นของคุณและสามารถโอนย้ายหรือลบออกได้ตามคำขอ แม้ว่าสิ่งนี้อาจจำกัดการเข้าถึงเนื้อหาบางอย่าง</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อมูลบัญชี
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">การสร้างบัญชีที่ BestContrac ต้องการให้รายละเอียดส่วนบุคคล เช่น ชื่อ ที่อยู่อีเมล และรหัสผ่าน ซึ่งจำเป็นสำหรับการตั้งค่าและการเข้าถึงบัญชี</p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อมูลการชำระเงิน
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">สำหรับการประมวลผลการชำระเงิน เราใช้บริการของบุคคลที่สามที่เชื่อถือได้ ในระหว่างการทำธุรกรรม พวกเขาอาจขอรายละเอียดส่วนบุคคล เช่น ชื่อ ที่อยู่ อีเมล และข้อมูลบัตรเครดิต นโยบายความเป็นส่วนตัวของบุคคลที่สามเหล่านี้จะกำหนดการจัดการข้อมูลของพวกเขา BestContrac ไม่รับผิดชอบต่อแนวปฏิบัติของบุคคลที่สามเหล่านี้
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อมูลการใช้งาน
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เรารวบรวมข้อมูลเกี่ยวกับการโต้ตอบของผู้ใช้กับ BestContrac รวมถึงรูปแบบการใช้งานและข้อมูลอุปกรณ์ เพื่อปรับปรุงแพลตฟอร์มของเรา
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การปฏิบัติตามกฎหมายและการใช้งานทั่วไป
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">BestContrac อาจเปิดเผยข้อมูลส่วนบุคคลหากกฎหมายกำหนด เช่น เพื่อตอบสนองต่อคำสั่งศาลหรือการสืบสวนการฉ้อโกง นอกจากนี้เรายังใช้ข้อมูลผู้ใช้ที่ไม่สามารถระบุตัวตนได้สำหรับการวิเคราะห์ทั่วไป
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การแชร์และการเปิดเผยข้อมูล
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราใช้บริการของบุคคลที่สาม เช่น Google Analytics เพื่อวัตถุประสงค์ในการวิเคราะห์ บุคคลเหล่านี้เข้าถึงข้อมูลของคุณได้เพียงเพื่อปฏิบัติหน้าที่ในนามของเรา และต้องไม่เปิดเผยหรือใช้ข้อมูลเพื่อวัตถุประสงค์อื่น
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">สิทธิของคุณ
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">คุณมีสิทธิ์เข้าถึง แก้ไข และขอลบข้อมูลส่วนบุคคลของคุณ โดยมีข้อจำกัดบางประการในการเข้าถึงผลิตภัณฑ์และบริการของเรา
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การเก็บรักษาข้อมูล
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราจะเก็บรักษาข้อมูลส่วนบุคคลตราบเท่าที่บัญชีของคุณยังคงใช้งานอยู่หรือเท่าที่จำเป็นในการให้บริการ
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ความปลอดภัย
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เรามุ่งมั่นที่จะรักษาความปลอดภัยของข้อมูลของคุณ โดยใช้การเข้ารหัสและมาตรฐานความปลอดภัยเป็นประจำ
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ความเป็นส่วนตัวของเด็ก
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">BestContrac มีไว้สำหรับผู้ที่มีอายุถึงเกณฑ์กฎหมายในเขตอำนาจศาลของตนและอาศัยอยู่ในภูมิภาคที่การใช้งานนี้ได้รับอนุญาต เราไม่เก็บข้อมูลจากผู้ที่มีอายุต่ำกว่าเกณฑ์กฎหมายโดยรู้เท่า
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การเปลี่ยนแปลงนโยบายความเป็นส่วนตัว
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">เราอาจแก้ไขนโยบายนี้ได้ทุกเมื่อ การใช้ BestContrac อย่างต่อเนื่องถือว่าคุณยอมรับการเปลี่ยนแปลงเหล่านี้
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ติดต่อเรา
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">หากมีคำถามเกี่ยวกับนโยบายความเป็นส่วนตัวนี้หรือแนวปฏิบัติความเป็นส่วนตัวของเรา โปรดติดต่อเราผ่านการแชทบนเว็บไซต์ของเรา หรือติดต่อ service@bestcontrac.com</p>

                    <h2 class="text-lg font-semibold mb-2 dark:text-white">ข้อตกลง
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">โดยการใช้ผลิตภัณฑ์และบริการของ BestContrac คุณยืนยันว่าคุณเข้าใจและยอมรับนโยบายความเป็นส่วนตัวนี้
                    </p>
                    <h2 class="text-lg font-semibold mb-2 dark:text-white">การเปลี่ยนแปลงความเป็นส่วนตัว
                    </h2>
                    <p class="mb-5 dark:text-neutral-400">หากเรามีนโยบายความเป็นส่วนตัวใหม่ เราจะโพสต์การเปลี่ยนแปลงเหล่านั้นในหน้านี้ ผู้ใช้ที่ลงทะเบียนจะได้รับอีเมลที่ระบุการเปลี่ยนแปลงที่เกิดขึ้นกับนโยบายความเป็นส่วนตัว
                    </p>
                </div>
            </div>
        </div>
    </main>
    <?php include('./footer.php') ?>

</body>

</html>