<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

define('OMISE_PUBLIC_KEY', 'pkey_test_5z82pmcct8a9vkowopg');
define('OMISE_SECRET_KEY', 'skey_test_5z82prpf1fw9wjtdpg0');

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$sourceId = $input['source'];
$amount = $input['amount'];
$currency = $input['currency'];

try {
    $charge = OmiseCharge::create([
        'amount' => $amount,
        'currency' => $currency,
        'return_uri' => 'https://example.com/orders/345678/complete',
        'source' => $sourceId
    ]);

    echo json_encode($charge);
} catch (Exception $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
?>
