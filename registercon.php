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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
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

    <div class="font-[sans-serif] text-[#333]">
        <div class="min-h-screen flex fle-col items-center justify-center lg:mt-0 mt-10">
            <div class="grid md:grid-cols-2 gap-10 max-w-6xl w-full">
                <div class="max-md:text-center">
                    <h2 class="lg:text-6xl text-4xl font-extrabold lg:leading-[55px]">
                        Register to <br> Best contrac
                    </h2>
                    <p class="text-xl mt-10 lg:mb-20">if you have account you can <a href="login.php" class="text-red-600 hover:underline">Sign in here!</a></p>
                    <p class="text-xl lg:mt-20">User Register is<a href="register.php" class="text-red-600 font-semibold hover:underline ml-1">here</a></p>

                </div>
                <form action="poss/registercontracback.php" method="post">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="fname" placeholder="First Name" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="lname" placeholder="Last Name" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="email" placeholder="Email" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Phone" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="citizen_id" placeholder="citizen" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="bname" placeholder="Name of business" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="address" placeholder="Adress" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="state" placeholder="State" class=" bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="text" name="zipcode" placeholder="Zipcode" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="password" class="bg-gray-100 border-none mt-1 p-2 w-full border text-sm px-4 py-3.5 rounded-md outline-blue-600" required>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-6 lg:ms-0 ms-5">
                        <div class="text-sm">
                            <a data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-blue-600 hover:text-blue-500">
                                ข้อกำหนดและเงื่อนไข
                            </a>
                        </div>
                    </div>

                    <div class="!mt-10">
                        <button type="submit" name="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                            Register Contractor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        ข้อกำหนดและเงื่อนไข
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    ขอต้อนรับสู่เว็บไซต์ BestContract แพลตฟอร์มสำหรับการหาผู้รับเหมาสร้างบ้านและรีโนเวทบ้าน เพื่อให้การใช้บริการของท่านเป็นไปอย่างราบรื่น โปรดอ่านและทำความเข้าใจข้อกำหนดและเงื่อนไขการเก็บข้อมูลสำหรับผู้รับเหมาตอนสมัครเว็บไซต์ดังต่อไปนี้:
                    </p>
                    <ol class="text-base leading-relaxed text-gray-500 dark:text-gray-400 ">
                        <li>1. การเก็บรวบรวมข้อมูล
                        <li class="ps-3">1.1 ข้อมูลที่เก็บรวบรวม: เมื่อท่านสมัครเป็นผู้รับเหมาบนเว็บไซต์ BestContract เราอาจเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน เช่น ชื่อ-นามสกุล, ชื่อบริษัท, ที่อยู่อีเมล, หมายเลขโทรศัพท์, ที่อยู่, หมายเลขทะเบียนการค้า, ประสบการณ์การทำงาน, ความเชี่ยวชาญ และข้อมูลอื่นๆ ที่เกี่ยวข้องกับการสมัครสมาชิกและการให้บริการ</li>
                        <li class="ps-3">1.2 เราอาจเก็บรวบรวมข้อมูลเกี่ยวกับการใช้งานเว็บไซต์ของท่าน เช่น IP Address, ประเภทของเบราว์เซอร์, เวลาที่เข้าชม, และหน้าเว็บที่เข้าชม</li>
                        </li>
                        <li>2 วัตถุประสงค์ในการเก็บข้อมูล</li>
                        <li class="ps-3">2.1 การให้บริการ: เพื่อให้บริการที่มีประสิทธิภาพและตอบสนองต่อความต้องการของท่าน รวมถึงการติดต่อประสานงานกับผู้ใช้บริการ</li>
                        <li class="ps-3">2.2 การปรับปรุงบริการ: เพื่อยืนยันตัวตนและความถูกต้องของข้อมูลที่ท่านให้ไว้</li>
                        <li class="ps-3">2.3 การตลาด: เพื่อส่งข้อมูลเกี่ยวกับบริการ ข่าวสาร หรือโปรโมชั่นต่างๆ ให้กับท่าน หากท่านตกลงรับข่าวสาร</li>
                        <li>3. การเก็บรักษาข้อมูล</li>
                        <li class="ps-3">3.1 ความปลอดภัย: เราจะเก็บรักษาข้อมูลของท่านอย่างปลอดภัยโดยใช้มาตรการทางเทคนิคและการบริหารจัดการที่เหมาะสม
                        </li>
                        <li class="ps-3">3.2 ระยะเวลา: ข้อมูลของท่านจะถูกเก็บรักษาไว้ตราบเท่าที่จำเป็นสำหรับวัตถุประสงค์ที่ได้ระบุไว้ในข้อกำหนดนี้

                        </li>
                        <li>4. การเปิดเผยข้อมูล
                        </li>
                        <li class="ps-3">4.1 ผู้ใช้บริการ: ข้อมูลของท่านอาจถูกเปิดเผยแก่ผู้ใช้บริการที่สนใจติดต่อกับท่าน เพื่อวัตถุประสงค์ในการว่าจ้างงาน
                        </li>
                        <li class="ps-3">4.2 บุคคลที่สาม: เราจะไม่เปิดเผยข้อมูลของท่านแก่บุคคลที่สาม ยกเว้นกรณีที่ได้รับความยินยอมจากท่านหรือเป็นไปตามที่กฎหมายกำหนด

                        </li>
                        <li>5. สิทธิของท่าน
                        </li>
                        <li class="ps-3">5.1 การเข้าถึงและแก้ไขข้อมูล: ท่านมีสิทธิ์เข้าถึงและแก้ไขข้อมูลส่วนบุคคลของท่านที่เรามีอยู่
                        </li>
                        <li class="ps-3">5.2 การลบข้อมูล: ท่านสามารถร้องขอให้เราลบข้อมูลส่วนบุคคลของท่านได้ โดยส่งคำขอผ่านช่องทางที่เรากำหนด

                        </li>
                        <li>6. การเปลี่ยนแปลงข้อกำหนดและเงื่อนไข
                        </li>
                        <li>เราขอสงวนสิทธิ์ในการเปลี่ยนแปลงข้อกำหนดและเงื่อนไขนี้ โดยจะแจ้งให้ท่านทราบผ่านทางเว็บไซต์หรือช่องทางอื่นๆ ที่เหมาะสม
                        </li>
                        <li>7. การติดต่อเรา
                        </li>
                        <li class="ps-3">หากท่านมีคำถามหรือข้อสงสัยเกี่ยวกับข้อกำหนดและเงื่อนไขนี้ โปรดติดต่อเราได้ที่:
                            <ul>
                                <li>อีเมล: supportContractor@bestcontract.com</li>
                                <li>โทร: 02-123-4567</li>
                            </ul>
                        </li>
                        <li class="lg:mt-5 ">การที่ท่านสมัครเป็นผู้รับเหมาบนเว็บไซต์ BestContract ถือว่าท่านได้อ่านและยอมรับข้อกำหนดและเงื่อนไขการเก็บข้อมูลนี้แล้ว</li>
                    </ol>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>