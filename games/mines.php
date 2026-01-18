<?php
require_once '../includes/config.php';
$page_title = "Mines Game";
include '../includes/header.php';
?>

<div class="game-container mines-bg">
    <div class="game-wrapper">
        <!-- Main Game Area -->
        <div class="game-area">
            <h1 class="game-title">💣 Mines Game</h1>
            
            <div class="mines-grid" id="mines-grid"></div>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <input type="number" id="bet-amount" min="200" max="5500" value="200" step="10">
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
