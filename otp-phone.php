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
    <script src="https://unpkg.com/alpinejs"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@ryangjchandler/alpine-tooltip@1.2.0/dist/cdn.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/createpindigit.css">
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
    <form method="post">
        <main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-24">
                <div class="flex justify-center">
                <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
                    <header class="mb-8">
                        <h1 class="text-2xl font-bold mb-1">Mobile Phone Verification</h1>
                        <p class="text-[15px] text-slate-500">Enter the 6-digit verification code that was sent to your phone number.</p>
                    </header>
                        <div class="pin-code-filed">
                            <input type="text" maxlength="1" name="pin1" oninput="moveFocusNext(this,'pin2')">
                            <input type="text" maxlength="1" name="pin2" oninput="moveFocusNext(this,'pin3')" onkeyup="moveFocusBack(this,'pin1')">
                            <input type="text" maxlength="1" name="pin3" oninput="moveFocusNext(this,'pin4')" onkeyup="moveFocusBack(this,'pin2')">
                            <input type="text" maxlength="1" name="pin4" oninput="moveFocusNext(this,'pin5')" onkeyup="moveFocusBack(this,'pin3')">
                            <input type="text" maxlength="1" name="pin5" oninput="moveFocusNext(this,'pin6')" onkeyup="moveFocusBack(this,'pin4')">
                            <input type="text" maxlength="1" name="pin6" onkeyup="moveFocusBack(this,'pin5')">

                        </div>
                       
                        <div class="max-w-[260px] mx-auto mt-8">
                            <button type="submit" name="submit"
                                class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-red-800 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-red-950/10 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-red-300 transition-colors duration-150">Verify
                                Phone</button>
                        </div>
                    </div>
                </div>
        </main>
    </form>

</body>
<script>
    window.onload = function() {
        document.getElementsByName('pin1')[0].focus()
    }

    function moveFocusNext(currentInput, nextInputName) {
        if (currentInput.value.length === currentInput.maxLength) {
            document.getElementsByName(nextInputName)[0].focus();
        }
    }

    function moveFocusBack(currentInput, previousInputName) {
        if (currentInput.value.length === 0 && event.key === "Backspace") {
            document.getElementsByName(previousInputName)[0].focus();
        }
    }
</script>

</html>
<?php 

if(isset($_POST['submit'])){

    $pin1 = $_POST['pin1'];
    $pin2 = $_POST['pin2'];
    $pin3 = $_POST['pin3'];
    $pin4 = $_POST['pin4'];
    $pin5 = $_POST['pin5'];
    $pin6 = $_POST['pin6'];

    $pin = $pin1 . $pin2  . $pin3  . $pin4  . $pin5  . $pin6 ; 

if ($pin ==  $_SESSION['phoneOtp']){

    $stmt =$conn->query("UPDATE userprofile SET verify__phone = 1 WHERE user_id = {$_SESSION['id']}");
    
    if($_SESSION['user'] == 'contractor'){
        $location = 'personaupdatecon.php';
    }else{
        $location = 'personaupdate.php';
    }

    echo "<script>Swal.fire({
        title: 'Verify Phone Success',
        text: 'Pincode For phone ',
         icon: 'success',
         confirmButtonColor: '#B20C01',
         confirmButtonText: 'Go To website'
    }).then((result) => {
        if (result.isConfirmed) {
             window.location.href = '$location';
         }
     })</script>";

} else{
    echo "<script>Swal.fire({
        title: 'Verify falled',
        text: 'Please try again',
         icon: 'error',
         confirmButtonColor: '#B20C01',
         confirmButtonText: 'Try Again'
    })</script>";
}

}

?>
