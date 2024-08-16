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
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
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
    <div class="bg-white dark:bg-gray-900">
      <div class="py-8 lg:py-10 px-4 mx-auto max-w-screen-md">
        <input type="hidden" name="work_id" value="<?php echo $_GET['work_id']; ?>">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-start text-gray-900 dark:text-white">ให้คะแนนผู้รับเหมา</h2>
        <p class="mb-8 lg:mb-10 font-light text-start text-gray-500 dark:text-gray-400 sm:text-xl">Receive a 5% discount on your next service use for review</p>
        <div class="pb-3">
          <?php $stmt = $conn->query("SELECT works.* FROM works JOIN booking_list ON works.booking_id = booking_list.job_id WHERE booking_list.user_id = {$_SESSION['id']} ");
          while ($billing = mysqli_fetch_assoc($stmt)) { ?>
            <div class="flex mb-10 items-center justify-center">
              <div class="relative flex w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                  <img src="project_order/<?php echo ($billing['image_intro']) ?>" alt="image" class="h-full w-full object-cover" />
                </div>
                <div class="p-6">
                  <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                    ระยะเวลา <?php echo ($billing['start_date']); ?> ถึง <?php echo ($billing['end_date']); ?>
                  </h6>
                  <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">พลรับเหมา
                  </h4>
                  <p class="mb-4 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                    <?php echo ($billing['work_details']); ?>
                  </p>

                  <p class="mb-4 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                    งบประมาณ <?php echo ($billing['price']); ?> บาท
                  </p>
                  <div class="button-update flex mt-10">
                    <a class="inline-block" href="tracking_detail.php?work_id=<?php echo ($billing['booking_id']) ?>">
                      <button class="bg-slate-200 flex select-none items-center gap-2 rounded-lg py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        ดูรายละเอียดเพิ่มเติม
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                        </svg>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <form class="space-y-8" method="post">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">อีเมล</label>
            <input type="email" id="email" name="semail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="ระบุอีเมล์" value="<?php echo $_SESSION['email']; ?>" required>
          </div>
          <div class="sm:col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">รีวิวผู้รับเหมา</label>
            <textarea id="message" rows="6" name="smessage" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="เขียนรีวิวผู้รับเหมาได้ที่นี่ ..."></textarea>
          </div>
          <div class="sm:col-span-2">
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">ให้คะแนนผู้รับเหมา</label>
            <div class="rating">
              <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-green-500" />
              <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-green-500" />
              <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-green-500" />
              <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-green-500" checked="checked" />
              <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-green-500" />
            </div>
          </div>

          <button type="submit" name="review-submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="background-color: #B20C01 !important;">Send message</button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>
<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['review-submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['semail']);
  $message = mysqli_real_escape_string($conn, $_POST['smessage']);
  $rating = mysqli_real_escape_string($conn, $_POST['rating']);

  $sql = "UPDATE works SET review='$message', rating='$rating' WHERE booking_id=$booking_id";

  if (mysqli_query($conn, $sql)) {
    $mail = new PHPMailer(true);
    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'joejeddoo@gmail.com';
      $mail->Password = 'frevlpppvpsjxjll';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;

      $mail->setFrom('no-reply@yourdomain.com', 'Mailer');
      $mail->addAddress($email);

      // Content
      $mail->isHTML(true);
      $mail->Subject = 'Review Contractor Submitted';
      $mail->Body = "Thank you for your review. Here is what you submitted:<br><br>Message: $message<br>Rating: $rating stars";
      $mail->AltBody = "Thank you for your review. Here is what you submitted:\n\nMessage: $message\nRating: $rating stars";

      $mail->send();
      echo "<script>Swal.fire({
            title: 'Review Success!',
            text: 'ขอบคุณสำหรับการรีวิว คุณสามารถเช็คได้ในอีเมล์ของคุณ $email',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Enter'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './tracking.php';
            }
        })</script>";
    } catch (Exception $e) {
      echo "เกิดข้อผิดพลาดในการส่งอีเมล: {$mail->ErrorInfo}";
    }
  } else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
  }
}
?>
