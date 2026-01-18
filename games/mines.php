<?php
require_once '../includes/config.php';
$page_title = "Mines Game";
include '../includes/header.php';
?>

<style>
    .game-container {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(157, 78, 221, 0.1), rgba(255, 107, 53, 0.1));
    }
    
    .mines-wrapper {
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
    
    .mines-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 12px;
        margin: 30px 0;
    }
    
    .mine-tile {
        aspect-ratio: 1;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(0, 217, 255, 0.2));
        border: 2px solid var(--border-color);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: bold;
        position: relative;
        overflow: hidden;
    }
    
    .mine-tile::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .mine-tile:hover:not(.revealed):not(.disabled) {
        border-color: var(--primary-color);
        transform: scale(1.05);
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.3), rgba(0, 217, 255, 0.3));
    }
    
    .mine-tile:hover:not(.revealed):not(.disabled)::before {
        left: 100%;
    }
    
    .mine-tile.revealed {
        cursor: default;
        border-color: var(--primary-color);
    }
    
    .mine-tile.safe {
        background: linear-gradient(135deg, rgba(76, 175, 80, 0.2), rgba(76, 175, 80, 0.1));
        border-color: #4caf50;
        color: #4caf50;
    }
    
    .mine-tile.mine {
        background: linear-gradient(135deg, rgba(244, 67, 54, 0.2), rgba(244, 67, 54, 0.1));
        border-color: #f44336;
        color: #f44336;
    }
    
    .mine-tile.disabled {
        opacity: 0.5;
        cursor: not-allowed;
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
    
    .control-group input,
    .control-group select {
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
    
    .cash-out-btn {
        background: #4caf50;
        color: white;
    }
    
    .cash-out-btn:hover:not(:disabled) {
        background: #45a049;
        transform: translateY(-2px);
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
        margin-bottom: 15px;
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
    
    .multiplier-display {
        background: rgba(0, 217, 255, 0.1);
        border: 1px solid rgba(0, 217, 255, 0.3);
        border-radius: 10px;
        padding: 12px;
        text-align: center;
        margin-bottom: 15px;
    }
    
    .multiplier-label {
        color: var(--gray-text);
        font-size: 0.8rem;
    }
    
    .multiplier-value {
        color: var(--accent-cyan);
        font-size: 1.3rem;
        font-weight: 700;
    }
    
    @media (max-width: 1024px) {
        .mines-wrapper {
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
        
        .mines-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
    }
</style>

<div class="game-container">
    <div class="mines-wrapper">
        <!-- Main Game Area -->
        <div class="game-area">
            <h1 class="game-title">💣 Mines Game</h1>
            
            <div class="mines-grid" id="mines-grid"></div>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <input type="number" id="bet-amount" min="10" max="10000" value="100" step="10">
                </div>
                
                <div class="control-group">
                    <label for="mines-count">Number of Mines</label>
                    <select id="mines-count">
                        <option value="1">1 Mine (Easier)</option>
                        <option value="3" selected>3 Mines (Medium)</option>
                        <option value="5">5 Mines (Hard)</option>
                    </select>
                </div>
                
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Safe Tiles</div>
                        <div class="stat-value" id="safe-count">0</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Revealed</div>
                        <div class="stat-value" id="revealed-count">0/25</div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button class="start-btn" id="start-btn">NEW GAME</button>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Game Status</h3>
            
            <div class="info-box">
                <div class="info-label">Current Winnings</div>
                <div class="info-value" id="current-winnings">₹0</div>
            </div>
            
            <div class="multiplier-display">
                <div class="multiplier-label">Current Multiplier</div>
                <div class="multiplier-value" id="multiplier">1.0x</div>
            </div>
            
            <button class="cash-out-btn" id="cash-out-btn" style="width: 100%; margin-bottom: 15px;">
                <i class="fas fa-money-bill"></i> CASH OUT
            </button>
            
            <h3>How to Play</h3>
            <div style="background: rgba(0, 217, 255, 0.1); border: 1px solid rgba(0, 217, 255, 0.3); border-radius: 10px; padding: 12px; font-size: 0.85rem; color: var(--gray-text);">
                <p style="margin-bottom: 8px;">✓ Click tiles to reveal them</p>
                <p style="margin-bottom: 8px;">✓ Find safe tiles to increase multiplier</p>
                <p style="margin-bottom: 8px;">✓ Avoid mines - game ends!</p>
                <p>✓ Cash out anytime to secure winnings</p>
            </div>
        </div>
    </div>
</div>

<script>
    const GRID_SIZE = 25;
    let gameState = {
        isRunning: false,
        mineCount: 3,
        betAmount: 100,
        safeRevealed: 0,
        multiplier: 1.0,
        winnings: 0,
        mines: new Set()
    };
    
    // Initialize grid
    function initializeGrid() {
        const grid = document.getElementById('mines-grid');
        grid.innerHTML = '';
        
        for (let i = 0; i < GRID_SIZE; i++) {
            const tile = document.createElement('div');
            tile.className = 'mine-tile';
            tile.dataset.index = i;
            tile.textContent = '?';
            tile.addEventListener('click', () => revealTile(i));
            grid.appendChild(tile);
        }
    }
    
    // Start new game
    document.getElementById('start-btn').addEventListener('click', startGame);
    
    function startGame() {
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        const mineCount = parseInt(document.getElementById('mines-count').value);
        
        if (betAmount < 10 || betAmount > 10000) {
            showNotification('Bet must be between ₹10 and ₹10,000', 'warning');
            return;
        }
        
        gameState.isRunning = true;
        gameState.betAmount = betAmount;
        gameState.mineCount = mineCount;
        gameState.safeRevealed = 0;
        gameState.multiplier = 1.0;
        gameState.winnings = 0;
        gameState.mines = new Set();
        
        // Generate mines
        while (gameState.mines.size < mineCount) {
            gameState.mines.add(Math.floor(Math.random() * GRID_SIZE));
        }
        
        initializeGrid();
        updateDisplay();
        
        document.getElementById('start-btn').disabled = true;
        document.getElementById('cash-out-btn').disabled = false;
    }
    
    function revealTile(index) {
        if (!gameState.isRunning) return;
        
        const tile = document.querySelector(`[data-index="${index}"]`);
        if (tile.classList.contains('revealed')) return;
        
        const isMine = gameState.mines.has(index);
        
        tile.classList.add('revealed');
        tile.classList.add(isMine ? 'mine' : 'safe');
        tile.textContent = isMine ? '💣' : '✓';
        tile.classList.add('disabled');
        
        if (isMine) {
            // Game Over - Hit a mine
            endGame(false);
        } else {
            // Safe tile revealed
            gameState.safeRevealed++;
            gameState.multiplier = 1 + (gameState.safeRevealed * 0.15);
            gameState.winnings = Math.floor(gameState.betAmount * gameState.multiplier);
            
            updateDisplay();
            
            // Check if all safe tiles revealed
            if (gameState.safeRevealed === GRID_SIZE - gameState.mineCount) {
                endGame(true);
            }
        }
    }
    
    // Cash out button
    document.getElementById('cash-out-btn').addEventListener('click', () => {
        if (gameState.isRunning && gameState.safeRevealed > 0) {
            endGame(true);
        }
    });
    
    function endGame(won) {
        gameState.isRunning = false;
        document.getElementById('start-btn').disabled = false;
        document.getElementById('cash-out-btn').disabled = true;
        
        // Disable all tiles
        document.querySelectorAll('.mine-tile').forEach(tile => {
            tile.classList.add('disabled');
        });
        
        // Reveal all mines if lost
        if (!won) {
            gameState.mines.forEach(index => {
                const tile = document.querySelector(`[data-index="${index}"]`);
                if (!tile.classList.contains('revealed')) {
                    tile.classList.add('revealed', 'mine');
                    tile.textContent = '💣';
                }
            });
        }
        
        // Update balance
        const amount = won ? gameState.winnings : -gameState.betAmount;
        updateBalance(amount);
        
        if (won && gameState.safeRevealed > 0) {
            showNotification(`You won ₹${gameState.winnings}!`, 'success');
        } else if (!won) {
            showNotification(`Hit a mine! You lost ₹${gameState.betAmount}`, 'error');
        }
    }
    
    function updateDisplay() {
        const safeCount = GRID_SIZE - gameState.mineCount;
        document.getElementById('safe-count').textContent = safeCount;
        document.getElementById('revealed-count').textContent = gameState.safeRevealed + '/' + safeCount;
        document.getElementById('multiplier').textContent = gameState.multiplier.toFixed(2) + 'x';
        document.getElementById('current-winnings').textContent = '₹' + gameState.winnings;
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
    initializeGrid();
    updateDisplay();
</script>

<?php include '../includes/footer.php'; ?>
