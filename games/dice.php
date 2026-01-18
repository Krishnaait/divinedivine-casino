<?php
require_once '../includes/config.php';
$page_title = "Dice Game";
include '../includes/header.php';
?>

<style>
    .game-container {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(0, 217, 255, 0.1));
    }
    
    .dice-wrapper {
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
        padding: 40px;
        box-shadow: var(--shadow-lg);
    }
    
    .game-title {
        font-size: 2rem;
        color: var(--accent-gold);
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    }
    
    .dice-display {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 40px 0;
        min-height: 120px;
    }
    
    .dice {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: bold;
        color: var(--dark-bg);
        box-shadow: 0 8px 24px rgba(255, 107, 53, 0.4);
        animation: rollDice 0.6s ease-out;
        position: relative;
        border: 3px solid var(--accent-gold);
    }
    
    @keyframes rollDice {
        0% { transform: rotateX(360deg) rotateY(360deg); }
        100% { transform: rotateX(0) rotateY(0); }
    }
    
    .dice.rolling {
        animation: rollDice 0.6s ease-out infinite;
    }
    
    .game-controls {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 15px;
        padding: 25px;
        margin: 30px 0;
    }
    
    .control-group {
        margin-bottom: 20px;
    }
    
    .control-group label {
        display: block;
        color: var(--accent-gold);
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .control-group input,
    .control-group select {
        width: 100%;
        padding: 12px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--light-text);
        font-size: 1rem;
    }
    
    .control-group input::placeholder {
        color: var(--gray-text);
    }
    
    .prediction-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 20px 0;
    }
    
    .prediction-btn {
        padding: 15px;
        border: 2px solid var(--border-color);
        background: rgba(255, 255, 255, 0.05);
        color: var(--light-text);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .prediction-btn:hover {
        border-color: var(--primary-color);
        background: rgba(255, 107, 53, 0.1);
    }
    
    .prediction-btn.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }
    
    .game-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 20px 0;
        font-size: 0.9rem;
    }
    
    .stat-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 15px;
        border-radius: 10px;
        text-align: center;
    }
    
    .stat-label {
        color: var(--gray-text);
        margin-bottom: 5px;
    }
    
    .stat-value {
        color: var(--accent-gold);
        font-weight: 700;
        font-size: 1.2rem;
    }
    
    .play-button {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }
    
    .play-button:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255, 107, 53, 0.4);
    }
    
    .play-button:disabled {
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
        margin-bottom: 20px;
        text-align: center;
        font-size: 1.2rem;
    }
    
    .result-display {
        background: rgba(255, 215, 0, 0.1);
        border: 2px solid rgba(255, 215, 0, 0.3);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
        min-height: 80px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .result-label {
        color: var(--gray-text);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    
    .result-text {
        color: var(--accent-gold);
        font-size: 1.3rem;
        font-weight: 700;
    }
    
    .result-text.win {
        color: #4caf50;
    }
    
    .result-text.loss {
        color: #f44336;
    }
    
    .game-history {
        max-height: 300px;
        overflow-y: auto;
    }
    
    .history-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 10px;
        font-size: 0.85rem;
        border-left: 3px solid var(--primary-color);
    }
    
    .history-item.win {
        border-left-color: #4caf50;
    }
    
    .history-item.loss {
        border-left-color: #f44336;
    }
    
    @media (max-width: 1024px) {
        .dice-wrapper {
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
        
        .dice {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .prediction-buttons {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="game-container">
    <div class="dice-wrapper">
        <!-- Main Game Area -->
        <div class="game-area">
            <h1 class="game-title">🎲 Dice Game</h1>
            
            <div class="dice-display">
                <div class="dice" id="dice1">1</div>
                <div class="dice" id="dice2">1</div>
            </div>
            
            <div class="game-controls">
                <div class="control-group">
                    <label for="bet-amount">Bet Amount (₹)</label>
                    <input type="number" id="bet-amount" min="10" max="10000" value="100" step="10">
                </div>
                
                <div class="control-group">
                    <label>Your Prediction</label>
                    <div class="prediction-buttons">
                        <button class="prediction-btn" data-prediction="high">HIGH (8-12)</button>
                        <button class="prediction-btn" data-prediction="low">LOW (2-7)</button>
                    </div>
                </div>
                
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Total Wins</div>
                        <div class="stat-value" id="total-wins">0</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Win Rate</div>
                        <div class="stat-value" id="win-rate">0%</div>
                    </div>
                </div>
                
                <button class="play-button" id="play-btn">ROLL DICE</button>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Game Info</h3>
            
            <div class="result-display" id="result-display">
                <div class="result-label">Ready to play?</div>
                <div class="result-text">Make your prediction</div>
            </div>
            
            <h3 style="margin-top: 30px;">Recent Results</h3>
            <div class="game-history" id="game-history">
                <div style="text-align: center; color: var(--gray-text); padding: 20px;">
                    No games played yet
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedPrediction = null;
    let gameStats = {
        totalGames: 0,
        totalWins: 0,
        gameHistory: []
    };
    
    // Prediction buttons
    document.querySelectorAll('.prediction-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.prediction-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            selectedPrediction = this.dataset.prediction;
        });
    });
    
    // Play button
    document.getElementById('play-btn').addEventListener('click', playGame);
    
    function playGame() {
        const betAmount = parseInt(document.getElementById('bet-amount').value);
        const playBtn = document.getElementById('play-btn');
        
        // Validation
        if (!selectedPrediction) {
            showNotification('Please select HIGH or LOW', 'warning');
            return;
        }
        
        if (betAmount < 10 || betAmount > 10000) {
            showNotification('Bet must be between ₹10 and ₹10,000', 'warning');
            return;
        }
        
        if (betAmount > <?php echo getUserBalance(); ?>) {
            showNotification('Insufficient balance', 'error');
            return;
        }
        
        // Disable button during roll
        playBtn.disabled = true;
        
        // Roll animation
        rollDice();
        
        // Get result after animation
        setTimeout(() => {
            const dice1 = Math.floor(Math.random() * 6) + 1;
            const dice2 = Math.floor(Math.random() * 6) + 1;
            const total = dice1 + dice2;
            
            document.getElementById('dice1').textContent = dice1;
            document.getElementById('dice2').textContent = dice2;
            document.getElementById('dice1').classList.remove('rolling');
            document.getElementById('dice2').classList.remove('rolling');
            
            // Determine win/loss
            const isHigh = total >= 8;
            const isWin = (selectedPrediction === 'high' && isHigh) || (selectedPrediction === 'low' && !isHigh);
            
            // Update stats
            gameStats.totalGames++;
            if (isWin) {
                gameStats.totalWins++;
            }
            
            // Update balance
            const winAmount = isWin ? betAmount * 2 : -betAmount;
            updateBalance(winAmount);
            
            // Display result
            displayResult(isWin, total, betAmount);
            
            // Add to history
            addToHistory(isWin, total, selectedPrediction, betAmount);
            
            // Show notification
            if (isWin) {
                showNotification(`You won ₹${betAmount * 2}!`, 'success');
            } else {
                showNotification(`You lost ₹${betAmount}`, 'error');
            }
            
            // Re-enable button
            playBtn.disabled = false;
        }, 600);
    }
    
    function rollDice() {
        document.getElementById('dice1').classList.add('rolling');
        document.getElementById('dice2').classList.add('rolling');
    }
    
    function displayResult(isWin, total, betAmount) {
        const resultDisplay = document.getElementById('result-display');
        const resultText = resultDisplay.querySelector('.result-text');
        const resultLabel = resultDisplay.querySelector('.result-label');
        
        resultLabel.textContent = isWin ? '🎉 YOU WON!' : '😔 YOU LOST';
        resultText.textContent = `Total: ${total} | Bet: ₹${betAmount}`;
        resultText.className = `result-text ${isWin ? 'win' : 'loss'}`;
        
        // Update stats display
        const winRate = gameStats.totalGames > 0 ? Math.round((gameStats.totalWins / gameStats.totalGames) * 100) : 0;
        document.getElementById('total-wins').textContent = gameStats.totalWins;
        document.getElementById('win-rate').textContent = winRate + '%';
    }
    
    function addToHistory(isWin, total, prediction, betAmount) {
        const history = document.getElementById('game-history');
        
        if (history.querySelector('div[style*="text-align"]')) {
            history.innerHTML = '';
        }
        
        const item = document.createElement('div');
        item.className = `history-item ${isWin ? 'win' : 'loss'}`;
        item.innerHTML = `
            <strong>${isWin ? '✓' : '✗'} ${prediction.toUpperCase()}</strong><br>
            Total: ${total} | ₹${betAmount} ${isWin ? '(+₹' + betAmount + ')' : '(-₹' + betAmount + ')'}
        `;
        
        history.insertBefore(item, history.firstChild);
        
        // Keep only last 10 items
        while (history.children.length > 10) {
            history.removeChild(history.lastChild);
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
