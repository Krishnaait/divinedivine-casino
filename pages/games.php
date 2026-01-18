<?php
require_once '../includes/config.php';
$page_title = "Games";
include '../includes/header.php';
?>

<style>
    .games-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .games-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .games-header h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    
    .games-header p {
        font-size: 1.1rem;
        color: var(--gray-text);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
    }
    
    .game-card-large {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .game-card-large:hover {
        border-color: var(--primary-color);
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(255, 107, 53, 0.3);
    }
    
    .game-card-image {
        height: 200px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        position: relative;
        overflow: hidden;
    }
    
    .game-card-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        animation: shimmer 3s infinite;
    }
    
    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }
    
    .game-card-body {
        padding: 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .game-card-body h2 {
        color: var(--accent-gold);
        margin-bottom: 15px;
        font-size: 1.5rem;
    }
    
    .game-card-body p {
        color: var(--gray-text);
        margin-bottom: 20px;
        flex: 1;
    }
    
    .game-features {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }
    
    .game-features ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .game-features li {
        color: var(--gray-text);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .game-features li i {
        color: var(--primary-color);
        font-size: 0.8rem;
    }
    
    .game-card-footer {
        display: flex;
        gap: 10px;
    }
    
    .game-card-footer .btn {
        flex: 1;
        justify-content: center;
    }
    
    @media (max-width: 768px) {
        .games-grid {
            grid-template-columns: 1fr;
        }
        
        .games-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="games-container">
    <div class="games-header">
        <h1>Our Games</h1>
        <p>Choose your favorite game and start winning amazing rewards. Each game offers unique challenges and exciting opportunities to test your skills and luck.</p>
    </div>
    
    <div class="games-grid">
        <!-- Dice Game -->
        <div class="game-card-large">
            <div class="game-card-image">
                <i class="fas fa-dice"></i>
            </div>
            <div class="game-card-body">
                <h2>Dice Game</h2>
                <p>Roll the dice and predict the outcome! Choose between high or low, odd or even. Simple rules, thrilling gameplay, and big rewards await you.</p>
                <div class="game-features">
                    <ul>
                        <li><i class="fas fa-check"></i> Quick rounds - 10 seconds per game</li>
                        <li><i class="fas fa-check"></i> High win rates - Up to 95%</li>
                        <li><i class="fas fa-check"></i> Flexible betting - ₹10 to ₹10,000</li>
                        <li><i class="fas fa-check"></i> Instant payouts</li>
                    </ul>
                </div>
                <div class="game-card-footer">
                    <a href="../games/dice.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play Now
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Chicken Game -->
        <div class="game-card-large">
            <div class="game-card-image">
                <i class="fas fa-feather"></i>
            </div>
            <div class="game-card-body">
                <h2>Chicken Game</h2>
                <p>Guide the chicken through an exciting adventure! Dodge obstacles, collect coins, and reach the finish line. How far can you go?</p>
                <div class="game-features">
                    <ul>
                        <li><i class="fas fa-check"></i> Engaging gameplay</li>
                        <li><i class="fas fa-check"></i> Progressive difficulty</li>
                        <li><i class="fas fa-check"></i> Bonus multipliers</li>
                        <li><i class="fas fa-check"></i> Leaderboard rankings</li>
                    </ul>
                </div>
                <div class="game-card-footer">
                    <a href="../games/chicken.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play Now
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Mines Game -->
        <div class="game-card-large">
            <div class="game-card-image">
                <i class="fas fa-bomb"></i>
            </div>
            <div class="game-card-body">
                <h2>Mines Game</h2>
                <p>Uncover safe tiles and avoid the mines! The longer you survive, the bigger your multiplier. Test your strategy and luck!</p>
                <div class="game-features">
                    <ul>
                        <li><i class="fas fa-check"></i> Strategic gameplay</li>
                        <li><i class="fas fa-check"></i> Risk vs reward balance</li>
                        <li><i class="fas fa-check"></i> Multiplying rewards</li>
                        <li><i class="fas fa-check"></i> Customizable difficulty</li>
                    </ul>
                </div>
                <div class="game-card-footer">
                    <a href="../games/mines.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play Now
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Plinko Game -->
        <div class="game-card-large">
            <div class="game-card-image">
                <i class="fas fa-circle"></i>
            </div>
            <div class="game-card-body">
                <h2>Plinko Game</h2>
                <p>Drop the ball and watch it bounce through the pegs! Land in high-value slots for massive rewards. Pure luck, pure fun!</p>
                <div class="game-features">
                    <ul>
                        <li><i class="fas fa-check"></i> Mesmerizing physics</li>
                        <li><i class="fas fa-check"></i> Multiple payout slots</li>
                        <li><i class="fas fa-check"></i> Adjustable multipliers</li>
                        <li><i class="fas fa-check"></i> Smooth animations</li>
                    </ul>
                </div>
                <div class="game-card-footer">
                    <a href="../games/plinko.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
