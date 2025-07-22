<?php include 'includes/header.php'; ?>

<!-- Breadcrumb Section -->
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Services']
];
include 'components/breadcrumb.php'; ?>

<!-- Services Hero Section -->
<section class="services-hero-section">
  <div class="container">
    <div class="hero-bg-layers-container">
      <div class="hero-bg-layer layer1"></div>
      <div class="hero-bg-layer layer2"></div>
      <div class="hero-bg-layer layer3"></div>
    </div>
    
    <div class="services-hero-content">
      <div class="services-hero-left">
        <div class="hero-welcome">Our Professional Services</div>
        <div class="hero-headline">
          <div class="hero-start-circles">
            <span></span><span></span>
          </div>
          Comprehensive Solutions<br>
          for <span class="highlight-green">Every Business Need</span> &
          Strategic Growth
          <div class="hero-end-circles">
            <span class="circle-white"></span><span class="circle-green"></span><span class="circle-gold"></span>
          </div>
        </div>
        <div class="hero-desc">
          From legal advisory to financial consulting and accounting services, we provide end-to-end solutions tailored to your business requirements with expertise you can trust.
        </div>
        <div class="hero-btns">
          <button class="btn btn-gold">Get Started Today</button>
          <div class="circle"><i class="fa-solid fa-arrow-right-long"></i></div>
          <a href="contact.php" class="btn btn-outline-hero">Learn More</a>
        </div>
      </div>
      <div class="services-hero-right">
        <div class="services-stats">
          <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">Services Offered</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">98%</div>
            <div class="stat-label">Client Satisfaction</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Support Available</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Detailed Services Section -->
<section class="detailed-services-section">
  <div class="container">
    <div class="services-header">
      <h2 class="services-subtitle">Our Core Services</h2>
      <h3 class="services-title">Complete Business Solutions Under One Roof</h3>
      <p class="services-desc">We offer a comprehensive range of professional services designed to support your business growth and ensure compliance across all operational aspects.</p>
    </div>
    
    <div class="services-grid">
      <!-- Legal Services -->
      <div class="service-card">
        <div class="service-icon">
          <i class="fa-solid fa-scale-balanced"></i>
        </div>
        <h4 class="service-title">Legal Advisory Services</h4>
        <p class="service-description">Comprehensive legal support including contract review, compliance consulting, business formation, and regulatory guidance.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Contract Drafting & Review</li>
          <li><i class="fa-solid fa-check"></i> Corporate Law Advisory</li>
          <li><i class="fa-solid fa-check"></i> Compliance Management</li>
          <li><i class="fa-solid fa-check"></i> Legal Risk Assessment</li>
        </ul>
        <div class="service-price">Starting from <span>150</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn">Consult Now</a>
      </div>

      <!-- Financial Consulting -->
      <div class="service-card featured">
        <div class="featured-badge">Most Popular</div>
        <div class="service-icon">
          <i class="fa-solid fa-chart-line"></i>
        </div>
        <h4 class="service-title">Financial Consulting</h4>
        <p class="service-description">Strategic financial planning, investment advisory, risk management, and comprehensive financial analysis for sustainable growth.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Financial Planning & Analysis</li>
          <li><i class="fa-solid fa-check"></i> Investment Strategy</li>
          <li><i class="fa-solid fa-check"></i> Risk Management</li>
          <li><i class="fa-solid fa-check"></i> Cash Flow Optimization</li>
        </ul>
        <div class="service-price">Starting from <span>200</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn featured-btn">Get Started</a>
      </div>

      <!-- Accounting Services -->
      <div class="service-card">
        <div class="service-icon">
          <i class="fa-solid fa-calculator"></i>
        </div>
        <h4 class="service-title">Professional Accounting</h4>
        <p class="service-description">Complete accounting solutions including bookkeeping, tax preparation, financial reporting, and payroll management.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Monthly Bookkeeping</li>
          <li><i class="fa-solid fa-check"></i> Tax Preparation & Filing</li>
          <li><i class="fa-solid fa-check"></i> Financial Statements</li>
          <li><i class="fa-solid fa-check"></i> Payroll Processing</li>
        </ul>
        <div class="service-price">Starting from <span>120</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn">Learn More</a>
      </div>

      <!-- Business Consulting -->
      <div class="service-card">
        <div class="service-icon">
          <i class="fa-solid fa-briefcase"></i>
        </div>
        <h4 class="service-title">Business Strategy</h4>
        <p class="service-description">Strategic business consulting including market analysis, operational improvement, and growth strategies for long-term success.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Business Plan Development</li>
          <li><i class="fa-solid fa-check"></i> Market Research & Analysis</li>
          <li><i class="fa-solid fa-check"></i> Operational Efficiency</li>
          <li><i class="fa-solid fa-check"></i> Growth Strategy</li>
        </ul>
        <div class="service-price">Starting from <span>180</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn">Explore</a>
      </div>

      <!-- Audit Services -->
      <div class="service-card">
        <div class="service-icon">
          <i class="fa-solid fa-search-dollar"></i>
        </div>
        <h4 class="service-title">Audit & Assurance</h4>
        <p class="service-description">Independent audit services, internal controls review, and assurance services to ensure accuracy and compliance.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Financial Audits</li>
          <li><i class="fa-solid fa-check"></i> Internal Controls Review</li>
          <li><i class="fa-solid fa-check"></i> Compliance Audits</li>
          <li><i class="fa-solid fa-check"></i> Risk Assessment</li>
        </ul>
        <div class="service-price">Starting from <span>250</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn">Request Audit</a>
      </div>

      <!-- Tax Services -->
      <div class="service-card">
        <div class="service-icon">
          <i class="fa-solid fa-file-invoice-dollar"></i>
        </div>
        <h4 class="service-title">Tax Services</h4>
        <p class="service-description">Complete tax solutions including preparation, planning, representation, and optimization strategies for individuals and businesses.</p>
        <ul class="service-features">
          <li><i class="fa-solid fa-check"></i> Tax Preparation & Filing</li>
          <li><i class="fa-solid fa-check"></i> Tax Planning & Strategy</li>
          <li><i class="fa-solid fa-check"></i> IRS Representation</li>
          <li><i class="fa-solid fa-check"></i> Tax Optimization</li>
        </ul>
        <div class="service-price">Starting from <span>100</span> <?php include 'includes/Reyal.php'; ?></div>
        <a href="contact.php" class="service-btn">Get Started</a>
      </div>
    </div>
  </div>
</section>

<!-- Service Packages Section -->
<section class="service-packages-section">
  <div class="container">
    <div class="packages-header">
      <h2 class="packages-subtitle">Service Packages</h2>
      <h3 class="packages-title">Choose the Perfect Package for Your Business</h3>
      <p class="packages-desc">Select from our carefully crafted service packages designed to meet different business needs and budgets.</p>
    </div>
    
    <div class="packages-grid">
      <!-- Starter Package -->
      <div class="package-card">
        <div class="package-header">
          <h4 class="package-title">Starter Package</h4>
          <div class="package-price">
            <span class="price-amount">199</span>
            <span class="price-currency"><?php include 'includes/Reyal.php'; ?></span>
            <span class="price-period">/month</span>
          </div>
        </div>
        <p class="package-description">Perfect for small businesses and startups</p>
        <ul class="package-features">
          <li><span class="check check-blue"><i class="fa-solid fa-circle-check"></i></span> Basic Bookkeeping</li>
          <li><span class="check check-blue"><i class="fa-solid fa-circle-check"></i></span> Monthly Financial Reports</li>
          <li><span class="check check-blue"><i class="fa-solid fa-circle-check"></i></span> Tax Preparation</li>
          <li><span class="check check-blue"><i class="fa-solid fa-circle-check"></i></span> Email Support</li>
          <li><span class="check check-blue"><i class="fa-solid fa-circle-check"></i></span> Quarterly Business Review</li>
        </ul>
        <a href="payment.php" class="package-btn btn-blue">Get Started</a>
      </div>

      <!-- Professional Package -->
      <div class="package-card featured-package">
        <div class="popular-badge">Most Popular</div>
        <div class="package-header">
          <h4 class="package-title">Professional Package</h4>
          <div class="package-price">
            <span class="price-amount">399</span>
            <span class="price-currency"><?php include 'includes/Reyal.php'; ?></span>
            <span class="price-period">/month</span>
          </div>
        </div>
        <p class="package-description">Comprehensive solution for growing businesses</p>
        <ul class="package-features">
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Complete Bookkeeping & Accounting</li>
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Financial Analysis & Planning</li>
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Tax Planning & Preparation</li>
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Legal Advisory Services</li>
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Priority Phone Support</li>
          <li><span class="check check-green"><i class="fa-solid fa-circle-check"></i></span> Monthly Strategy Sessions</li>
        </ul>
        <a href="payment.php" class="package-btn btn-green">Choose Plan</a>
      </div>

      <!-- Enterprise Package -->
      <div class="package-card">
        <div class="package-header">
          <h4 class="package-title">Enterprise Package</h4>
          <div class="package-price">
            <span class="price-amount">799</span>
            <span class="price-currency"><?php include 'includes/Reyal.php'; ?></span>
            <span class="price-period">/month</span>
          </div>
        </div>
        <p class="package-description">Full-service solution for established enterprises</p>
        <ul class="package-features">
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> Full Accounting & Finance Management</li>
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> Strategic Business Consulting</li>
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> Legal & Compliance Advisory</li>
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> Audit & Assurance Services</li>
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> 24/7 Dedicated Support</li>
          <li><span class="check check-gold"><i class="fa-solid fa-circle-check"></i></span> Weekly Strategy & Review</li>
        </ul>
        <a href="payment.php" class="package-btn btn-gold">Contact Sales</a>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Our Services -->
<section class="why-choose-section">
  <div class="container">
    <div class="why-choose-content">
      <div class="why-choose-left">
        <h2 class="why-choose-subtitle">Why Choose Our Services</h2>
        <h3 class="why-choose-title">Excellence in Every <span class="highlight-green">Service Delivery</span></h3>
        <p class="why-choose-desc">With years of experience and a commitment to excellence, we deliver results that exceed expectations and drive your business forward.</p>
        
        <div class="features-list">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-award"></i>
            </div>
            <div class="feature-content">
              <h5>Certified Professionals</h5>
              <p>Our team consists of certified CPAs, lawyers, and business consultants with proven expertise.</p>
            </div>
          </div>
          
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-clock"></i>
            </div>
            <div class="feature-content">
              <h5>Timely Delivery</h5>
              <p>We understand deadlines matter. All services are delivered on time, every time.</p>
            </div>
          </div>
          
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div class="feature-content">
              <h5>Confidential & Secure</h5>
              <p>Your business information is protected with bank-level security and strict confidentiality.</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="why-choose-right">
        <div class="achievement-stats">
          <div class="achievement-item">
            <div class="achievement-number">500+</div>
            <div class="achievement-label">Clients Served</div>
          </div>
          <div class="achievement-item">
            <div class="achievement-number">15+</div>
            <div class="achievement-label">Years Experience</div>
          </div>
          <div class="achievement-item">
            <div class="achievement-number">95%</div>
            <div class="achievement-label">Client Retention</div>
          </div>
          <div class="achievement-item">
            <div class="achievement-number">24/7</div>
            <div class="achievement-label">Support</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom Package Builder (Existing) -->
<?php include 'components/select-section.php'; ?>

<!-- Call to Action Section -->
<section class="services-cta-section">
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Transform Your Business?</h2>
      <p class="cta-description">Join hundreds of satisfied clients who trust us with their most important business needs. Get started with a free consultation today.</p>
      <div class="cta-buttons">
        <button class="btn btn-gold btn-lg">Schedule Free Consultation</button>
        <a href="contact.php" class="btn btn-outline-hero btn-lg">Contact Us</a>
      </div>
      <div class="cta-guarantees">
        <div class="guarantee-item">
          <i class="fa-solid fa-check-circle"></i>
          <span>Free Initial Consultation</span>
        </div>
        <div class="guarantee-item">
          <i class="fa-solid fa-check-circle"></i>
          <span>No Long-term Contracts</span>
        </div>
        <div class="guarantee-item">
          <i class="fa-solid fa-check-circle"></i>
          <span>100% Satisfaction Guarantee</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?> 