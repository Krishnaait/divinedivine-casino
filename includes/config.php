<?php
// DineDivine Ventures - Configuration File
session_start();

// Company Information
define('COMPANY_NAME', 'DineDivine Ventures');
define('COMPANY_FULL_NAME', 'DineDivine Ventures Private Limited');
define('CIN', 'U56102HR2024PTC123713');
define('GST_NO', '06AALCD0239Q1ZA');
define('PAN_NO', 'AALCD0239Q');
define('ADDRESS', 'C/O Pardeep Saggar, 20-P DSC, Sec-23A, Shivaji Nagar, Gurgaon - 122001, Haryana');
define('EMAIL', 'contact@dinedivine.com');
define('PHONE', '+91-XXXXXXXXXX');

// Website Configuration
// Auto-detect site URL for any deployment environment
// Check for HTTPS including reverse proxy headers (Railway, Heroku, etc.)
$protocol = 'http';
if (
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
) {
    $protocol = 'https';
}
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$base_path = str_replace('\\', '/', $base_path); // Fix Windows paths
$base_path = preg_replace('#/(includes|pages|games|api)$#', '', $base_path); // Remove subdirectories
define('SITE_URL', $protocol . '://' . $host . $base_path . '/');
define('SITE_NAME', 'DineDivine Ventures');

// Game Configuration
define('INITIAL_BALANCE', 10000);
define('MIN_BET', 200);
define('MAX_BET', 5500);

// Database Configuration (if needed in future)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dinedivine');

// Initialize user session
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 'user_' . uniqid();
    $_SESSION['balance'] = INITIAL_BALANCE;
    $_SESSION['total_wins'] = 0;
    $_SESSION['total_losses'] = 0;
    $_SESSION['games_played'] = 0;
}

// Helper function to format currency
function formatCurrency($amount) {
    return '₹' . number_format($amount, 2);
}

// Helper function to get user balance
function getUserBalance() {
    return isset($_SESSION['balance']) ? $_SESSION['balance'] : INITIAL_BALANCE;
}

// Helper function to update balance
function updateBalance($amount) {
    $_SESSION['balance'] = max(0, $_SESSION['balance'] + $amount);
    return $_SESSION['balance'];
}

// Helper function for AJAX responses
function sendJSON($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}
?>
