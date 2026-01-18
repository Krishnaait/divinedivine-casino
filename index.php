<?php
require_once 'includes/config.php';
$page_title = "Home";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-left">
            <div class="age-restriction">
                <i class="fas fa-exclamation-circle"></i>
                <span>18+</span>
            </div>
            <h1 class="hero-title">Experience Premium Gaming</h1>
            <p class="hero-subtitle">Join thousands of players in the most exciting casino games. Play for free, have fun!</p>
            <div class="hero-buttons">
                <a href="<?php echo SITE_URL; ?>pages/games.php" class="btn btn-hero-primary">
                    <i class="fas fa-gamepad"></i>
                    Play Now
                </a>
                <a href="<?php echo SITE_URL; ?>pages/about.php" class="btn btn-hero-secondary">
                    <i class="fas fa-info-circle"></i>
                    Learn More
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Free to Play</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Exciting Games</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0₹</div>
                    <div class="stat-label">No Real Money</div>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <div class="hero-image-container">
                <div class="floating-card card-1">
                    <i class="fas fa-dice"></i>
                    <span>Dice</span>
                </div>
                <div class="floating-card card-2">
                    <i class="fas fa-bomb"></i>
                    <span>Mines</span>
                </div>
                <div class="floating-card card-3">
                    <i class="fas fa-coins"></i>
                    <span>Plinko</span>
                </div>
                <div class="floating-card card-4">
                    <i class="fas fa-drumstick-bite"></i>
                    <span>Chicken</span>
                </div>
                <div class="hero-center-badge">
                    <div class="badge-glow"></div>
                    <i class="fas fa-crown"></i>
                    <p>Premium</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section section">
    <div class="container">
        <h2 class="section-title text-center">Why Choose DineDivine Ventures?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>100% Secure</h3>
                <p>Your data and gameplay are protected with enterprise-grade security measures.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Fair Play</h3>
                <p>All games use certified random algorithms ensuring fair and transparent gameplay.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <h3>Free Entertainment</h3>
                <p>Enjoy unlimited gaming entertainment without spending any real money.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Our dedicated support team is always ready to assist you anytime, anywhere.</p>
            </div>
        </div>
    </div>
</section>

<!-- Games Showcase Section -->
<section class="games-showcase section">
    <div class="container">
        <h2 class="section-title text-center">Popular Games</h2>
        <div class="games-grid">
            <a href="<?php echo SITE_URL; ?>games/dice.php" class="game-card">
                <div class="game-icon">🎲</div>
                <h3>Dice Game</h3>
                <p>Predict HIGH or LOW and win 2x your bet!</p>
                <div class="game-badge">2x Payout</div>
            </a>
            <a href="<?php echo SITE_URL; ?>games/chicken.php" class="game-card">
                <div class="game-icon">🐔</div>
                <h3>Chicken Adventure</h3>
                <p>Navigate through obstacles and collect coins!</p>
                <div class="game-badge">Skill Based</div>
            </a>
            <a href="<?php echo SITE_URL; ?>games/mines.php" class="game-card">
                <div class="game-icon">💣</div>
                <h3>Mines Game</h3>
                <p>Reveal safe tiles and multiply your winnings!</p>
                <div class="game-badge">Up to 10x</div>
            </a>
            <a href="<?php echo SITE_URL; ?>games/plinko.php" class="game-card">
                <div class="game-icon">🎯</div>
                <h3>Plinko Game</h3>
                <p>Drop the ball and watch it bounce to victory!</p>
                <div class="game-badge">Up to 5x</div>
            </a>
        </div>
        <div class="text-center" style="margin-top: 40px;">
            <a href="<?php echo SITE_URL; ?>pages/games.php" class="btn btn-primary">View All Games</a>
        </div>
    </div>
</section>

<!-- Premium Gaming Experience Section -->
<section class="gaming-experience-section section" style="background: rgba(255, 255, 255, 0.02);">
    <div class="container">
        <h2 class="section-title text-center">Premium Gaming Experience</h2>
        <p class="text-center" style="color: var(--gray-text); max-width: 700px; margin: 0 auto 50px;">Immerse yourself in the world of high-quality entertainment with stunning visuals and engaging gameplay.</p>
        
        <div class="experience-grid">
            <div class="experience-card">
                <div class="experience-image">
                    <img src="<?php echo SITE_URL; ?>assets/images/modern_casino_interior.jpg" alt="Modern Casino Experience">
                    <div class="experience-overlay">
                        <h3>Luxurious Ambiance</h3>
                        <p>Experience the thrill of a premium casino environment from the comfort of your home.</p>
                    </div>
                </div>
            </div>
            
            <div class="experience-card">
                <div class="experience-image">
                    <img src="<?php echo SITE_URL; ?>assets/images/realistic_casino_floor.png" alt="Casino Floor">
                    <div class="experience-overlay">
                        <h3>Authentic Gaming</h3>
                        <p>Enjoy realistic game mechanics and stunning graphics that bring the casino to life.</p>
                    </div>
                </div>
            </div>
            
            <div class="experience-card">
                <div class="experience-image">
                    <img src="<?php echo SITE_URL; ?>assets/images/realistic_blackjack.png" alt="Table Games">
                    <div class="experience-overlay">
                        <h3>Skill & Strategy</h3>
                        <p>Test your skills with games that combine luck and strategy for maximum entertainment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Transparency Section -->
    <section class="transparency-section section" style="background: rgba(255, 255, 255, 0.02); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 class="section-title">100% Transparent & Free-to-Play</h2>
                <p style="color: var(--gray-text); max-width: 700px; margin: 0 auto;">We believe in complete honesty with our players. Here is exactly how DineDivine Ventures operates.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color);">
                    <div style="font-size: 2rem; margin-bottom: 15px;">💰</div>
                    <h3 style="margin-bottom: 10px; color: var(--gold-color);">No Real Money</h3>
                    <p style="font-size: 0.95rem; line-height: 1.6;">This is a social gaming platform. We do not accept real money deposits, and we do not offer real money withdrawals. All gameplay is 100% free.</p>
                </div>
                
                <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color);">
                    <div style="font-size: 2rem; margin-bottom: 15px;">🎮</div>
                    <h3 style="margin-bottom: 10px; color: var(--gold-color);">Virtual Currency</h3>
                    <p style="font-size: 0.95rem; line-height: 1.6;">All currency used on this site is virtual (₹) and has no real-world value. It cannot be exchanged for cash, prizes, or any other value outside the site.</p>
                </div>
                
                <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 16px; border: 1px solid var(--border-color);">
                    <div style="font-size: 2rem; margin-bottom: 15px;">🚫</div>
                    <h3 style="margin-bottom: 10px; color: var(--gold-color);">No Prizes or Rewards</h3>
                    <p style="font-size: 0.95rem; line-height: 1.6;">We do not offer any real-world prizes, rewards, gift cards, or monetary incentives. Our platform is strictly for entertainment and fun.</p>
                </div>
            </div>
            
            <div style="margin-top: 50px; padding: 30px; background: rgba(255, 107, 53, 0.05); border-radius: 16px; border: 1px dashed var(--primary-color); text-align: center;">
                <p style="font-size: 0.9rem; color: var(--gray-text);">
                    <strong>Legal Disclosure:</strong> DineDivine Ventures Private Limited is a registered entity (CIN: U56102HR2024PTC123713). We operate in full compliance with Indian laws governing social gaming and entertainment platforms. This website does not facilitate gambling.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
<section class="cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Playing?</h2>
            <p>Join thousands of players and experience the thrill of premium gaming today!</p>
            <a href="<?php echo SITE_URL; ?>pages/games.php" class="btn btn-accent btn-lg">
                <i class="fas fa-play-circle"></i>
                Start Playing Now
            </a>
        </div>
    </div>
</section>

<style>
/* ============================================
   Hero Section - Caesars Slots Inspired
   ============================================ */

.hero-section {
    min-height: calc(100vh - 80px);
    background: linear-gradient(135deg, #1a0a3e 0%, #0a0e27 50%, #1a0a3e 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 60px 20px;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(255, 107, 53, 0.15), transparent 50%),
        radial-gradient(circle at 80% 50%, rgba(157, 78, 221, 0.15), transparent 50%),
        radial-gradient(circle at 50% 0%, rgba(255, 215, 0, 0.1), transparent 60%);
    animation: pulse 8s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 1; }
}

.hero-content {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 1;
}

.hero-left {
    padding: 20px;
}

.age-restriction {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #ff6b35, #d94d1f);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.4);
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.age-restriction i {
    font-size: 1.2rem;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #ffd700 0%, #ff6b35 50%, #9d4edd 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

.hero-subtitle {
    font-size: 1.3rem;
    color: #b0b0b0;
    margin-bottom: 40px;
    line-height: 1.6;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.btn-hero-primary {
    background: linear-gradient(135deg, #ff6b35, #d94d1f);
    color: white;
    padding: 18px 40px;
    font-size: 1.2rem;
    font-weight: 700;
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.6);
}

.btn-hero-secondary {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 215, 0, 0.5);
    color: #ffd700;
    padding: 18px 40px;
    font-size: 1.2rem;
    font-weight: 700;
}

.btn-hero-secondary:hover {
    background: rgba(255, 215, 0, 0.2);
    border-color: #ffd700;
}

.hero-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.hero-stats .stat-item {
    text-align: center;
}

.hero-stats .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #ffd700;
    margin-bottom: 5px;
}

.hero-stats .stat-label {
    font-size: 0.9rem;
    color: #b0b0b0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Hero Right - Floating Cards */
.hero-right {
    position: relative;
    height: 500px;
}

.hero-image-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.floating-card {
    position: absolute;
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(157, 78, 221, 0.2));
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 215, 0, 0.3);
    border-radius: 20px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    animation: float 6s ease-in-out infinite;
}

.floating-card i {
    font-size: 2.5rem;
    color: #ffd700;
}

.floating-card span {
    font-weight: 600;
    color: white;
}

.card-1 {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.card-2 {
    top: 10%;
    right: 10%;
    animation-delay: 1.5s;
}

.card-3 {
    bottom: 10%;
    left: 10%;
    animation-delay: 3s;
}

.card-4 {
    bottom: 10%;
    right: 10%;
    animation-delay: 4.5s;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.hero-center-badge {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 180px;
    height: 180px;
    background: linear-gradient(135deg, #ffd700, #ff6b35);
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 60px rgba(255, 215, 0, 0.6);
    animation: rotate 10s linear infinite;
}

@keyframes rotate {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

.badge-glow {
    position: absolute;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.4), transparent);
    border-radius: 50%;
    animation: glow 2s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.2); opacity: 1; }
}

.hero-center-badge i {
    font-size: 4rem;
    color: #0a0e27;
    z-index: 1;
}

.hero-center-badge p {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0a0e27;
    margin: 0;
    z-index: 1;
}

/* Features Section */
.features-section {
    background: linear-gradient(180deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
}

.section-title {
    font-size: 2.5rem;
    margin-bottom: 60px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.feature-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-xl);
    padding: 40px 30px;
    text-align: center;
    transition: var(--transition-normal);
}

.feature-card:hover {
    border-color: var(--primary-color);
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(255, 107, 53, 0.3);
}

.feature-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-purple));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
}

.feature-card h3 {
    color: var(--accent-gold);
    margin-bottom: 15px;
}

/* Games Showcase */
.games-showcase {
    background: var(--dark-bg);
}

.games-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.game-card {
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(157, 78, 221, 0.1));
    backdrop-filter: blur(10px);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-xl);
    padding: 40px 30px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.game-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 215, 0, 0.1), transparent);
    transform: rotate(45deg);
    transition: var(--transition-slow);
}

.game-card:hover::before {
    animation: shine 1.5s ease-in-out;
}

@keyframes shine {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}

.game-card:hover {
    border-color: var(--accent-gold);
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(255, 215, 0, 0.3);
}

.game-icon {
    font-size: 4rem;
    margin-bottom: 20px;
}

.game-card h3 {
    color: var(--accent-gold);
    margin-bottom: 15px;
}

.game-card p {
    color: var(--gray-text);
    margin-bottom: 20px;
}

.game-badge {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(157, 78, 221, 0.2));
    text-align: center;
}

.cta-content h2 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 1.3rem;
    margin-bottom: 40px;
}

.btn-lg {
    padding: 20px 50px;
    font-size: 1.3rem;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .hero-right {
        height: 400px;
    }
    
    .hero-title {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
    }
    
    .hero-stats {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .hero-right {
        display: none;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
