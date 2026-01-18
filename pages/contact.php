<?php
require_once '../includes/config.php';
$page_title = "Contact Us";
include '../includes/header.php';
?>

<style>
    .contact-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .contact-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .contact-header h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    
    .contact-header p {
        font-size: 1.1rem;
        color: var(--gray-text);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 60px;
    }
    
    .contact-form {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 16px;
        padding: 40px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        color: var(--accent-gold);
        font-weight: 600;
        margin-bottom: 8px;
    }
    
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--light-text);
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
    }
    
    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--gray-text);
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        background: rgba(255, 107, 53, 0.1);
    }
    
    .submit-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255, 107, 53, 0.4);
    }
    
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    
    .info-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-color);
        border-radius: 16px;
        padding: 30px;
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 107, 53, 0.2);
    }
    
    .info-card-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .info-card h3 {
        color: var(--accent-gold);
        margin-bottom: 10px;
    }
    
    .info-card p {
        color: var(--gray-text);
        margin: 0;
    }
    
    .info-card a {
        color: var(--primary-color);
        text-decoration: none;
        transition: var(--transition-fast);
    }
    
    .info-card a:hover {
        color: var(--accent-gold);
    }
    
    .faq-section {
        margin-top: 80px;
    }
    
    .faq-section h2 {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .faq-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    
    .faq-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 20px;
    }
    
    .faq-item h4 {
        color: var(--accent-gold);
        margin-bottom: 10px;
        cursor: pointer;
        transition: var(--transition-fast);
    }
    
    .faq-item h4:hover {
        color: var(--primary-color);
    }
    
    .faq-item p {
        color: var(--gray-text);
        font-size: 0.95rem;
        display: none;
    }
    
    .faq-item.active p {
        display: block;
    }
    
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .contact-header h1 {
            font-size: 1.8rem;
        }
        
        .faq-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="contact-container">
    <!-- Header -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>Have questions? We're here to help! Reach out to us anytime.</p>
    </div>
    
    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2 style="margin-bottom: 30px;">Send us a Message</h2>
            <form id="contact-form">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="How can we help?" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Your message here..." required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
        
        <!-- Contact Information -->
        <div class="contact-info">
            <div class="info-card">
                <div class="info-card-icon">📧</div>
                <h3>Email</h3>
                <p><a href="mailto:<?php echo EMAIL; ?>"><?php echo EMAIL; ?></a></p>
                <p style="font-size: 0.85rem; margin-top: 8px;">We'll respond within 24 hours</p>
            </div>
            
            <div class="info-card">
                <div class="info-card-icon">📍</div>
                <h3>Address</h3>
                <p><?php echo ADDRESS; ?></p>
            </div>
            
            <div class="info-card">
                <div class="info-card-icon">🏢</div>
                <h3>Company Details</h3>
                <p><strong>CIN:</strong> <?php echo CIN; ?></p>
                <p><strong>GST:</strong> <?php echo GST_NO; ?></p>
                <p><strong>PAN:</strong> <?php echo PAN_NO; ?></p>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h4>How do I start playing?</h4>
                <p>Simply visit our Games page, choose your favorite game, set your bet amount, and start playing! You'll receive an initial balance of ₹1000 to get started.</p>
            </div>
            
            <div class="faq-item">
                <h4>Is my money safe?</h4>
                <p>Yes! We use industry-leading encryption and security measures to protect your data and transactions. All games use fair algorithms.</p>
            </div>
            
            <div class="faq-item">
                <h4>Can I reset my balance?</h4>
                <p>Yes! You can reset your balance anytime using the reset button in the navigation bar. Your balance will be reset to ₹1000.</p>
            </div>
            
            <div class="faq-item">
                <h4>What are the betting limits?</h4>
                <p>You can bet between ₹200 and ₹5,500 per game. Adjust your bet amount based on your preference and bankroll.</p>
            </div>
            
            <div class="faq-item">
                <h4>How does the virtual currency work?</h4>
                <p>Your virtual balance is used for gameplay only. It has no real-world monetary value and cannot be exchanged for real money. Balance updates are instant based on game outcomes.</p>
            </div>
            
            <div class="faq-item">
                <h4>Is responsible gaming supported?</h4>
                <p>Absolutely! We encourage responsible gaming. You can reset your balance anytime and set your own betting limits.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Contact form submission
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // Show success message
        showNotification('Thank you! Your message has been sent. We\'ll get back to you soon.', 'success');
        
        // Reset form
        this.reset();
    });
    
    // FAQ toggle
    document.querySelectorAll('.faq-item h4').forEach(item => {
        item.addEventListener('click', function() {
            const parent = this.parentElement;
            parent.classList.toggle('active');
        });
    });
</script>

<?php include '../includes/footer.php'; ?>
