<?php
require_once '../includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJSON(['success' => false, 'message' => 'Invalid request method']);
}

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['amount'])) {
    sendJSON(['success' => false, 'message' => 'Amount not provided']);
}

$amount = floatval($input['amount']);
$newBalance = updateBalance($amount);

sendJSON([
    'success' => true,
    'balance' => formatCurrency($newBalance),
    'amount' => $amount,
    'new_balance' => $newBalance
]);
?>
