<?php
require_once '../includes/config.php';
$page_title = "Plinko Game";
include '../includes/header.php';
?>

<style>
    .game-container {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(0, 217, 255, 0.1), rgba(255, 107, 53, 0.1));
    }
    
    .plinko-wrapper {
        max-width: 1200px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
        align-items: start;
    }
    
    .game-area {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--shadow-lg);
    }
    
    .game-title {
        font-size: 2rem;
        color: var(--accent-gold);
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    }
    
    #gameCanvas {
        width: 100%;
        height: 500px;
        background: linear-gradient(180deg, rgba(0, 217, 255, 0.1), rgba(255, 107, 53, 0.1));
        border: 2px solid var(--border-color);
        border-radius: 15px;
        display: block;
        margin: 20px 0;
    }
    
    .game-controls {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
    }
    
    .control-group {
        margin-bottom: 15px;
    }
    
    .control-group label {
        display: block;
        color: var(--accent-gold);
        font-weight: 600;
        margin-bottom: 8px;
    }
    
    .control-group input {
        width: 100%;
        padding: 10px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--light-text);
    }
    
    .game-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 15px 0;
        font-size: 0.9rem;
    }
    
    .stat-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 12px;
        border-radius: 8px;
        text-align: center;
    }
    
    .stat-label {
        color: var(--gray-text);
        margin-bottom: 5px;
        font-size: 0.85rem;
    }
    
    .stat-value {
        color: var(--accent-gold);
        font-weight: 700;
        font-size: 1.1rem;
    }
    
    .button-group {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    
    .button-group button {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .start-btn {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
    }
    
    .start-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255, 107, 53, 0.4);
    }
    
    .start-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .sidebar {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 25px;
        box-shadow: var(--shadow-lg);
        position: sticky;
        top: 100px;
    }
    
    .sidebar h3 {
        color: var(--accent-gold);
        margin-bottom: 15px;
        text-align: center;
        font-size: 1.1rem;
    }
    
    .info-box {
        background: rgba(255, 215, 0, 0.1);
        border: 2px solid rgba(255, 215, 0, 0.3);
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .info-label {
        color: var(--gray-text);
        font-size: 0.85rem;
        margin-bottom: 5px;
    }
    
    .info-value {
        color: var(--accent-gold);
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    .payout-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        margin-top: 15px;
    }
    
    .payout-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        font-size: 0.8rem;
    }
    
    .payout-item .multiplier {
        color: var(--accent-gold);
        font-weight: 700;
    }
    
    .payout-item .label {
        color: var(--gray-text);
        font-size: 0.75rem;
    }
    
    @media (max-width: 1024px) {
        .plinko-wrapper {
            grid-template-columns: 1fr;
        }
        
        .sidebar {
            position: static;
        }
    }
    
    @media (max-width: 768px) {
        .game-container {
            padding: 20px;
        }
        
        .game-area {
            padding: 20px;
        }
        
        .game-title {
            font-size: 1.5rem;
        }
        
        #gameCanvas {
            height: 400px;
        }
    }
</style>

<div class="game-container">
    <div class="plinko-wrapper">
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
                        <div class="stat-label">Total Wins</div>
                        <div class="stat-value" id="total-wins">0</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Average Payout</div>
                        <div class="stat-value" id="avg-payout">0x</div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button class="start-btn" id="start-btn">DROP BALL</button>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Game Status</h3>
            
            <div class="info-box">
                <div class="info-label">Last Payout</div>
                <div class="info-value" id="last-payout">₹0</div>
            </div>
            
            <h3>Payout Multipliers</h3>
            <div class="payout-grid">
                <div class="payout-item">
                    <div class="multiplier">0.5x</div>
                    <div class="label">Edges</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">1.0x</div>
                    <div class="label">Sides</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">2.0x</div>
                    <div class="label">Mid</div>
                </div>
                <div class="payout-item">
                    <div class="multiplier">5.0x</div>
                    <div class="label">Center</div>
                </div>
            </div>
            
            <h3 style="margin-top: 20px;">How to Play</h3>
            <div style="background: rgba(0, 217, 255, 0.1); border: 1px solid rgba(0, 217, 255, 0.3); border-radius: 10px; padding: 12px; font-size: 0.85rem; color: var(--gray-text);">
                <p style="margin-bottom: 8px;">✓ Click DROP BALL</p>
                <p style="margin-bottom: 8px;">✓ Ball bounces through pegs</p>
                <p>✓ Land in slots for rewards</p>
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
    
    // Game variables
    let gameStats = {
        totalWins: 0,
        totalPayout: 0,
        lastPayout: 0
    };
    
    // Plinko board setup
    const pegs = [];
    const slots = [];
    let ball = null;
    let isAnimating = false;
    
    // Payout multipliers
    const payoutMultipliers = [0.5, 1.0, 1.5, 2.0, 5.0, 2.0, 1.5, 1.0, 0.5];
    
    function initializeBoard() {
        pegs.length = 0;
        slots.length = 0;
        
        const pegRadius = 6;
        const pegSpacing = 40;
        const startX = canvas.width / 2;
        const startY = 60;
        
        // Create pegs
        for (let row = 0; row < 8; row++) {
            for (let col = 0; col <= row; col++) {
                const x = startX - (row * pegSpacing / 2) + (col * pegSpacing);
                const y = startY + (row * pegSpacing);
                pegs.push({ x, y, radius: pegRadius });
            }
        }
        
        // Create slots
        const slotWidth = canvas.width / 9;
        const slotY = canvas.height - 60;
        for (let i = 0; i < 9; i++) {
            slots.push({
                x: (i + 0.5) * slotWidth,
                y: slotY,
                width: slotWidth,
                multiplier: payoutMultipliers[i]
            });
        }
    }
    
    function drawBoard() {
        // Clear canvas
        ctx.fillStyle = 'rgba(10, 14, 39, 0.3)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Draw pegs
        ctx.fillStyle = 'rgba(255, 215, 0, 0.6)';
        pegs.forEach(peg => {
            ctx.beginPath();
            ctx.arc(peg.x, peg.y, peg.radius, 0, Math.PI * 2);
            ctx.fill();
        });
        
        // Draw slots
        slots.forEach((slot, index) => {
            ctx.fillStyle = 'rgba(255, 107, 53, 0.3)';
            ctx.fillRect(slot.x - slot.width / 2, slot.y, slot.width, 40);
            
            ctx.fillStyle = 'var(--accent-gold)';
            ctx.font = 'bold 12px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(slot.multiplier.toFixed(1) + 'x', slot.x, slot.y + 20);
        });
    }
    
    function drawBall() {
        if (!ball) return;
        
        ctx.fillStyle = 'rgba(255, 107, 53, 0.9)';
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.radius, 0, Math.PI * 2);
        ctx.fill();
        
        ctx.strokeStyle = 'var(--accent-gold)';
        ctx.lineWidth = 2;
        ctx.stroke();
    }
    
    function updateBall() {
        if (!ball) return;
        
        // Apply gravity
        ball.velocityY += 0.3;
        
        // Update position
        ball.x += ball.velocityX;
        ball.y += ball.velocityY;
        
        // Peg collision
        pegs.forEach(peg => {
            const dx = ball.x - peg.x;
            const dy = ball.y - peg.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < ball.radius + peg.radius) {
                const angle = Math.atan2(dy, dx);
                ball.x = peg.x + Math.cos(angle) * (ball.radius + peg.radius);
                ball.y = peg.y + Math.sin(angle) * (ball.radius + peg.radius);
                
                ball.velocityX = Math.cos(angle) * 4;
                ball.velocityY = -Math.abs(Math.sin(angle) * 4);
            }
        });
        
        // Boundary collision
        if (ball.x - ball.radius < 0) {
            ball.x = ball.radius;
            ball.velocityX = Math.abs(ball.velocityX);
        }
        if (ball.x + ball.radius > canvas.width) {
            ball.x = canvas.width - ball.radius;
            ball.velocityX = -Math.abs(ball.velocityX);
        }
        
        // Check slot collision
        slots.forEach(slot => {
            if (ball.y + ball.radius >= slot.y &&
                ball.x >= slot.x - slot.width / 2 &&
                ball.x <= slot.x + slot.width / 2) {
                
                endGame(slot.multiplier);
            }
        });
    }
    
    function gameLoop() {
        drawBoard();
        
        if (ball) {
            updateBall();
            drawBall();
            
            if (ball.y > canvas.height + 50) {
                ball = null;
                isAnimating = false;
            } else {
                requestAnimationFrame(gameLoop);
            }
        }
    }
    
    document.getElementById('start-btn').addEventListener('click', startGame);
    
    function startGame() {
        if (isAnimating) return;
        
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        
        if (betAmount < 10 || betAmount > 10000) {
            showNotification('Bet must be between ₹10 and ₹10,000', 'warning');
            return;
        }
        
        if (betAmount > <?php echo getUserBalance(); ?>) {
            showNotification('Insufficient balance', 'error');
            return;
        }
        
        isAnimating = true;
        document.getElementById('start-btn').disabled = true;
        
        ball = {
            x: canvas.width / 2,
            y: 30,
            radius: 8,
            velocityX: (Math.random() - 0.5) * 2,
            velocityY: 0,
            betAmount: betAmount
        };
        
        gameLoop();
    }
    
    function endGame(multiplier) {
        const payout = Math.floor(ball.betAmount * multiplier);
        const profit = payout - ball.betAmount;
        
        gameStats.totalWins++;
        gameStats.totalPayout += payout;
        gameStats.lastPayout = payout;
        
        document.getElementById('last-payout').textContent = '₹' + payout;
        document.getElementById('total-wins').textContent = gameStats.totalWins;
        
        if (gameStats.totalWins > 0) {
            const avgPayout = (gameStats.totalPayout / gameStats.totalWins / ball.betAmount).toFixed(2);
            document.getElementById('avg-payout').textContent = avgPayout + 'x';
        }
        
        updateBalance(profit);
        
        if (multiplier > 1) {
            showNotification(`You won ₹${payout}! (${multiplier.toFixed(1)}x)`, 'success');
        } else {
            showNotification(`Payout: ₹${payout} (${multiplier.toFixed(1)}x)`, 'info');
        }
        
        ball = null;
        isAnimating = false;
        document.getElementById('start-btn').disabled = false;
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
    
    // Initialize
    initializeBoard();
    drawBoard();
</script>

<?php include '../includes/footer.php'; ?>
