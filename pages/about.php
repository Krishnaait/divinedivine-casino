<?php
require_once '../includes/config.php';
$page_title = "About Us";
include '../includes/header.php';
?>

<style>
    .about-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .about-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .about-header h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    
    .about-header p {
        font-size: 1.1rem;
        color: var(--gray-text);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        margin-bottom: 80px;
    }
    
    .about-content h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }
    
    .about-content p {
        margin-bottom: 15px;
        line-height: 1.8;
    }
    
    .about-image {
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(0, 217, 255, 0.2));
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        font-size: 5rem;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin: 60px 0;
    }
    
    .value-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 16px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .value-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    }
    
    .value-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }
    
    .value-card h3 {
        color: var(--accent-gold);
        margin-bottom: 10px;
    }
    
    .value-card p {
        color: var(--gray-text);
        font-size: 0.95rem;
    }
    
    .company-info {
        background: rgba(255, 215, 0, 0.05);
        border: 2px solid rgba(255, 215, 0, 0.2);
        border-radius: 16px;
        padding: 40px;
        margin-top: 60px;
    }
    
    .company-info h2 {
        margin-bottom: 30px;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }
    
    .info-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 12px;
        border-left: 3px solid var(--primary-color);
    }
    
    .info-label {
        color: var(--accent-gold);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    
    .info-value {
        color: var(--light-text);
        word-break: break-word;
    }
    
    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .about-header h1 {
            font-size: 1.8rem;
        }
        
        .about-content h2 {
            font-size: 1.5rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="about-container">
    <!-- Header -->
    <div class="about-header">
        <h1>About DineDivine Ventures</h1>
        <p>Pioneering the future of gaming entertainment with innovation, integrity, and excellence.</p>
    </div>
    
    <!-- Main Content -->
    <div class="about-grid">
        <div class="about-content">
            <h2>Our Story</h2>
            <p>DineDivine Ventures Private Limited was founded with a vision to revolutionize the gaming industry by providing a premium, secure, and entertaining platform for players worldwide.</p>
            <p>We believe in creating an environment where players can enjoy thrilling games with fair odds, transparent operations, and exceptional customer service. Our commitment to excellence drives everything we do.</p>
            <p>With cutting-edge technology and a player-first approach, we've built a gaming ecosystem that combines entertainment, security, and responsible gaming practices.</p>
        </div>
        <div class="about-image">
            🎮
        </div>
    </div>
    
    <!-- Values Section -->
    <h2 style="text-align: center; margin: 60px 0 40px;">Our Core Values</h2>
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">🛡️</div>
            <h3>Security</h3>
            <p>Your safety and data protection are our top priorities. We use industry-leading encryption and security measures.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">⚖️</div>
            <h3>Fairness</h3>
            <p>All our games are designed with fair algorithms and transparent mechanics to ensure equal opportunities for all players.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">💎</div>
            <h3>Excellence</h3>
            <p>We strive for excellence in every aspect of our service, from game design to customer support.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">🤝</div>
            <h3>Integrity</h3>
            <p>We operate with complete transparency and integrity in all our business practices and player interactions.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">🌟</div>
            <h3>Innovation</h3>
            <p>We continuously innovate to bring new and exciting gaming experiences to our players.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">❤️</div>
            <h3>Responsibility</h3>
            <p>We promote responsible gaming and provide tools to help players maintain healthy gaming habits.</p>
        </div>
    </div>
    
    <!-- Company Information -->
    <div class="company-info">
        <h2>Company Information</h2>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Company Name</div>
                <div class="info-value"><?php echo COMPANY_FULL_NAME; ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">CIN</div>
                <div class="info-value"><?php echo CIN; ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">GST No.</div>
                <div class="info-value"><?php echo GST_NO; ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">PAN No.</div>
                <div class="info-value"><?php echo PAN_NO; ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Address</div>
                <div class="info-value"><?php echo ADDRESS; ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value"><?php echo EMAIL; ?></div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
