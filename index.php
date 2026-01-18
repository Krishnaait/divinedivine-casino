<?php
require_once 'includes/config.php';
$page_title = "Home";
include 'includes/header.php';
?>

<style>
    /* Hero Section */
    .hero {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(157, 78, 221, 0.1));
        position: relative;
        overflow: hidden;
    }
    
    .hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 215, 0, 0.1), transparent);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }
    
    .hero::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -5%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(0, 217, 255, 0.1), transparent);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite reverse;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(30px); }
    }
    
    .hero-content {
        max-width: 800px;
        text-align: center;
        position: relative;
        z-index: 1;
        animation: fadeIn 0.8s ease-out;
    }
    
    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--gray-text);
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .hero-buttons .btn {
        padding: 15px 40px;
        font-size: 1.1rem;
    }
    
    /* Features Section */
    .features {
        padding: 80px 20px;
        background: linear-gradient(180deg, transparent, rgba(255, 107, 53, 0.05));
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .feature-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }
    
    .feature-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    }
    
    .feature-card:hover::before {
        transform: scaleX(1);
    }
    
    .feature-icon {
        font-size: 3rem;
        color: var(--accent-gold);
        margin-bottom: 20px;
    }
    
    .feature-card h3 {
        color: var(--light-text);
        margin-bottom: 15px;
    }
    
    .feature-card p {
        color: var(--gray-text);
        font-size: 0.95rem;
    }
    
    /* Games Section */
    .games-section {
        padding: 80px 20px;
        background: linear-gradient(180deg, rgba(0, 217, 255, 0.05), transparent);
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .section-title p {
        font-size: 1.1rem;
        color: var(--gray-text);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .game-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }
    
    .game-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.2), transparent);
        transition: left 0.5s ease;
        z-index: 1;
    }
    
    .game-card:hover::before {
        left: 100%;
    }
    
    .game-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(255, 107, 53, 0.3);
    }
    
    .game-card-header {
        height: 150px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        position: relative;
        z-index: 2;
    }
    
    .game-card-content {
        padding: 25px;
        position: relative;
        z-index: 2;
    }
    
    .game-card h3 {
        color: var(--accent-gold);
        margin-bottom: 10px;
        font-size: 1.3rem;
    }
    
    .game-card p {
        color: var(--gray-text);
        font-size: 0.9rem;
        margin-bottom: 20px;
    }
    
    .game-card .btn {
        width: 100%;
        justify-content: center;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.15), rgba(157, 78, 221, 0.15));
        text-align: center;
        margin: 40px 0;
    }
    
    .cta-section h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    
    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Stats Section */
    .stats-section {
        padding: 60px 20px;
        background: rgba(255, 255, 255, 0.02);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .stat-card {
        text-align: center;
        padding: 30px;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--accent-gold);
        margin-bottom: 10px;
    }
    
    .stat-label {
        color: var(--gray-text);
        font-size: 1rem;
    }
    
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .hero-buttons {
            flex-direction: column;
        }
        
        .hero-buttons .btn {
            width: 100%;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .cta-section h2 {
            font-size: 1.8rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome to DineDivine Ventures</h1>
        <p class="hero-subtitle">Experience the ultimate gaming platform with thrilling games, exciting rewards, and endless entertainment.</p>
        <div class="hero-buttons">
            <a href="pages/games.php" class="btn btn-primary">
                <i class="fas fa-play"></i> Play Now
            </a>
            <a href="pages/about.php" class="btn btn-outline">
                <i class="fas fa-info-circle"></i> Learn More
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Us?</h2>
            <p>Discover what makes DineDivine Ventures the ultimate gaming destination</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Secure & Safe</h3>
                <p>Your data and transactions are protected with industry-leading security measures.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Lightning Fast</h3>
                <p>Experience smooth gameplay with optimized performance and zero lag.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Premium Quality</h3>
                <p>Enjoy high-quality graphics and immersive gaming experiences.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <h3>Exciting Rewards</h3>
                <p>Win big with generous rewards and exclusive bonuses for our players.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Our dedicated support team is always ready to help you.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Friendly</h3>
                <p>Play anytime, anywhere on your favorite device.</p>
            </div>
        </div>
    </div>
</section>

<!-- Games Section -->
<section class="games-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Games</h2>
            <p>Choose from our collection of exciting and rewarding games</p>
        </div>
        
        <div class="games-grid">
            <!-- Dice Game -->
            <div class="game-card">
                <div class="game-card-header">
                    <i class="fas fa-dice"></i>
                </div>
                <div class="game-card-content">
                    <h3>Dice Game</h3>
                    <p>Roll the dice and test your luck! Predict the outcome and win big.</p>
                    <a href="games/dice.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play
                    </a>
                </div>
            </div>
            
            <!-- Chicken Game -->
            <div class="game-card">
                <div class="game-card-header">
                    <i class="fas fa-feather"></i>
                </div>
                <div class="game-card-content">
                    <h3>Chicken Game</h3>
                    <p>Guide the chicken to victory! Dodge obstacles and collect rewards.</p>
                    <a href="games/chicken.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play
                    </a>
                </div>
            </div>
            
            <!-- Mines Game -->
            <div class="game-card">
                <div class="game-card-header">
                    <i class="fas fa-bomb"></i>
                </div>
                <div class="game-card-content">
                    <h3>Mines Game</h3>
                    <p>Uncover the safe tiles and avoid the mines. Strategy meets luck!</p>
                    <a href="games/mines.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play
                    </a>
                </div>
            </div>
            
            <!-- Plinko Game -->
            <div class="game-card">
                <div class="game-card-header">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="game-card-content">
                    <h3>Plinko Game</h3>
                    <p>Drop the ball and watch it bounce! Land in the high-value slots.</p>
                    <a href="games/plinko.php" class="btn btn-primary">
                        <i class="fas fa-play"></i> Play
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Active Players</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">4</div>
                <div class="stat-label">Exciting Games</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">₹50L+</div>
                <div class="stat-label">Total Rewards</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Play?</h2>
        <p>Join thousands of players enjoying premium gaming experiences at DineDivine Ventures.</p>
        <a href="pages/games.php" class="btn btn-primary">
            <i class="fas fa-play"></i> Start Playing Now
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
