 <?php
require_once("./condb.php");
session_start();

$selectedPackagePrice = isset($_POST['package']) ? $_POST['package'] : 'Not Found Package';
$type = $_POST['type'];

require_once dirname(__FILE__) . '/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
define('OMISE_PUBLIC_KEY', 'pkey_test_5z82pmcct8a9vkowopg');
define('OMISE_SECRET_KEY', 'skey_test_5z82prpf1fw9wjtdpg0');

if (!is_numeric($selectedPackagePrice)) {
    echo "Invalid package selected.";
    exit;
}

$amountToCharge = $selectedPackagePrice * 100;

try {
    $charge = OmiseCharge::create([
        'amount' => $amountToCharge,
        'currency' => 'thb',
        'card' => $_POST["omiseToken"],
    ]);

    if ($charge['status'] === 'successful') {
        echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
              <script>
              setTimeout(function() {
                 swal({
                     title: "Payment successful!",
                     text: "ชำระเงิน Package สำเร็จ  ",
                     type: "success"
                 }, function() {
                    window.location.href = "./paymenthistory.php";
                });
              }, 1000);
              </script>';

      
        $paydate = date('Y-m-d'); 
        $pay_time = date('H:i:s'); 
        $pay_amount = $selectedPackagePrice; 
        $t_id = $charge['transaction']; 
        $pay_type = "Cradit_card"; 
        

        $stmt = $conn->prepare("INSERT INTO `payment_detail` (`user_payment`, `pay_date`, `pay_time`, `pay_amount`, `t_id`, `pay_type`,`type_package`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $_SESSION['id'], $paydate, $pay_time, $pay_amount, $t_id, $pay_type,$type);

        if ($stmt->execute()) {
           
        } else {
            echo 'Error saving payment record: ' . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Charge failed: " . $charge['failure_code'] . " - " . $charge['failure_message'];
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
