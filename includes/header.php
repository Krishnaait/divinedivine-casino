<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . COMPANY_NAME : COMPANY_NAME; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?php echo SITE_URL; ?>assets/images/favicon.svg">
    
    <!-- Global Styles -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/global.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/responsive.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation Header -->
    <header class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <a href="<?php echo SITE_URL; ?>index.php" class="logo">
                    <i class="fas fa-gamepad"></i>
                    <span><?php echo COMPANY_NAME; ?></span>
                </a>
            </div>
            
            <nav class="navbar-menu">
                <a href="<?php echo SITE_URL; ?>index.php" class="nav-link">Home</a>
                <a href="<?php echo SITE_URL; ?>pages/games.php" class="nav-link">Games</a>
                <a href="<?php echo SITE_URL; ?>pages/about.php" class="nav-link">About</a>
                <a href="<?php echo SITE_URL; ?>pages/contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="navbar-right">
                <div class="balance-display">
                    <i class="fas fa-wallet"></i>
                    <span class="balance-amount" id="balance-display"><?php echo formatCurrency(getUserBalance()); ?></span>
                </div>
                <button class="btn-reset" id="reset-balance-btn" title="Reset Balance">
                    <i class="fas fa-redo"></i>
                </button>
            </div>
            
            <button class="hamburger" id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="<?php echo SITE_URL; ?>index.php" class="mobile-menu-link">Home</a>
        <a href="<?php echo SITE_URL; ?>pages/games.php" class="mobile-menu-link">Games</a>
        <a href="<?php echo SITE_URL; ?>pages/about.php" class="mobile-menu-link">About</a>
        <a href="<?php echo SITE_URL; ?>pages/contact.php" class="mobile-menu-link">Contact</a>
    </div>
    
    <!-- Main Content -->
    <main class="main-content">
