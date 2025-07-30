<?php
$page_title = 'Contact Us - Professional Consulting Services';
$page_description = 'Get in touch with our expert consulting team. We serve clients across multiple regions in Saudi Arabia with comprehensive advisory services in legal, financial, and business domains.';
include 'includes/header.php';
?>
<?php
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Contact Us']
];
include 'includes/breadcrumb.php';
?>

<section class="contact-location-section">
  <div class="container">
    <h2 class="lets-talk-title">keep in touch with us</h2>
    <div class="contact-social-cards">
      <div class="contact-social-card">
        <i class="fab fa-whatsapp contact-social-icon"></i>
        <h3 class="contact-social-title">WhatsApp</h3>
        <p class="contact-social-info">+966 123 456 789</p>
        <a href="https://wa.me/966123456789" class="contact-social-link" target="_blank">Chat Now</a>
      </div>
      <div class="contact-social-card">

        <svg class="w-[48px] contact-social-icon h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
            d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
        </svg>


        <h3 class="contact-social-title">Mobile</h3>
        <p class="contact-social-info">+966 987 654 321</p>
        <a href="tel:+966987654321" class="contact-social-link">Call Now</a>
      </div>
      <div class="contact-social-card">
        <i class="fa-regular fa-envelope contact-social-icon"></i>
        <h3 class="contact-social-title">Email</h3>
        <p class="contact-social-info">info@example.com</p>
        <a href="mailto:info@example.com" class="contact-social-link">Email Us</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="contact-container">
      <div class="contact-location-left">
        <span class="contact-label">Contact Us</span>
        <h2 class="contact-title">Strategically Located<br>to Serve You <span
            class="contact-highlight-green">Better</span></h2>
        <p class="contact-desc">
          We proudly serve clients across multiple regions in Saudi Arabia, ensuring wide coverage and easy access to
          our
          services wherever you are.
        </p>
        <form id="contact-form" action="process_contact.php" method="POST">
          <div class="contact-form-group">
            <label class="contact-form-label" for="contact-name">Full Name</label>
            <input type="text" class="contact-form-control" id="contact-name" name="name"
              placeholder="Enter your full name" required>
          </div>
          <div class="contact-form-group">
            <label class="contact-form-label" for="contact-email">Email Address</label>
            <input type="email" class="contact-form-control" id="contact-email" name="email"
              placeholder="Enter your email" required>
          </div>
          <div class="contact-form-group">
            <label class="contact-form-label" for="contact-phone">Phone Number</label>
            <input type="tel" class="contact-form-control" id="contact-phone" name="phone"
              placeholder="Enter your phone number">
          </div>
          <div class="contact-form-group">
            <label class="contact-form-label" for="contact-subject">Subject</label>
            <input type="text" class="contact-form-control" id="contact-subject" name="subject"
              placeholder="Enter subject" required>
          </div>
          <div class="contact-form-group">
            <label class="contact-form-label" for="contact-message">Message</label>
            <textarea class="contact-form-control" id="contact-message" name="message" rows="5"
              placeholder="Your message" required></textarea>
          </div>
          <button type="submit" class="contact-btn contact-btn-gold">Submit Request</button>
        </form>
      </div>
      <div class="contact-location-right">
        <div class="contact-map-wrapper">
          <img src="assets/images/map_img.png" alt="Saudi Arabia Map" class="contact-map">
        </div>
      </div>
    </div>
  </div>
</section>
 

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    if (form) {
      const inputs = form.querySelectorAll('.contact-form-control');
      inputs.forEach(input => {
        const label = form.querySelector(`label[for="${input.id}"]`);
        if (!label) return;

        // Initialize label state
        label.classList.toggle('active', input.value !== '');

        input.addEventListener('focus', () => {
          label.classList.add('active');
        });

        input.addEventListener('blur', () => {
          label.classList.toggle('active', input.value !== '');
        });

        input.addEventListener('input', () => {
          label.classList.toggle('active', input.value !== '');
        });
      });

      // Form validation
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        let isValid = true;
        const email = document.getElementById('contact-email').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const name = document.getElementById('contact-name').value;
        const subject = document.getElementById('contact-subject').value;
        const message = document.getElementById('contact-message').value;
        const phone = document.getElementById('contact-phone').value;
        const phoneRegex = /^\+?[\d\s-]{7,}$/;

        if (!name.trim()) {
          isValid = false;
          alert('Full Name is required.');
        }
        if (!emailRegex.test(email)) {
          isValid = false;
          alert('Please enter a valid email address.');
        }
        if (phone && !phoneRegex.test(phone)) {
          isValid = false;
          alert('Please enter a valid phone number.');
        }
        if (!subject.trim()) {
          isValid = false;
          alert('Subject is required.');
        }
        if (!message.trim()) {
          isValid = false;
          alert('Message is required.');
        }

        if (isValid) {
          form.submit();
        }
      });
    }
  });
</script>

<?php include 'includes/footer.php'; ?>