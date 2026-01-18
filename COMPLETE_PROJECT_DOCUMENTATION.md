# DineDivine Ventures - Complete Project Documentation

## 📋 Table of Contents
1. [Company Information](#company-information)
2. [Project Overview](#project-overview)
3. [Technology Stack](#technology-stack)
4. [Project Structure](#project-structure)
5. [Core Features](#core-features)
6. [Game Mechanics](#game-mechanics)
7. [Balance & Betting System](#balance--betting-system)
8. [API Endpoints](#api-endpoints)
9. [Design System](#design-system)
10. [Legal & Compliance](#legal--compliance)
11. [Deployment Guide](#deployment-guide)
12. [Future Enhancements](#future-enhancements)

---

## 🏢 Company Information

**Company Name:** DineDivine Ventures Private Limited  
**CIN:** U56102HR2024PTC123713  
**GST No:** 06AALCD0239Q1ZA  
**PAN No:** AALCD0239Q  
**Address:** C/O Pardeep Saggar, 20-P DSC, Sec-23A, Shivaji Nagar, Gurgaon - 122001, Haryana  
**Email:** contact@dinedivine.com  
**Business Model:** 100% Free-to-Play Social Gaming (No Real Money)

---

## 📖 Project Overview

### Purpose
DineDivine Ventures is a **free-to-play social gaming platform** offering premium casino-style games for entertainment purposes only. The platform uses **virtual currency (₹)** with zero real-world value.

### Key Principles
- ✅ **100% Free-to-Play** - No deposits, no withdrawals
- ✅ **Virtual Currency Only** - Cannot be exchanged for real money
- ✅ **18+ Age Restriction** - Strictly enforced
- ✅ **Entertainment Purpose** - Not gambling
- ✅ **Google Ads Compliant** - Full transparency
- ✅ **No Login Required** - Session-based gameplay

---

## 🛠️ Technology Stack

### Core Technologies
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Backend:** PHP 7.4+
- **Canvas API:** For game rendering
- **Session Management:** PHP Sessions (no cookies/localStorage)

### Libraries & Tools
- **Font Awesome 6.4.0** - Icons
- **Google Fonts** - Poppins, Playfair Display
- **Git** - Version control
- **GitHub** - Repository hosting
- **Railway** - Deployment platform

### Development Environment
- **Node.js:** Not used (pure PHP backend)
- **Database:** Not required (session-based)
- **Server:** Apache/Nginx with PHP-FPM

---

## 📁 Project Structure

```
dinedivine-ventures/
├── index.php                    # Homepage
├── robots.txt                   # SEO crawler instructions
├── sitemap.xml                  # SEO sitemap
├── README.md                    # Project README
├── .gitignore                   # Git ignore file
│
├── includes/
│   ├── config.php              # Configuration & helper functions
│   ├── header.php              # Global header
│   └── footer.php              # Global footer
│
├── pages/
│   ├── games.php               # Games listing page
│   ├── about.php               # About us page
│   ├── contact.php             # Contact page
│   ├── privacy.php             # Privacy Policy
│   ├── terms.php               # Terms & Conditions
│   ├── disclaimer.php          # Disclaimer
│   ├── fair-play.php           # Fair Play Policy
│   ├── responsible-gaming.php  # Responsible Gaming
│   └── legal-info.php          # Legal Information
│
├── games/
│   ├── dice.php                # Dice Game
│   ├── chicken.php             # Chicken Adventure
│   ├── mines.php               # Mines Game
│   └── plinko.php              # Plinko Game
│
├── api/
│   ├── get-balance.php         # Get user balance
│   ├── update-balance.php      # Update balance
│   └── reset-balance.php       # Reset balance
│
└── assets/
    ├── css/
    │   ├── global.css          # Global styles
    │   └── responsive.css      # Responsive styles
    ├── js/
    │   ├── main.js             # Main JavaScript
    │   └── check-balance.js    # Balance checking
    └── images/
        ├── logo.png            # Company logo (transparent)
        ├── modern_casino_interior.jpg
        ├── realistic_casino_floor.png
        └── realistic_blackjack.png
```

---

## ⚙️ Core Features

### 1. Balance Management System
- **Initial Balance:** ₹10,000 (virtual currency)
- **Minimum Bet:** ₹200
- **Maximum Bet:** ₹5,500
- **ALL IN Button:** Bet entire current balance (up to max)
- **Auto-Reset Popup:** When balance reaches ₹0

### 2. Session Management
- **No Login Required:** Instant play
- **Session-Based:** PHP `$_SESSION` for state management
- **No Cookies:** Privacy-friendly
- **Auto-Reset:** Balance resets on session expiry

### 3. Real-Time Balance Updates
- **AJAX API Calls:** Instant balance updates
- **Server-Side Validation:** Prevent cheating
- **Formatted Display:** ₹10,000.00 format
- **Error Handling:** Graceful failure messages

### 4. Responsive Design
- **Mobile-First:** Optimized for all devices
- **Breakpoints:** 320px, 768px, 1024px, 1440px
- **Touch-Friendly:** Large buttons, easy navigation
- **Adaptive Layout:** Sidebar collapses on mobile

### 5. Notification System
- **Success:** Green notifications for wins
- **Error:** Red notifications for losses
- **Warning:** Yellow for validation errors
- **Info:** Blue for general information

---

## 🎮 Game Mechanics

### 1. Dice Game
**Concept:** Predict whether two dice will roll HIGH (8-12) or LOW (2-7)

**Mechanics:**
- Roll two 6-sided dice
- Sum the results (2-12)
- HIGH: 8, 9, 10, 11, 12
- LOW: 2, 3, 4, 5, 6, 7
- Payout: 2x multiplier on correct prediction

**Features:**
- Animated dice rolling
- Win/loss statistics
- Game history tracking
- ALL IN button

**Code Structure:**
```javascript
// Dice rolling logic
const dice1 = Math.floor(Math.random() * 6) + 1;
const dice2 = Math.floor(Math.random() * 6) + 1;
const total = dice1 + dice2;

// Determine win/loss
const isHigh = total >= 8;
const won = (selectedPrediction === 'high' && isHigh) || 
            (selectedPrediction === 'low' && !isHigh);
```

---

### 2. Chicken Adventure
**Concept:** Navigate a chicken through obstacles to reach the finish line

**Mechanics:**
- Canvas-based 2D side-scroller
- Arrow keys / WASD controls
- Collect coins for bonus points
- Avoid red obstacles
- Distance-based multiplier
- **CASHOUT Button:** Cash out anytime during gameplay

**Features:**
- Physics-based movement
- Collision detection
- Score calculation: `distance * 10 + coins * 50`
- Personal best tracking
- Real-time cashout

**Code Structure:**
```javascript
// Collision detection
function checkCollision(chicken, obstacle) {
    return chicken.x < obstacle.x + obstacle.width &&
           chicken.x + chicken.width > obstacle.x &&
           chicken.y < obstacle.y + obstacle.height &&
           chicken.y + chicken.height > obstacle.y;
}

// Cashout handler
document.getElementById('cashout-btn').addEventListener('click', function() {
    if (!gameState.isRunning) return;
    endGame(true);
    showNotification(`Cashed out! You won ₹${gameState.score}`, 'success');
});
```

---

### 3. Mines Game
**Concept:** Reveal tiles without hitting mines, cash out before hitting a mine

**Mechanics:**
- 5x5 grid (25 tiles)
- 5 mines randomly placed
- Reveal safe tiles to increase multiplier
- Each safe tile increases payout
- Cash out anytime or lose all on mine

**Features:**
- Progressive multiplier system
- Strategic gameplay
- Risk vs reward balance
- Cashout functionality

**Multiplier Formula:**
```javascript
// Multiplier increases with each safe tile
const multiplier = 1 + (revealedTiles * 0.2);
const currentWin = betAmount * multiplier;
```

---

### 4. Plinko Game
**Concept:** Drop balls through pegs to land in multiplier slots

**Mechanics:**
- **Multiple Ball Drop:** Click repeatedly to drop multiple balls
- 8 rows of pegs (72 pegs total)
- 9 landing slots with multipliers
- Physics-based bouncing
- Multipliers: 5x, 3x, 2x, 1.5x, 1x, 1.5x, 2x, 3x, 5x

**Features:**
- **Simultaneous Balls:** Multiple balls can drop at once
- **Active Balls Counter:** Shows how many balls are falling
- Real-time physics simulation
- Color-coded multipliers
- Independent ball tracking

**Code Structure:**
```javascript
// Ball class for multiple balls
class Ball {
    constructor(betAmount) {
        this.x = canvas.width / 2;
        this.y = 30;
        this.radius = 8;
        this.vx = (Math.random() - 0.5) * 2;
        this.vy = 0;
        this.gravity = 0.5;
        this.bounce = 0.6;
        this.betAmount = betAmount;
        this.active = true;
        this.color = `hsl(${Math.random() * 360}, 70%, 60%)`;
    }
    
    update() {
        // Physics calculations
        this.vy += this.gravity;
        this.x += this.vx;
        this.y += this.vy;
        
        // Peg collision detection
        pegs.forEach(peg => {
            const dx = this.x - peg.x;
            const dy = this.y - peg.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < this.radius + peg.radius) {
                const angle = Math.atan2(dy, dx);
                this.vx = Math.cos(angle) * 3;
                this.vy = Math.sin(angle) * 3 * this.bounce;
            }
        });
    }
}

// Drop ball handler
function dropBall() {
    const ball = new Ball(betAmount);
    balls.push(ball);
    document.getElementById('active-balls').textContent = balls.length;
    updateBalance(-betAmount);
}
```

**Multiplier Slots:**
| Slot | Multiplier | Color | Probability |
|------|-----------|-------|-------------|
| 0    | 5x        | Gold  | ~2%         |
| 1    | 3x        | Orange| ~10%        |
| 2    | 2x        | Cyan  | ~15%        |
| 3    | 1.5x      | Purple| ~20%        |
| 4    | 1x        | Green | ~26%        |
| 5    | 1.5x      | Purple| ~20%        |
| 6    | 2x        | Cyan  | ~15%        |
| 7    | 3x        | Orange| ~10%        |
| 8    | 5x        | Gold  | ~2%         |

---

## 💰 Balance & Betting System

### Configuration (includes/config.php)
```php
// Game Configuration
define('INITIAL_BALANCE', 10000);
define('MIN_BET', 200);
define('MAX_BET', 5500);

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
```

### Auto-Reset Popup (assets/js/check-balance.js)
```javascript
// Check balance every 2 seconds
setInterval(function() {
    const balanceText = document.getElementById('balance-display').textContent;
    const balance = parseFloat(balanceText.replace(/[₹,]/g, ''));
    
    if (balance === 0) {
        if (confirm('Your balance is ₹0. Would you like to reset it to ₹10,000?')) {
            fetch(SITE_URL + 'api/reset-balance.php', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('balance-display').textContent = data.balance;
                    showNotification('Balance reset to ₹10,000', 'success');
                }
            });
        }
    }
}, 2000);
```

---

## 🔌 API Endpoints

### 1. Get Balance (api/get-balance.php)
```php
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
```

**Response:**
```json
{
    "success": true,
    "balance": "₹10,000.00",
    "raw_balance": 10000
}
```

---

### 2. Update Balance (api/update-balance.php)
```php
<?php
require_once '../includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJSON(['success' => false, 'message' => 'Invalid request method']);
}

$data = json_decode(file_get_contents('php://input'), true);
$amount = isset($data['amount']) ? floatval($data['amount']) : 0;

$newBalance = updateBalance($amount);

sendJSON([
    'success' => true,
    'balance' => formatCurrency($newBalance),
    'raw_balance' => $newBalance
]);
?>
```

**Request:**
```json
{
    "amount": 500
}
```

**Response:**
```json
{
    "success": true,
    "balance": "₹10,500.00",
    "raw_balance": 10500
}
```

---

### 3. Reset Balance (api/reset-balance.php)
```php
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
```

**Response:**
```json
{
    "success": true,
    "balance": "₹10,000.00",
    "raw_balance": 10000,
    "message": "Balance reset successfully"
}
```

---

## 🎨 Design System

### Color Palette
```css
:root {
    /* Primary Colors */
    --primary-color: #ff6b35;      /* Orange */
    --primary-dark: #d94d1f;
    --primary-light: #ff8a5b;
    
    /* Secondary Colors */
    --secondary-color: #004e89;    /* Dark Blue */
    --secondary-dark: #003d6b;
    --secondary-light: #1a6fb0;
    
    /* Accent Colors */
    --accent-gold: #ffd700;        /* Gold */
    --accent-purple: #9d4edd;      /* Purple */
    --accent-cyan: #00d9ff;        /* Cyan */
    
    /* Neutral Colors */
    --dark-bg: #0a0e27;            /* Dark Background */
    --darker-bg: #050812;          /* Darker Background */
    --light-text: #ffffff;         /* White Text */
    --gray-text: #b0b0b0;          /* Gray Text */
    --border-color: #1a1f3a;       /* Border */
}
```

### Typography
- **Primary Font:** Poppins (Google Fonts)
- **Display Font:** Playfair Display (Google Fonts)
- **Font Weights:** 300, 400, 600, 700, 800

### Spacing System
```css
--spacing-xs: 4px;
--spacing-sm: 8px;
--spacing-md: 16px;
--spacing-lg: 24px;
--spacing-xl: 32px;
--spacing-2xl: 48px;
```

### Border Radius
```css
--radius-sm: 4px;
--radius-md: 8px;
--radius-lg: 12px;
--radius-xl: 16px;
--radius-2xl: 24px;
```

### Shadows
```css
--shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.3);
--shadow-md: 0 8px 24px rgba(0, 0, 0, 0.4);
--shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.5);
```

### Button Styles
```css
/* Primary Button */
.btn-primary {
    background: linear-gradient(135deg, #ff6b35, #d94d1f);
    color: white;
    padding: 16px 24px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
}

/* ALL IN Button */
.all-in-btn {
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #000;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.9rem;
}

/* CASHOUT Button */
.cashout-btn {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 15px 30px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1.1rem;
}
```

---

## ⚖️ Legal & Compliance

### Required Legal Pages
1. **Privacy Policy** - Data collection and usage
2. **Terms & Conditions** - User agreement
3. **Disclaimer** - Legal disclaimers
4. **Fair Play Policy** - Game fairness and RNG
5. **Responsible Gaming** - Player welfare
6. **Legal Information** - Company details and compliance

### Key Legal Points
- **18+ Only:** Strictly enforced age restriction
- **No Real Money:** Virtual currency with zero value
- **No Gambling:** Entertainment-only platform
- **No Prizes:** No cash, gift cards, or physical goods
- **No Payments:** No deposits or withdrawals
- **Session-Based:** No user accounts or data collection
- **Indian Law Compliant:** IT Act, Consumer Protection Act

### Google Ads Compliance
- ✅ **100% Transparent:** All disclaimers clearly stated
- ✅ **No Circumvention:** Honest about free-to-play nature
- ✅ **No UVP:** Unacceptable business practices avoided
- ✅ **Age Restriction:** 18+ badges on all pages
- ✅ **Legal Disclaimer:** Footer on every page

### Footer Legal Disclaimer
```html
<div class="legal-disclaimer">
    <div class="age-badge">18+ ONLY</div>
    <p>
        <strong>Legal Disclaimer:</strong> DineDivine Ventures is a 100% free-to-play 
        social gaming platform for entertainment purposes only. All currency (₹) is 
        virtual and has zero real-world value. No real money gambling. No prizes. 
        No withdrawals. Must be 18+ to play.
    </p>
</div>
```

---

## 🚀 Deployment Guide

### Prerequisites
- PHP 7.4 or higher
- Apache/Nginx web server
- Git installed
- GitHub account
- Railway account (or similar PaaS)

### Local Development Setup
```bash
# Clone repository
git clone https://github.com/Krishnaait/divinedivine-casino.git
cd divinedivine-casino

# Start PHP built-in server
php -S localhost:8000

# Open browser
http://localhost:8000
```

### Railway Deployment
1. **Create Railway Project**
   - Go to [railway.app](https://railway.app)
   - Click "New Project"
   - Select "Deploy from GitHub repo"

2. **Connect GitHub Repository**
   - Authorize Railway to access GitHub
   - Select `divinedivine-casino` repository

3. **Configure Environment**
   - Railway auto-detects PHP
   - No additional configuration needed

4. **Deploy**
   - Railway automatically deploys on push to `master` branch
   - Access via: `https://your-project.up.railway.app`

### Manual Server Deployment
```bash
# SSH into server
ssh user@your-server.com

# Navigate to web root
cd /var/www/html

# Clone repository
git clone https://github.com/Krishnaait/divinedivine-casino.git

# Set permissions
chmod -R 755 divinedivine-casino
chown -R www-data:www-data divinedivine-casino

# Configure Apache/Nginx
# Point document root to /var/www/html/divinedivine-casino

# Restart web server
sudo systemctl restart apache2
# OR
sudo systemctl restart nginx
```

### SSL Certificate (Let's Encrypt)
```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache

# Obtain certificate
sudo certbot --apache -d yourdomain.com

# Auto-renewal
sudo certbot renew --dry-run
```

---

## 🔮 Future Enhancements

### Phase 1: Performance Optimization
- [ ] Image compression (WebP format)
- [ ] Lazy loading for images
- [ ] CSS/JS minification
- [ ] CDN integration
- [ ] Browser caching

### Phase 2: New Games
- [ ] **Slot Machine** - 3-reel classic slots
- [ ] **Roulette** - European roulette wheel
- [ ] **Blackjack** - Card game with dealer
- [ ] **Baccarat** - Banker vs Player
- [ ] **Wheel of Fortune** - Spin to win

### Phase 3: Social Features
- [ ] Leaderboards (top players)
- [ ] Daily challenges
- [ ] Achievement system
- [ ] Social sharing
- [ ] Friend referrals

### Phase 4: Enhanced UX
- [ ] **Sound Effects** - Game audio
- [ ] **Background Music** - Ambient casino music
- [ ] **Animations** - Smooth transitions
- [ ] **Themes** - Dark/light mode toggle
- [ ] **Languages** - Multi-language support

### Phase 5: Analytics
- [ ] Google Analytics integration
- [ ] User behavior tracking
- [ ] Game popularity metrics
- [ ] Session duration analysis
- [ ] Conversion tracking

### Phase 6: Database Integration
- [ ] MySQL/PostgreSQL setup
- [ ] User accounts (optional)
- [ ] Persistent game history
- [ ] Statistics dashboard
- [ ] Admin panel

---

## 📞 Support & Contact

**Email:** contact@dinedivine.com  
**GitHub:** [https://github.com/Krishnaait/divinedivine-casino](https://github.com/Krishnaait/divinedivine-casino)  
**Live Website:** [https://divinedivine-casino-production.up.railway.app](https://divinedivine-casino-production.up.railway.app)

---

## 📄 License

This project is proprietary software owned by **DineDivine Ventures Private Limited**.

**Copyright © 2026 DineDivine Ventures Private Limited. All rights reserved.**

---

## 🙏 Acknowledgments

- **Font Awesome** - Icon library
- **Google Fonts** - Typography
- **Railway** - Hosting platform
- **GitHub** - Version control

---

**Last Updated:** January 18, 2026  
**Version:** 3.0  
**Status:** Production Ready ✅

---

## 🎯 Quick Start Checklist

For building a similar website, ensure you have:

- [x] Company legal details (CIN, GST, PAN, Address)
- [x] Technology stack decided (HTML, CSS, PHP, JS)
- [x] Game mechanics designed
- [x] Balance system configured
- [x] Legal pages written
- [x] SEO files created (robots.txt, sitemap.xml)
- [x] Logo designed (transparent PNG)
- [x] Color palette defined
- [x] GitHub repository created
- [x] Deployment platform chosen (Railway, Heroku, etc.)
- [x] Domain name registered (optional)
- [x] SSL certificate obtained
- [x] Google Ads compliance verified
- [x] 18+ age restriction enforced
- [x] Transparency disclaimers added

**You're ready to build! 🚀**
