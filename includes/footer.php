    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3><?php echo COMPANY_NAME; ?></h3>
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
            <p>&copy; <?php echo date('Y'); ?> <?php echo COMPANY_FULL_NAME; ?>. All rights reserved.</p>
            <p><?php echo ADDRESS; ?></p>
        </div>
    </footer>
    
    <!-- Global Scripts -->
    <script src="<?php echo SITE_URL; ?>assets/js/main.js"></script>
    
</body>
</html>
