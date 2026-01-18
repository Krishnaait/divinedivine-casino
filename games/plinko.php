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
            
            <!-- Multiplier Display at Bottom -->
            <div class="multiplier-display" id="multiplier-display"></div>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <div class="bet-input-group">
                        <input type="number" id="bet-amount" min="200" max="5500" value="200" step="100">
                        <button class="all-in-btn" id="all-in-btn" title="Bet all your balance">ALL IN</button>
                    </div>
                    <div class="bet-limits">Min: ₹200 | Max: ₹5,500</div>
                </div>
                
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Last Win</div>
                        <div class="stat-value" id="last-win">₹200</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Total Drops</div>
                        <div class="stat-value" id="total-drops">7</div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button class="start-btn" id="drop-btn">DROP BALL</button>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Game Info</h3>
            
            <div class="info-box">
                <div class="info-label">Active Balls</div>
                <div class="info-value" id="active-balls">0</div>
            </div>
            
            <div class="info-box" style="margin-top: 15px;">
                <div class="info-label">Best Multiplier</div>
                <div class="info-value" id="best-multiplier">0.0x</div>
            </div>
            
            <h3 style="margin-top: 25px;">Multipliers</h3>
            <div class="payout-list">
                <div class="payout-row"><span class="mult-badge gold">5x</span> Jackpot (Edge)</div>
                <div class="payout-row"><span class="mult-badge orange">3x</span> High Win</div>
                <div class="payout-row"><span class="mult-badge cyan">2x</span> Good Win</div>
                <div class="payout-row"><span class="mult-badge purple">1.5x</span> Medium</div>
                <div class="payout-row"><span class="mult-badge green">1x</span> Break Even</div>
            </div>
            
            <h3 style="margin-top: 25px;">How to Play</h3>
            <div style="background: rgba(0, 217, 255, 0.1); border: 1px solid rgba(0, 217, 255, 0.3); border-radius: 10px; padding: 12px; font-size: 0.85rem; color: var(--gray-text);">
                <p style="margin-bottom: 8px;">✓ Set your bet amount</p>
                <p style="margin-bottom: 8px;">✓ Click "Drop Ball" multiple times</p>
                <p style="margin-bottom: 8px;">✓ Watch balls bounce through pegs</p>
                <p>✓ Win based on landing slots!</p>
            </div>
        </div>
    </div>
</div>

<style>
.multiplier-display {
    display: flex;
    justify-content: space-between;
    margin-top: -5px;
    padding: 0 20px;
    gap: 2px;
}

.mult-slot {
    flex: 1;
    padding: 12px 4px;
    text-align: center;
    font-weight: 700;
    font-size: 0.9rem;
    border-radius: 4px;
    color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.mult-slot.gold { background: linear-gradient(135deg, #ffd700, #ffed4e); color: #000; }
.mult-slot.orange { background: linear-gradient(135deg, #ff6b35, #ff8a5b); }
.mult-slot.cyan { background: linear-gradient(135deg, #00d9ff, #00b8d4); }
.mult-slot.purple { background: linear-gradient(135deg, #9d4edd, #c77dff); }
.mult-slot.green { background: linear-gradient(135deg, #28a745, #20c997); }

.payout-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.payout-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    font-size: 0.9rem;
    color: var(--gray-text);
}

.mult-badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 0.85rem;
    min-width: 45px;
    text-align: center;
}

.mult-badge.gold { background: linear-gradient(135deg, #ffd700, #ffed4e); color: #000; }
.mult-badge.orange { background: linear-gradient(135deg, #ff6b35, #ff8a5b); color: white; }
.mult-badge.cyan { background: linear-gradient(135deg, #00d9ff, #00b8d4); color: white; }
.mult-badge.purple { background: linear-gradient(135deg, #9d4edd, #c77dff); color: white; }
.mult-badge.green { background: linear-gradient(135deg, #28a745, #20c997); color: white; }
</style>

<script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    
    function resizeCanvas() {
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;
        initializeGame();
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    // Game Configuration
    const PEGS_ROWS = 8;
    const PEGS_PER_ROW = 9;
    const SLOTS = 9;
    const MULTIPLIERS = [5, 3, 2, 1.5, 1, 1.5, 2, 3, 5];
    const MULT_COLORS = ['#ffd700', '#ff6b35', '#00d9ff', '#9d4edd', '#28a745', '#9d4edd', '#00d9ff', '#ff6b35', '#ffd700'];
    const MULT_LABELS = ['5x', '3x', '2x', '1.5x', '1x', '1.5x', '2x', '3x', '5x'];
    
    let pegs = [];
    let balls = [];
    let slots = [];
    let gameStats = {
        totalDrops: 7,
        lastWin: 200,
        bestMultiplier: 0
    };
    
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
            if (!this.active) return;
            
            this.vy += this.gravity;
            this.x += this.vx;
            this.y += this.vy;
            
            // Check collision with pegs
            pegs.forEach(peg => {
                const dx = this.x - peg.x;
                const dy = this.y - peg.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < this.radius + peg.radius) {
                    const angle = Math.atan2(dy, dx);
                    this.vx = Math.cos(angle) * 3;
                    this.vy = Math.sin(angle) * 3 * this.bounce;
                    
                    // Move ball away from peg
                    const overlap = this.radius + peg.radius - distance;
                    this.x += Math.cos(angle) * overlap;
                    this.y += Math.sin(angle) * overlap;
                }
            });
            
            // Wall collision
            if (this.x - this.radius < 20) {
                this.x = 20 + this.radius;
                this.vx *= -this.bounce;
            }
            if (this.x + this.radius > canvas.width - 20) {
                this.x = canvas.width - 20 - this.radius;
                this.vx *= -this.bounce;
            }
            
            // Check if ball reached bottom
            if (this.y > canvas.height - 80) {
                this.active = false;
                this.landInSlot();
            }
        }
        
        landInSlot() {
            const slotWidth = (canvas.width - 40) / SLOTS;
            const slotIndex = Math.floor((this.x - 20) / slotWidth);
            const finalSlot = Math.max(0, Math.min(SLOTS - 1, slotIndex));
            
            const multiplier = MULTIPLIERS[finalSlot];
            const winAmount = Math.floor(this.betAmount * multiplier);
            const profit = winAmount - this.betAmount;
            
            updateBalance(profit);
            gameStats.lastWin = winAmount;
            gameStats.totalDrops++;
            
            if (multiplier > gameStats.bestMultiplier) {
                gameStats.bestMultiplier = multiplier;
                document.getElementById('best-multiplier').textContent = multiplier.toFixed(1) + 'x';
            }
            
            document.getElementById('last-win').textContent = '₹' + winAmount.toLocaleString('en-IN');
            document.getElementById('total-drops').textContent = gameStats.totalDrops;
            
            if (profit > 0) {
                showNotification(`Won ₹${winAmount} (${multiplier}x multiplier)!`, 'success');
            } else if (profit < 0) {
                showNotification(`Lost ₹${Math.abs(profit)}`, 'error');
            } else {
                showNotification(`Break even! ₹${winAmount}`, 'info');
            }
            
            // Remove ball from array after animation
            setTimeout(() => {
                balls = balls.filter(b => b !== this);
                document.getElementById('active-balls').textContent = balls.length;
            }, 500);
        }
        
        draw() {
            if (!this.active) return;
            
            ctx.save();
            ctx.shadowBlur = 15;
            ctx.shadowColor = this.color;
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
            
            // Highlight
            ctx.fillStyle = 'rgba(255, 255, 255, 0.4)';
            ctx.beginPath();
            ctx.arc(this.x - 2, this.y - 2, this.radius * 0.4, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }
    
    function initializeGame() {
        pegs = [];
        slots = [];
        
        const startX = 60;
        const endX = canvas.width - 60;
        const startY = 80;
        const rowHeight = (canvas.height - 180) / PEGS_ROWS;
        
        // Create pegs
        for (let row = 0; row < PEGS_ROWS; row++) {
            const pegsInRow = PEGS_PER_ROW - (row % 2);
            const spacing = (endX - startX) / (pegsInRow + 1);
            const offsetX = (row % 2) * spacing / 2;
            
            for (let col = 0; col < pegsInRow; col++) {
                pegs.push({
                    x: startX + offsetX + spacing * (col + 1),
                    y: startY + row * rowHeight,
                    radius: 5
                });
            }
        }
        
        // Create slots
        const slotWidth = (canvas.width - 40) / SLOTS;
        for (let i = 0; i < SLOTS; i++) {
            slots.push({
                x: 20 + i * slotWidth,
                y: canvas.height - 70,
                width: slotWidth,
                height: 50,
                multiplier: MULTIPLIERS[i],
                color: MULT_COLORS[i],
                label: MULT_LABELS[i]
            });
        }
        
        // Create multiplier display
        const multDisplay = document.getElementById('multiplier-display');
        multDisplay.innerHTML = '';
        MULT_LABELS.forEach((label, i) => {
            const div = document.createElement('div');
            div.className = 'mult-slot';
            if (i === 0 || i === 8) div.classList.add('gold');
            else if (i === 1 || i === 7) div.classList.add('orange');
            else if (i === 2 || i === 6) div.classList.add('cyan');
            else if (i === 3 || i === 5) div.classList.add('purple');
            else div.classList.add('green');
            div.textContent = label;
            multDisplay.appendChild(div);
        });
    }
    
    function drawGame() {
        // Clear canvas with dark background
        ctx.fillStyle = 'rgba(10, 14, 39, 0.95)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Draw pegs
        pegs.forEach(peg => {
            ctx.save();
            ctx.shadowBlur = 10;
            ctx.shadowColor = '#00d9ff';
            ctx.fillStyle = '#00d9ff';
            ctx.beginPath();
            ctx.arc(peg.x, peg.y, peg.radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        });
        
        // Draw slot dividers
        const slotWidth = (canvas.width - 40) / SLOTS;
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.2)';
        ctx.lineWidth = 2;
        for (let i = 0; i <= SLOTS; i++) {
            const x = 20 + i * slotWidth;
            ctx.beginPath();
            ctx.moveTo(x, canvas.height - 70);
            ctx.lineTo(x, canvas.height - 20);
            ctx.stroke();
        }
        
        // Draw balls
        balls.forEach(ball => ball.draw());
    }
    
    function gameLoop() {
        balls.forEach(ball => ball.update());
        drawGame();
        requestAnimationFrame(gameLoop);
    }
    
    function dropBall() {
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        
        if (betAmount < 200 || betAmount > 5500) {
            showNotification('Bet must be between ₹200 and ₹5,500', 'warning');
            return;
        }
        
        const currentBalance = parseInt(document.getElementById('balance-display').textContent.replace(/[₹,]/g, ''));
        if (betAmount > currentBalance) {
            showNotification('Insufficient balance!', 'error');
            return;
        }
        
        // Create new ball
        const ball = new Ball(betAmount);
        balls.push(ball);
        document.getElementById('active-balls').textContent = balls.length;
        
        // Deduct bet amount immediately
        updateBalance(-betAmount);
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
    
    // Event listeners
    document.getElementById('drop-btn').addEventListener('click', dropBall);
    
    // ALL IN button handler
    document.getElementById('all-in-btn').addEventListener('click', function() {
        const currentBalance = parseInt(document.getElementById('balance-display').textContent.replace(/[₹,]/g, ''));
        const maxBet = Math.min(currentBalance, 5500);
        document.getElementById('bet-amount').value = maxBet;
        showNotification(`Bet set to ₹${maxBet.toLocaleString('en-IN')}`, 'info');
    });
    
    // Initialize and start game loop
    initializeGame();
    gameLoop();
</script>

<?php include '../includes/footer.php'; ?>
