<?php
require_once '../includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJSON(['success' => false, 'message' => 'Invalid request method']);
}

$_SESSION['balance'] = INITIAL_BALANCE;
$_SESSION['total_wins'] = 0;
$_SESSION['total_losses'] = 0;
$_SESSION['games_played'] = 0;

sendJSON([
    'success' => true,
    'balance' => formatCurrency(INITIAL_BALANCE),
    'raw_balance' => INITIAL_BALANCE,
    'message' => 'Balance reset successfully'
]);
?>
