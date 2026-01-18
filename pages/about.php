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
    
    <!-- Transparency & Disclosure Section -->
    <div class="transparency-section" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(157, 78, 221, 0.1)); border: 2px solid var(--border-color); border-radius: 20px; padding: 50px; margin: 80px 0;">
        <h2 style="text-align: center; margin-bottom: 40px; font-size: 2.2rem;">🔍 100% Transparency & Disclosure</h2>
        
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 15px; margin-bottom: 30px;">
                <h3 style="color: var(--gold-color); margin-bottom: 15px;">✅ Free-to-Play Entertainment Platform</h3>
                <p style="line-height: 1.8; margin-bottom: 10px;">DineDivine Ventures operates as a <strong>100% free-to-play entertainment platform</strong>. We want to be absolutely clear about our business model:</p>
                <ul style="list-style: none; padding-left: 0; margin-top: 15px;">
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">💰 <strong>No Real Money Gambling:</strong> We do not accept, process, or facilitate any real money transactions for gaming purposes.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🎮 <strong>Virtual Currency Only:</strong> All gameplay uses virtual currency (₹) that has absolutely no real-world monetary value.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>Cannot Be Exchanged:</strong> Virtual currency cannot be withdrawn, cashed out, or exchanged for real money, goods, or services.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🎯 <strong>Entertainment Purpose:</strong> Our games are designed purely for entertainment and recreational purposes.</li>
                    <li style="padding: 8px 0;">🔒 <strong>No Deposits or Withdrawals:</strong> We do not offer any deposit or withdrawal mechanisms for real money.</li>
                </ul>
            </div>
            
            <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 15px; margin-bottom: 30px;">
                <h3 style="color: var(--gold-color); margin-bottom: 15px;">🎁 What You Get (For Free)</h3>
                <p style="line-height: 1.8; margin-bottom: 10px;">When you play on our platform, here's exactly what you receive:</p>
                <ul style="list-style: none; padding-left: 0; margin-top: 15px;">
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">✨ <strong>Initial Virtual Balance:</strong> ₹10,000 in virtual currency to start playing immediately.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🎲 <strong>Unlimited Gameplay:</strong> Play as many games as you want without any cost.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🔄 <strong>Reset Anytime:</strong> If your balance reaches zero, you can reset it back to ₹10,000 instantly.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🏆 <strong>Fun & Entertainment:</strong> Enjoy exciting gameplay mechanics and game experiences.</li>
                    <li style="padding: 8px 0;">📊 <strong>Personal Statistics:</strong> Track your gameplay history and performance.</li>
                </ul>
            </div>
            
            <div style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 15px; margin-bottom: 30px;">
                <h3 style="color: var(--gold-color); margin-bottom: 15px;">❌ What We Do NOT Offer</h3>
                <p style="line-height: 1.8; margin-bottom: 10px;">To maintain complete transparency, here's what we explicitly do NOT provide:</p>
                <ul style="list-style: none; padding-left: 0; margin-top: 15px;">
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>No Real Money Prizes:</strong> We do not award cash prizes, monetary rewards, or any form of real money.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>No Physical Prizes:</strong> We do not provide physical goods, gift cards, or tangible rewards.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>No Payment Processing:</strong> We do not accept credit cards, debit cards, UPI, or any payment methods.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>No Withdrawals:</strong> There is no mechanism to withdraw or cash out virtual currency.</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🚫 <strong>No Gambling Services:</strong> We are not a gambling platform and do not offer gambling services.</li>
                    <li style="padding: 8px 0;">🚫 <strong>No Phone Support:</strong> We do not provide phone-based customer support (email only).</li>
                </ul>
            </div>
            
            <div style="background: rgba(255, 107, 53, 0.1); padding: 30px; border-radius: 15px; border: 2px solid var(--primary-color);">
                <h3 style="color: var(--primary-color); margin-bottom: 15px;">⚠️ Important Legal Disclaimer</h3>
                <p style="line-height: 1.8; font-size: 0.95rem;">
                    <strong>Age Restriction:</strong> You must be 18 years or older to use this platform.<br><br>
                    <strong>No Gambling:</strong> This is not a gambling website. No real money is involved in any capacity.<br><br>
                    <strong>Entertainment Only:</strong> All games are provided for entertainment purposes only.<br><br>
                    <strong>Virtual Currency:</strong> All currency displayed is virtual and has zero real-world value.<br><br>
                    <strong>Responsible Gaming:</strong> While no real money is involved, we encourage responsible gaming habits. If you feel you're spending too much time gaming, please take a break.
                </p>
            </div>
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
