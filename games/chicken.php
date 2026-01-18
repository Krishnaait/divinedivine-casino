<?php
require_once '../includes/config.php';
$page_title = "Chicken Game";
include '../includes/header.php';
?>

<style>
    .game-container {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(0, 217, 255, 0.1), rgba(157, 78, 221, 0.1));
    }
    
    .chicken-wrapper {
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
        height: 400px;
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
    
    .instructions {
        background: rgba(0, 217, 255, 0.1);
        border: 1px solid rgba(0, 217, 255, 0.3);
        border-radius: 10px;
        padding: 15px;
        font-size: 0.85rem;
        color: var(--gray-text);
    }
    
    .instructions h4 {
        color: var(--accent-gold);
        margin-bottom: 10px;
    }
    
    .instructions ul {
        list-style: none;
        padding: 0;
    }
    
    .instructions li {
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
    }
    
    .instructions li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--primary-color);
    }
    
    @media (max-width: 1024px) {
        .chicken-wrapper {
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
            height: 300px;
        }
    }
</style>

<div class="game-container">
    <div class="chicken-wrapper">
        <!-- Main Game Area -->
        <div class="game-area">
            <h1 class="game-title">🐔 Chicken Adventure</h1>
            
            <canvas id="gameCanvas"></canvas>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <input type="number" id="bet-amount" min="10" max="10000" value="100" step="10">
                </div>
                
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Distance</div>
                        <div class="stat-value" id="distance">0m</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Coins</div>
                        <div class="stat-value" id="coins">0</div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button class="start-btn" id="start-btn">START GAME</button>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Game Status</h3>
            
            <div class="info-box">
                <div class="info-label">Current Score</div>
                <div class="info-value" id="score-display">₹0</div>
            </div>
            
            <div class="instructions">
                <h4>How to Play</h4>
                <ul>
                    <li>Use Arrow Keys or WASD to move</li>
                    <li>Collect coins for bonus points</li>
                    <li>Avoid obstacles</li>
                    <li>Reach the finish line</li>
                    <li>Longer distance = Higher multiplier</li>
                </ul>
            </div>
            
            <h3 style="margin-top: 25px;">Best Score</h3>
            <div class="info-box">
                <div class="info-label">Personal Best</div>
                <div class="info-value" id="best-score">0m</div>
            </div>
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    
    // Set canvas size
    function resizeCanvas() {
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    // Game variables
    let gameState = {
        isRunning: false,
        score: 0,
        distance: 0,
        coins: 0,
        betAmount: 100
    };
    
    // Chicken object
    const chicken = {
        x: canvas.width / 2,
        y: canvas.height - 60,
        width: 30,
        height: 30,
        speed: 5,
        velocityX: 0,
        velocityY: 0,
        jumping: false
    };
    
    // Keyboard input
    const keys = {};
    window.addEventListener('keydown', (e) => {
        keys[e.key.toLowerCase()] = true;
    });
    window.addEventListener('keyup', (e) => {
        keys[e.key.toLowerCase()] = false;
    });
    
    // Obstacles
    let obstacles = [];
    let coins = [];
    let gameDistance = 0;
    
    // Start game
    document.getElementById('start-btn').addEventListener('click', startGame);
    
    function startGame() {
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        
        if (betAmount < 10 || betAmount > 10000) {
            showNotification('Bet must be between ₹10 and ₹10,000', 'warning');
            return;
        }
        
        if (gameState.isRunning) return;
        
        gameState.isRunning = true;
        gameState.score = 0;
        gameState.distance = 0;
        gameState.coins = 0;
        gameState.betAmount = betAmount;
        
        chicken.x = canvas.width / 2;
        chicken.y = canvas.height - 60;
        chicken.velocityX = 0;
        chicken.velocityY = 0;
        
        obstacles = [];
        coins = [];
        gameDistance = 0;
        
        document.getElementById('start-btn').disabled = true;
        
        gameLoop();
    }
    
    function gameLoop() {
        // Clear canvas
        ctx.fillStyle = 'rgba(10, 14, 39, 0.5)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        if (!gameState.isRunning) {
            document.getElementById('start-btn').disabled = false;
            return;
        }
        
        // Update chicken position
        updateChicken();
        
        // Generate obstacles and coins
        if (Math.random() < 0.02) {
            obstacles.push({
                x: canvas.width,
                y: Math.random() * (canvas.height - 100) + 50,
                width: 40,
                height: 40,
                speed: 4
            });
        }
        
        if (Math.random() < 0.01) {
            coins.push({
                x: canvas.width,
                y: Math.random() * (canvas.height - 100) + 50,
                radius: 8,
                speed: 3
            });
        }
        
        // Update and draw obstacles
        obstacles = obstacles.filter(obs => {
            obs.x -= obs.speed;
            
            // Draw obstacle
            ctx.fillStyle = '#f44336';
            ctx.fillRect(obs.x, obs.y, obs.width, obs.height);
            ctx.fillStyle = '#ff6b6b';
            ctx.font = '20px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText('⚠', obs.x + obs.width / 2, obs.y + obs.height / 2);
            
            // Check collision
            if (checkCollision(chicken, obs)) {
                endGame(false);
            }
            
            return obs.x > -50;
        });
        
        // Update and draw coins
        coins = coins.filter(coin => {
            coin.x -= coin.speed;
            
            // Draw coin
            ctx.fillStyle = var(--accent-gold);
            ctx.beginPath();
            ctx.arc(coin.x, coin.y, coin.radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = '#ffed4e';
            ctx.lineWidth = 2;
            ctx.stroke();
            
            // Check collision
            if (checkCollisionCircle(chicken, coin)) {
                gameState.coins++;
                gameState.score += 50;
                return false;
            }
            
            return coin.x > -50;
        });
        
        // Draw chicken
        drawChicken();
        
        // Update distance
        gameDistance += 0.5;
        gameState.distance = Math.floor(gameDistance / 10);
        gameState.score = gameState.distance * 10 + gameState.coins * 50;
        
        // Update UI
        document.getElementById('distance').textContent = gameState.distance + 'm';
        document.getElementById('coins').textContent = gameState.coins;
        document.getElementById('score-display').textContent = '₹' + gameState.score;
        
        requestAnimationFrame(gameLoop);
    }
    
    function updateChicken() {
        // Horizontal movement
        if (keys['arrowleft'] || keys['a']) {
            chicken.velocityX = -chicken.speed;
        } else if (keys['arrowright'] || keys['d']) {
            chicken.velocityX = chicken.speed;
        } else {
            chicken.velocityX = 0;
        }
        
        // Jumping
        if ((keys['arrowup'] || keys['w'] || keys[' ']) && !chicken.jumping) {
            chicken.velocityY = -12;
            chicken.jumping = true;
        }
        
        // Apply gravity
        chicken.velocityY += 0.5;
        
        // Update position
        chicken.x += chicken.velocityX;
        chicken.y += chicken.velocityY;
        
        // Boundary checking
        if (chicken.x < 0) chicken.x = 0;
        if (chicken.x + chicken.width > canvas.width) chicken.x = canvas.width - chicken.width;
        
        // Ground collision
        if (chicken.y + chicken.height >= canvas.height - 10) {
            chicken.y = canvas.height - chicken.height - 10;
            chicken.velocityY = 0;
            chicken.jumping = false;
        }
    }
    
    function drawChicken() {
        ctx.fillStyle = '#FFD700';
        ctx.fillRect(chicken.x, chicken.y, chicken.width, chicken.height);
        ctx.fillStyle = '#ff6b35';
        ctx.font = '20px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('🐔', chicken.x + chicken.width / 2, chicken.y + chicken.height / 2);
    }
    
    function checkCollision(rect1, rect2) {
        return rect1.x < rect2.x + rect2.width &&
               rect1.x + rect1.width > rect2.x &&
               rect1.y < rect2.y + rect2.height &&
               rect1.y + rect1.height > rect2.y;
    }
    
    function checkCollisionCircle(rect, circle) {
        const closestX = Math.max(rect.x, Math.min(circle.x, rect.x + rect.width));
        const closestY = Math.max(rect.y, Math.min(circle.y, rect.y + rect.height));
        const distance = Math.sqrt((circle.x - closestX) ** 2 + (circle.y - closestY) ** 2);
        return distance < circle.radius + 15;
    }
    
    function endGame(won) {
        gameState.isRunning = false;
        
        const winAmount = gameState.score;
        updateBalance(won ? winAmount : -gameState.betAmount);
        
        if (won) {
            showNotification(`You won ₹${winAmount}!`, 'success');
        } else {
            showNotification(`Game Over! You lost ₹${gameState.betAmount}`, 'error');
        }
        
        // Update best score
        const bestScore = parseInt(document.getElementById('best-score').textContent);
        if (gameState.distance > bestScore) {
            document.getElementById('best-score').textContent = gameState.distance + 'm';
        }
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
</script>

<?php include '../includes/footer.php'; ?>
