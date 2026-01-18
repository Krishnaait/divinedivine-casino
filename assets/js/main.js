// ============================================
// DineDivine Ventures - Main JavaScript
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// Initialize Application
function initializeApp() {
    setupMobileMenu();
    setupBalanceDisplay();
    setupResetButton();
    setupEventListeners();
}

// ============================================
// Mobile Menu Toggle
// ============================================

function setupMobileMenu() {
    const hamburger = document.getElementById('hamburger-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
        
        // Close menu when link is clicked
        const menuLinks = mobileMenu.querySelectorAll('.mobile-menu-link');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });
    }
}

// ============================================
// Balance Display Update
// ============================================

function setupBalanceDisplay() {
    updateBalanceDisplay();
}

function updateBalanceDisplay() {
    const balanceDisplay = document.getElementById('balance-display');
    if (balanceDisplay) {
        fetch('<?php echo SITE_URL; ?>api/get-balance.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    balanceDisplay.textContent = data.balance;
                }
            })
            .catch(error => console.error('Error fetching balance:', error));
    }
}

// ============================================
// Reset Balance Button
// ============================================

function setupResetButton() {
    const resetBtn = document.getElementById('reset-balance-btn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to reset your balance to ₹1000?')) {
                resetBalance();
            }
        });
    }
}

function resetBalance() {
    fetch('<?php echo SITE_URL; ?>api/reset-balance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateBalanceDisplay();
            showNotification('Balance reset successfully!', 'success');
        } else {
            showNotification('Error resetting balance', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error resetting balance', 'error');
    });
}

// ============================================
// Notification System
// ============================================

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Trigger animation
    setTimeout(() => notification.classList.add('show'), 10);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

function getNotificationIcon(type) {
    const icons = {
        'success': 'check-circle',
        'error': 'exclamation-circle',
        'warning': 'exclamation-triangle',
        'info': 'info-circle'
    };
    return icons[type] || 'info-circle';
}

// ============================================
// Event Listeners Setup
// ============================================

function setupEventListeners() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
    
    // Add animation to elements on scroll
    observeElements();
}

// ============================================
// Intersection Observer for Animations
// ============================================

function observeElements() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    document.querySelectorAll('.card, .game-card, .feature-card').forEach(el => {
        observer.observe(el);
    });
}

// ============================================
// Utility Functions
// ============================================

function formatCurrency(amount) {
    return '₹' + parseFloat(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ============================================
// Notification Styles (Inline)
// ============================================

const notificationStyles = `
<style>
.notification {
    position: fixed;
    top: 100px;
    right: 20px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    padding: 16px 20px;
    color: white;
    z-index: 2000;
    opacity: 0;
    transform: translateX(400px);
    transition: all 0.3s ease;
    max-width: 400px;
}

.notification.show {
    opacity: 1;
    transform: translateX(0);
}

.notification-success {
    border-color: #4caf50;
    background: rgba(76, 175, 80, 0.1);
}

.notification-error {
    border-color: #f44336;
    background: rgba(244, 67, 54, 0.1);
}

.notification-warning {
    border-color: #ff9800;
    background: rgba(255, 152, 0, 0.1);
}

.notification-info {
    border-color: #2196f3;
    background: rgba(33, 150, 243, 0.1);
}

.notification-content {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.95rem;
}

@media (max-width: 768px) {
    .notification {
        right: 10px;
        left: 10px;
        max-width: none;
    }
}
</style>
`;

// Inject notification styles
if (!document.querySelector('style[data-notification]')) {
    const style = document.createElement('style');
    style.setAttribute('data-notification', 'true');
    style.textContent = notificationStyles.replace(/<\/?style>/g, '');
    document.head.appendChild(style);
}

// ============================================
// Page Scroll to Top on Load
// ============================================

window.addEventListener('load', function() {
    window.scrollTo(0, 0);
});
