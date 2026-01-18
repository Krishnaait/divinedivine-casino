<?php
require_once '../includes/config.php';

header('Content-Type: application/json');

$balance = getUserBalance();

sendJSON([
    'success' => true,
    'balance' => formatCurrency($balance),
    'raw_balance' => $balance
]);
?>
