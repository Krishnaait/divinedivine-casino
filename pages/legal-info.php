<?php
require_once '../includes/config.php';
$page_title = "Legal Information";
include '../includes/header.php';
?>

<div class="legal-page legalinfo-page">
    <div class="legal-header">
        <div class="container">
            <h1><i class="fas fa-gavel"></i> Legal Information</h1>
            <p class="last-updated">Company Legal Details and Compliance</p>
        </div>
    </div>
    
    <div class="legal-content">
        <div class="container">
            <div class="legal-section">
                <h2>1. Company Information</h2>
                <div class="company-details-grid">
                    <div class="detail-card">
                        <h3><i class="fas fa-building"></i> Company Name</h3>
                        <p><strong><?php echo COMPANY_FULL_NAME; ?></strong></p>
                    </div>
                    
                    <div class="detail-card">
                        <h3><i class="fas fa-certificate"></i> Corporate Identity Number (CIN)</h3>
                        <p><strong><?php echo CIN; ?></strong></p>
                    </div>
                    
                    <div class="detail-card">
                        <h3><i class="fas fa-file-invoice"></i> GST Number</h3>
                        <p><strong><?php echo GST_NO; ?></strong></p>
                    </div>
                    
                    <div class="detail-card">
                        <h3><i class="fas fa-id-card"></i> PAN Number</h3>
                        <p><strong><?php echo PAN_NO; ?></strong></p>
                    </div>
                    
                    <div class="detail-card">
                        <h3><i class="fas fa-map-marker-alt"></i> Registered Address</h3>
                        <p><?php echo ADDRESS; ?></p>
                    </div>
                    
                    <div class="detail-card">
                        <h3><i class="fas fa-calendar-alt"></i> Date of Incorporation</h3>
                        <p><strong>2024</strong></p>
                    </div>
                </div>
            </div>

            <div class="legal-section">
                <h2>2. Business Classification</h2>
                <p>DineDivine Ventures Private Limited is classified as a <strong>Private Limited Company</strong> registered under the Companies Act, 2013 in India.</p>
                
                <h3>2.1 Business Activities</h3>
                <ul>
                    <li><strong>Primary Activity:</strong> Operation of online gaming and entertainment platform</li>
                    <li><strong>Business Model:</strong> Free-to-play gaming services</li>
                    <li><strong>Service Type:</strong> Digital entertainment and skill-based games</li>
                    <li><strong>Target Market:</strong> Adults aged 18 and above in India</li>
                </ul>

                <h3>2.2 Industry Classification</h3>
                <ul>
                    <li><strong>NIC Code:</strong> 56102 (Event Catering Activities and Other Food Service Activities)</li>
                    <li><strong>Sector:</strong> Information Technology and Entertainment</li>
                    <li><strong>Sub-Sector:</strong> Online Gaming and Digital Entertainment</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>3. Regulatory Compliance</h2>
                <h3>3.1 Indian Laws and Regulations</h3>
                <p>DineDivine Ventures operates in full compliance with applicable Indian laws:</p>
                
                <div class="compliance-box">
                    <h4><i class="fas fa-check-circle"></i> Information Technology Act, 2000</h4>
                    <p>We comply with all provisions of the IT Act, including data protection, electronic transactions, and cybersecurity requirements.</p>
                </div>

                <div class="compliance-box">
                    <h4><i class="fas fa-check-circle"></i> Consumer Protection Act, 2019</h4>
                    <p>We adhere to consumer rights, fair trade practices, and transparent business operations as mandated by the Consumer Protection Act.</p>
                </div>

                <div class="compliance-box">
                    <h4><i class="fas fa-check-circle"></i> Companies Act, 2013</h4>
                    <p>As a registered private limited company, we comply with all corporate governance, reporting, and compliance requirements.</p>
                </div>

                <div class="compliance-box">
                    <h4><i class="fas fa-check-circle"></i> Goods and Services Tax (GST) Act, 2017</h4>
                    <p>We are registered under GST and comply with all tax filing, collection, and remittance requirements.</p>
                </div>

                <div class="compliance-box">
                    <h4><i class="fas fa-check-circle"></i> Income Tax Act, 1961</h4>
                    <p>We maintain proper accounting records and comply with all income tax filing and payment obligations.</p>
                </div>

                <h3>3.2 State Gaming Regulations</h3>
                <p>We monitor and comply with gaming regulations in all Indian states where our services are available. Our free-to-play model is designed to comply with regulations across all jurisdictions.</p>
            </div>

            <div class="legal-section">
                <h2>4. Licenses and Certifications</h2>
                <h3>4.1 Business Licenses</h3>
                <ul>
                    <li><strong>GST Registration:</strong> Active and compliant</li>
                    <li><strong>PAN Registration:</strong> Registered with Income Tax Department</li>
                    <li><strong>Company Registration:</strong> Registered with Ministry of Corporate Affairs</li>
                </ul>

                <h3>4.2 Technical Certifications</h3>
                <ul>
                    <li><strong>RNG Certification:</strong> Random Number Generators certified by independent auditors</li>
                    <li><strong>SSL Certificate:</strong> Secure Socket Layer encryption for data protection</li>
                    <li><strong>Security Audits:</strong> Regular third-party security assessments</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>5. Corporate Governance</h2>
                <h3>5.1 Board of Directors</h3>
                <p>DineDivine Ventures is governed by a Board of Directors responsible for strategic direction, oversight, and compliance.</p>

                <h3>5.2 Management Structure</h3>
                <ul>
                    <li><strong>Executive Management:</strong> Responsible for day-to-day operations</li>
                    <li><strong>Compliance Officer:</strong> Ensures regulatory compliance</li>
                    <li><strong>Data Protection Officer:</strong> Oversees data privacy and security</li>
                    <li><strong>Customer Support Team:</strong> Handles user inquiries and issues</li>
                </ul>

                <h3>5.3 Corporate Policies</h3>
                <ul>
                    <li>Code of Conduct for employees and management</li>
                    <li>Anti-corruption and anti-bribery policies</li>
                    <li>Whistleblower protection policy</li>
                    <li>Data protection and privacy policy</li>
                    <li>Fair play and responsible gaming policies</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>6. Financial Information</h2>
                <h3>6.1 Financial Reporting</h3>
                <p>As a private limited company, we maintain audited financial statements and comply with all reporting requirements under the Companies Act, 2013.</p>

                <h3>6.2 Tax Compliance</h3>
                <ul>
                    <li><strong>GST Filing:</strong> Regular monthly/quarterly GST returns</li>
                    <li><strong>Income Tax Filing:</strong> Annual income tax returns</li>
                    <li><strong>TDS Compliance:</strong> Tax deduction at source as applicable</li>
                    <li><strong>Audit Requirements:</strong> Annual statutory audit by chartered accountants</li>
                </ul>

                <h3>6.3 Payment Processing</h3>
                <p>While we operate on a free-to-play model without real money transactions, any future payment processing will comply with:</p>
                <ul>
                    <li>Payment and Settlement Systems Act, 2007</li>
                    <li>RBI guidelines for digital payments</li>
                    <li>PCI DSS standards for payment security</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>7. Data Protection and Privacy</h2>
                <h3>7.1 Data Protection Compliance</h3>
                <p>We are committed to protecting user data in accordance with:</p>
                <ul>
                    <li>Information Technology Act, 2000</li>
                    <li>Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011</li>
                    <li>Personal Data Protection Bill (when enacted)</li>
                    <li>International best practices (GDPR principles)</li>
                </ul>

                <h3>7.2 Data Security Measures</h3>
                <ul>
                    <li>Encryption of data in transit and at rest</li>
                    <li>Regular security audits and penetration testing</li>
                    <li>Access controls and authentication mechanisms</li>
                    <li>Incident response and breach notification procedures</li>
                    <li>Employee training on data protection</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>8. Intellectual Property</h2>
                <h3>8.1 Trademarks</h3>
                <p>DineDivine Ventures, our logo, and associated marks are trademarks of DineDivine Ventures Private Limited. Unauthorized use is prohibited.</p>

                <h3>8.2 Copyrights</h3>
                <p>All content on our platform, including games, graphics, text, and software, is protected by copyright laws. All rights reserved.</p>

                <h3>8.3 Patents and Trade Secrets</h3>
                <p>Our proprietary game mechanics, algorithms, and business processes are protected as trade secrets.</p>
            </div>

            <div class="legal-section">
                <h2>9. Dispute Resolution</h2>
                <h3>9.1 Governing Law</h3>
                <p>All legal matters are governed by the laws of India, specifically the laws applicable in Haryana.</p>

                <h3>9.2 Jurisdiction</h3>
                <p>The courts of Gurgaon, Haryana have exclusive jurisdiction over all disputes arising from our services.</p>

                <h3>9.3 Arbitration</h3>
                <p>Disputes may be resolved through arbitration in accordance with the Arbitration and Conciliation Act, 1996.</p>
                <ul>
                    <li><strong>Arbitration Seat:</strong> Gurgaon, Haryana</li>
                    <li><strong>Language:</strong> English</li>
                    <li><strong>Number of Arbitrators:</strong> One or three as mutually agreed</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>10. Compliance Certifications</h2>
                <div class="certification-grid">
                    <div class="cert-card">
                        <i class="fas fa-shield-alt"></i>
                        <h4>ISO 27001</h4>
                        <p>Information Security Management (Target)</p>
                    </div>
                    
                    <div class="cert-card">
                        <i class="fas fa-lock"></i>
                        <h4>SSL/TLS</h4>
                        <p>Secure Data Encryption</p>
                    </div>
                    
                    <div class="cert-card">
                        <i class="fas fa-random"></i>
                        <h4>RNG Certified</h4>
                        <p>Fair Game Outcomes</p>
                    </div>
                    
                    <div class="cert-card">
                        <i class="fas fa-user-shield"></i>
                        <h4>Privacy Compliant</h4>
                        <p>Data Protection Standards</p>
                    </div>
                </div>
            </div>

            <div class="legal-section">
                <h2>11. Annual Compliance Calendar</h2>
                <div class="compliance-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Compliance Requirement</th>
                                <th>Frequency</th>
                                <th>Authority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GST Returns</td>
                                <td>Monthly/Quarterly</td>
                                <td>GST Department</td>
                            </tr>
                            <tr>
                                <td>Income Tax Returns</td>
                                <td>Annual</td>
                                <td>Income Tax Department</td>
                            </tr>
                            <tr>
                                <td>Annual Financial Statements</td>
                                <td>Annual</td>
                                <td>Ministry of Corporate Affairs</td>
                            </tr>
                            <tr>
                                <td>Board Meetings</td>
                                <td>Quarterly</td>
                                <td>Internal Governance</td>
                            </tr>
                            <tr>
                                <td>Statutory Audit</td>
                                <td>Annual</td>
                                <td>Chartered Accountants</td>
                            </tr>
                            <tr>
                                <td>RNG Certification</td>
                                <td>Quarterly</td>
                                <td>Independent Auditors</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="legal-section">
                <h2>12. Contact for Legal Matters</h2>
                <p>For legal inquiries, compliance questions, or official correspondence:</p>
                <div class="contact-box">
                    <p><strong><?php echo COMPANY_FULL_NAME; ?></strong></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo ADDRESS; ?></p>
                    <p><i class="fas fa-envelope"></i> Legal: legal@dinedivine.com</p>
                    <p><i class="fas fa-envelope"></i> Compliance: compliance@dinedivine.com</p>
                    <p><i class="fas fa-phone"></i> Phone: +91-124-XXXXXXX</p>
                    <p><strong>CIN:</strong> <?php echo CIN; ?></p>
                    <p><strong>GST:</strong> <?php echo GST_NO; ?></p>
                    <p><strong>PAN:</strong> <?php echo PAN_NO; ?></p>
                </div>
            </div>

            <div class="legal-section">
                <h2>13. Document Requests</h2>
                <p>Authorized parties may request copies of:</p>
                <ul>
                    <li>Certificate of Incorporation</li>
                    <li>GST Registration Certificate</li>
                    <li>PAN Card</li>
                    <li>Memorandum and Articles of Association</li>
                    <li>Annual Financial Statements (subject to confidentiality)</li>
                </ul>
                <p>Requests should be made in writing to <strong>legal@dinedivine.com</strong> with proper identification and justification.</p>
            </div>
        </div>
    </div>
</div>

<style>
.legalinfo-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 35% 45%, rgba(70, 130, 180, 0.12), transparent 50%),
        radial-gradient(circle at 65% 55%, rgba(100, 149, 237, 0.1), transparent 50%);
    pointer-events: none;
}

.legalinfo-page .legal-header {
    background: linear-gradient(135deg, rgba(70, 130, 180, 0.3), rgba(100, 149, 237, 0.2));
    border-bottom: 2px solid rgba(70, 130, 180, 0.3);
}

.legalinfo-page .legal-header h1 {
    color: #4682b4;
}

.legalinfo-page .legal-section {
    border: 1px solid rgba(70, 130, 180, 0.2);
}

.legalinfo-page .legal-section h2 {
    color: #4682b4;
    border-bottom: 2px solid rgba(70, 130, 180, 0.3);
}

.company-details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.detail-card {
    background: rgba(70, 130, 180, 0.1);
    border: 2px solid rgba(70, 130, 180, 0.3);
    border-radius: 12px;
    padding: 20px;
}

.detail-card h3 {
    color: #4682b4;
    font-size: 1rem;
    margin-bottom: 10px;
}

.detail-card h3 i {
    margin-right: 8px;
}

.detail-card p {
    color: #ffffff;
    font-size: 1.1rem;
    margin: 0;
}

.compliance-box {
    background: rgba(100, 149, 237, 0.1);
    border-left: 4px solid #6495ed;
    padding: 20px;
    margin: 15px 0;
    border-radius: 8px;
}

.compliance-box h4 {
    color: #6495ed;
    margin-bottom: 10px;
}

.compliance-box h4 i {
    margin-right: 10px;
}

.certification-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.cert-card {
    background: rgba(70, 130, 180, 0.1);
    border: 2px solid rgba(70, 130, 180, 0.3);
    border-radius: 12px;
    padding: 30px 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.cert-card:hover {
    transform: translateY(-5px);
    border-color: #4682b4;
}

.cert-card i {
    font-size: 3rem;
    color: #4682b4;
    margin-bottom: 15px;
}

.cert-card h4 {
    color: #4682b4;
    margin-bottom: 10px;
}

.cert-card p {
    color: #b0b0b0;
    font-size: 0.9rem;
}

.compliance-table {
    overflow-x: auto;
    margin-top: 20px;
}

.compliance-table table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(70, 130, 180, 0.05);
    border-radius: 12px;
    overflow: hidden;
}

.compliance-table thead {
    background: rgba(70, 130, 180, 0.2);
}

.compliance-table th {
    padding: 15px;
    text-align: left;
    color: #4682b4;
    font-weight: 700;
    border-bottom: 2px solid rgba(70, 130, 180, 0.3);
}

.compliance-table td {
    padding: 15px;
    color: #d0d0d0;
    border-bottom: 1px solid rgba(70, 130, 180, 0.1);
}

.compliance-table tbody tr:hover {
    background: rgba(70, 130, 180, 0.1);
}

.legalinfo-page .legal-section ul li::before {
    color: #4682b4;
}

.legalinfo-page .legal-section ul li strong {
    color: #4682b4;
}

.legalinfo-page .contact-box {
    background: rgba(70, 130, 180, 0.1);
    border: 2px solid rgba(70, 130, 180, 0.3);
}

.legalinfo-page .contact-box i {
    color: #4682b4;
}

@media (max-width: 768px) {
    .company-details-grid {
        grid-template-columns: 1fr;
    }
    
    .certification-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
