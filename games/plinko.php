<?php
require_once '../includes/config.php';
$page_title = "Plinko Game";
include '../includes/header.php';
?>

<div class="game-container plinko-bg">
    <div class="game-wrapper">
        <!-- Main Game Area -->
        <div class="game-area">
            <h1 class="game-title">🎯 Plinko Game</h1>
            
            <canvas id="gameCanvas"></canvas>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <input type="number" id="bet-amount" min="10" max="10000" value="100" step="10">
                </div>
                
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Last Win</div>
                        <div class="stat-value" id="last-win">₹0</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Total Drops</div>
                        <div class="stat-value" id="total-drops">0</div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button class="start-btn" id="drop-btn">DROP BALL</button>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Payout Multipliers</h3>
            
            <div class="payout-grid">
                <div class="payout-item">
                    <div class="multiplier">5.0x</div>
                    <div class="label">Jackpot</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">3.0x</div>
                    <div class="label">High</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">2.0x</div>
                    <div class="label">Good</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">1.5x</div>
                    <div class="label">Medium</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">1.0x</div>
                    <div class="label">Break Even</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">0.5x</div>
                    <div class="label">Low</div>
                </div>
            </div>
            
            <h3 style="margin-top: 25px;">How to Play</h3>
            <div style="background: rgba(0, 217, 255, 0.1); border: 1px solid rgba(0, 217, 255, 0.3); border-radius: 10px; padding: 12px; font-size: 0.85rem; color: var(--gray-text);">
                <p style="margin-bottom: 8px;">✓ Set your bet amount</p>
                <p style="margin-bottom: 8px;">✓ Click "Drop Ball"</p>
                <p style="margin-bottom: 8px;">✓ Watch the ball bounce</p>
                <p>✓ Win based on landing slot!</p>
            </div>
            
            <div class="info-box" style="margin-top: 15px;">
                <div class="info-label">Best Multiplier</div>
                <div class="info-value" id="best-multiplier">0.0x</div>
            </div>
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    
    function resizeCanvas() {
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    const PEGS_ROWS = 8;
    const PEGS_PER_ROW = 9;
    const SLOTS = 9;
    const MULTIPLIERS = [5.0, 3.0, 2.0, 1.5, 1.0, 1.5, 2.0, 3.0, 5.0];
    const SLOT_COLORS = ['#ffd700', '#ff6b35', '#00d9ff', '#9d4edd', '#4caf50', '#9d4edd', '#00d9ff', '#ff6b35', '#ffd700'];
    
    let pegs = [];
    let ball = null;
    let isDropping = false;
    let totalDrops = 0;
    let bestMultiplier = 0;
    
    function initializePegs() {
        pegs = [];
        const startX = canvas.width / 2;
        const startY = 80;
        const rowSpacing = (canvas.height - 150) / PEGS_ROWS;
        const pegSpacing = 40;
        
        for (let row = 0; row < PEGS_ROWS; row++) {
            const pegsInRow = PEGS_PER_ROW - (row % 2);
            const offsetX = (row % 2) * (pegSpacing / 2);
            
            for (let col = 0; col < pegsInRow; col++) {
                const x = startX - (pegsInRow * pegSpacing / 2) + (col * pegSpacing) + offsetX;
                const y = startY + (row * rowSpacing);
                pegs.push({ x, y, radius: 5 });
            }
        }
    }
    
    function drawBoard() {
        ctx.fillStyle = 'rgba(10, 14, 39, 0.8)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        pegs.forEach(peg => {
            ctx.fillStyle = '#00d9ff';
            ctx.beginPath();
            ctx.arc(peg.x, peg.y, peg.radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = '#00f0ff';
            ctx.lineWidth = 1;
            ctx.stroke();
        });
        
        const slotWidth = canvas.width / SLOTS;
        const slotY = canvas.height - 40;
        
        for (let i = 0; i < SLOTS; i++) {
            ctx.fillStyle = SLOT_COLORS[i];
            ctx.fillRect(i * slotWidth, slotY, slotWidth - 2, 40);
            
            ctx.fillStyle = '#fff';
            ctx.font = 'bold 14px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(MULTIPLIERS[i] + 'x', (i * slotWidth) + (slotWidth / 2), slotY + 20);
        }
        
        if (ball) {
            ctx.fillStyle = '#ffd700';
            ctx.beginPath();
            ctx.arc(ball.x, ball.y, ball.radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = '#ffed4e';
            ctx.lineWidth = 2;
            ctx.stroke();
        }
    }
    
    document.getElementById('drop-btn').addEventListener('click', dropBall);
    
    function dropBall() {
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        
        if (betAmount < 10 || betAmount > 10000) {
            showNotification('Bet must be between ₹10 and ₹10,000', 'warning');
            return;
        }
        
        if (isDropping) return;
        
        isDropping = true;
        document.getElementById('drop-btn').disabled = true;
        
        ball = {
            x: canvas.width / 2,
            y: 40,
            radius: 8,
            velocityX: (Math.random() - 0.5) * 2,
            velocityY: 0,
            gravity: 0.3,
            bounce: 0.7,
            betAmount: betAmount
        };
        
        animateBall();
    }
    
    function animateBall() {
        if (!ball) return;
        
        ball.velocityY += ball.gravity;
        ball.x += ball.velocityX;
        ball.y += ball.velocityY;
        
        pegs.forEach(peg => {
            const dx = ball.x - peg.x;
            const dy = ball.y - peg.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < ball.radius + peg.radius) {
                const angle = Math.atan2(dy, dx);
                ball.velocityX = Math.cos(angle) * 3;
                ball.velocityY = Math.sin(angle) * 3;
                ball.x = peg.x + Math.cos(angle) * (ball.radius + peg.radius);
                ball.y = peg.y + Math.sin(angle) * (ball.radius + peg.radius);
            }
        });
        
        if (ball.x - ball.radius < 0) {
            ball.x = ball.radius;
            ball.velocityX *= -ball.bounce;
        }
        if (ball.x + ball.radius > canvas.width) {
            ball.x = canvas.width - ball.radius;
            ball.velocityX *= -ball.bounce;
        }
        
        if (ball.y + ball.radius >= canvas.height - 40) {
            const slotIndex = Math.floor(ball.x / (canvas.width / SLOTS));
            const multiplier = MULTIPLIERS[Math.max(0, Math.min(SLOTS - 1, slotIndex))];
            endDrop(multiplier, ball.betAmount);
            return;
        }
        
        drawBoard();
        requestAnimationFrame(animateBall);
    }
    
    function endDrop(multiplier, betAmount) {
        isDropping = false;
        ball = null;
        
        const winAmount = Math.floor(betAmount * multiplier);
        const profit = winAmount - betAmount;
        
        totalDrops++;
        if (multiplier > bestMultiplier) {
            bestMultiplier = multiplier;
            document.getElementById('best-multiplier').textContent = multiplier.toFixed(1) + 'x';
        }
        
        document.getElementById('last-win').textContent = '₹' + winAmount;
        document.getElementById('total-drops').textContent = totalDrops;
        
        updateBalance(profit);
        
        if (multiplier >= 2.0) {
            showNotification(`${multiplier}x multiplier! You won ₹${winAmount}!`, 'success');
        } else if (multiplier === 1.0) {
            showNotification(`Break even! ₹${winAmount}`, 'info');
        } else {
            showNotification(`${multiplier}x - You got ₹${winAmount}`, 'warning');
        }
        
        document.getElementById('drop-btn').disabled = false;
        drawBoard();
    }
    
    function updateBalance(amount) {
        fetch('<?php echo SITE_URL; ?>api/update-balance.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ amount: amount })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('balance-display').textContent = data.balance;
            }
        })
        .catch(error => console.error('Error:', error));
    }
    
    initializePegs();
    drawBoard();
</script>

<?php include '../includes/footer.php'; ?>
