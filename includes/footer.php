    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">
                    <img src="<?php echo SITE_URL; ?>assets/images/logo.png" alt="<?php echo COMPANY_NAME; ?>" class="footer-logo-img">
                </div>
                <h3><?php echo COMPANY_FULL_NAME; ?></h3>
                <p>Experience the thrill of premium gaming with DineDivine Ventures.</p>
                <div class="social-links">
                    <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo SITE_URL; ?>index.php">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/games.php">Games</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/about.php">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/contact.php">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Legal</h4>
                <ul>
                    <li><a href="<?php echo SITE_URL; ?>pages/privacy.php">Privacy Policy</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/terms.php">Terms & Conditions</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/disclaimer.php">Disclaimer</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/fair-play.php">Fair Play Policy</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/responsible-gaming.php">Responsible Gaming</a></li>
                    <li><a href="<?php echo SITE_URL; ?>pages/legal-info.php">Legal Information</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Company Info</h4>
                <ul>
                    <li><strong>CIN:</strong> <?php echo CIN; ?></li>
                    <li><strong>GST:</strong> <?php echo GST_NO; ?></li>
                    <li><strong>PAN:</strong> <?php echo PAN_NO; ?></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="age-restriction-footer">
                <i class="fas fa-exclamation-circle"></i>
                <span>18+ ONLY</span>
            </div>
            <p>&copy; <?php echo date('Y'); ?> <?php echo COMPANY_FULL_NAME; ?>. All rights reserved.</p>
            <p><?php echo ADDRESS; ?></p>
            <div class="legal-disclaimer">
                <p><strong>Legal Disclaimer:</strong> This is a free-to-play gaming platform for entertainment purposes only. No real money gambling or wagering is involved. All virtual currency has no real-world monetary value and cannot be exchanged for real money. Users must be 18 years or older. Play responsibly.</p>
            </div>
            <div class="brand-disclaimer">
                <p><strong>Brand Independence:</strong> This business is not affiliated with any other brand, company, or organization. This platform is completely and independently operated by <?php echo COMPANY_FULL_NAME; ?>. All trademarks, logos, and brand names are the property of their respective owners and are used for identification purposes only.</p>
            </div>
        </div>
    </footer>
    
    <!-- Global Scripts -->
    <script>window.SITE_URL = '<?php echo SITE_URL; ?>';</script>
    <script src="<?php echo SITE_URL; ?>assets/js/main.js"></script>
    <script src="<?php echo SITE_URL; ?>assets/js/check-balance.js"></script>
    
</body>
</html>
