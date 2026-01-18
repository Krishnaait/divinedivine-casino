// Auto-check balance and show reset popup when balance is zero
function checkBalanceAndPrompt() {
    const balanceElement = document.getElementById('balance-display');
    if (!balanceElement) return;
    
    const balance = parseInt(balanceElement.textContent.replace(/[₹,]/g, ''));
    
    if (balance === 0) {
        showResetBalancePopup();
    }
}

function showResetBalancePopup() {
    // Create modal overlay
    const overlay = document.createElement('div');
    overlay.id = 'balance-zero-modal';
    overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        animation: fadeIn 0.3s ease;
    `;
    
    // Create modal content
    const modal = document.createElement('div');
    modal.style.cssText = `
        background: linear-gradient(135deg, #1a1f3a 0%, #0a0e27 100%);
        border: 2px solid #ff6b35;
        border-radius: 20px;
        padding: 40px;
        max-width: 450px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(255, 107, 53, 0.4);
        animation: slideIn 0.3s ease;
    `;
    
    modal.innerHTML = `
        <div style="font-size: 4rem; margin-bottom: 20px;">💰</div>
        <h2 style="color: #ffd700; font-size: 2rem; margin-bottom: 15px;">Balance Empty!</h2>
        <p style="color: #b0b0b0; font-size: 1.1rem; margin-bottom: 30px;">
            Your balance is ₹0. Reset your balance to continue playing!
        </p>
        <button id="reset-now-btn" style="
            background: linear-gradient(135deg, #ff6b35, #d94d1f);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.4);
            transition: all 0.3s ease;
        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255, 107, 53, 0.6)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 107, 53, 0.4)';">
            Reset Balance to ₹10,000
        </button>
    `;
    
    overlay.appendChild(modal);
    document.body.appendChild(overlay);
    
    // Add click handler
    document.getElementById('reset-now-btn').addEventListener('click', function() {
        resetBalance();
        overlay.remove();
    });
    
    // Close on overlay click
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            overlay.remove();
        }
    });
}

function resetBalance() {
    fetch(window.SITE_URL + 'api/reset-balance.php', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('balance-display').textContent = formatCurrency(data.balance);
            showNotification('Balance reset to ₹10,000!', 'success');
        }
    })
    .catch(error => console.error('Error:', error));
}

function formatCurrency(amount) {
    return '₹' + amount.toLocaleString('en-IN');
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideIn {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
`;
document.head.appendChild(style);

// Check balance periodically
setInterval(checkBalanceAndPrompt, 2000);
