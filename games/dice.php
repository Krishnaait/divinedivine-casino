<?php
require_once '../includes/config.php';
$page_title = "Dice Game";
include '../includes/header.php';
?>

<div class="game-container dice-bg">
    <div class="game-wrapper">
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
                    <div class="bet-input-group">
                        <input type="number" id="bet-amount" min="200" max="5500" value="200" step="100">
                        <button class="all-in-btn" id="all-in-btn" title="Bet all your balance">ALL IN</button>
                    </div>
                    <div class="bet-limits">Min: ₹200 | Max: ₹5,500</div>
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
        
        if (betAmount < 200 || betAmount > 5500) {
            showNotification('Bet must be between ₹200 and ₹5,500', 'warning');
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
    
    // ALL IN button handler
    document.getElementById('all-in-btn').addEventListener('click', function() {
        const currentBalance = parseInt(document.getElementById('balance-display').textContent.replace(/[₹,]/g, ''));
        const maxBet = Math.min(currentBalance, 5500);
        document.getElementById('bet-amount').value = maxBet;
        showNotification(`Bet set to ₹${maxBet.toLocaleString('en-IN')}`, 'info');
    });
</script>

<?php include '../includes/footer.php'; ?>
