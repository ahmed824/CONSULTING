<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Contact Us']
];
include 'includes/breadcrumb.php';
?>

<section class="contact-location-section" role="main">
  <div class="contact-container">
    <div class="contact-location-left">
      <span class="contact-label">Contact Us</span>
      <h1 class="contact-title">Strategically Located<br>to Serve You <span
          class="contact-highlight-green">Better</span></h1>
      <p class="contact-desc">
        We Proudly Serve Clients Across Multiple Regions<br>
        In Saudi Arabia, Ensuring Wide Coverage And Easy<br>
        Access To Our Services Wherever You Are.
      </p>
      
      <form id="contact-form" action="process_contact.php" method="POST" novalidate>
        <div id="form-messages" class="form-messages" role="alert" aria-live="polite"></div>
        
        <div class="contact-form-group">
          <label class="contact-form-label" for="contact-name">Full Name *</label>
          <input type="text" class="contact-form-control" id="contact-name" name="name"
            placeholder="Enter your full name" required aria-describedby="name-error">
          <div id="name-error" class="error-message" role="alert"></div>
        </div>
        
        <div class="contact-form-group">
          <label class="contact-form-label" for="contact-email">Email Address *</label>
          <input type="email" class="contact-form-control" id="contact-email" name="email"
            placeholder="Enter your email" required aria-describedby="email-error">
          <div id="email-error" class="error-message" role="alert"></div>
        </div>
        
        <div class="contact-form-group">
          <label class="contact-form-label" for="contact-phone">Phone Number</label>
          <input type="tel" class="contact-form-control" id="contact-phone" name="phone"
            placeholder="Enter your phone number" aria-describedby="phone-error">
          <div id="phone-error" class="error-message" role="alert"></div>
        </div>
        
        <div class="contact-form-group">
          <label class="contact-form-label" for="contact-subject">Subject *</label>
          <input type="text" class="contact-form-control" id="contact-subject" name="subject"
            placeholder="Enter subject" required aria-describedby="subject-error">
          <div id="subject-error" class="error-message" role="alert"></div>
        </div>
        
        <div class="contact-form-group">
          <label class="contact-form-label" for="contact-message">Message *</label>
          <textarea class="contact-form-control" id="contact-message" name="message" rows="5" 
            placeholder="Your message" required aria-describedby="message-error"></textarea>
          <div id="message-error" class="error-message" role="alert"></div>
        </div>
        
        <button type="submit" class="contact-btn contact-btn-gold" id="submit-btn">
          <span class="btn-text">Submit Request</span>
          <span class="btn-spinner" style="display: none;">
            <i class="fas fa-spinner fa-spin"></i> Sending...
          </span>
        </button>
      </form>
    </div>
    
    <div class="contact-location-right">
      <div class="contact-map-wrapper">
        <img src="assets/images/map_img.png" alt="Saudi Arabia Map showing our service locations" class="contact-map">
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>