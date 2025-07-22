<?php include 'includes/header.php'; ?>
<?php
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Contact Us']
];
include 'includes/breadcrumb.php';
?>

<section class="contact-location-section">
  <div class="contact-container">
    <div class="contact-location-left">
      <span class="contact-label">Contact Us</span>
      <h2 class="contact-title">Strategically Located<br>to Serve You <span
          class="contact-highlight-green">Better</span></h2>
      <p class="contact-desc">
        We Proudly Serve Clients Across Multiple Regions<br>
        In Saudi Arabia, Ensuring Wide Coverage And Easy<br>
        Access To Our Services Wherever You Are.
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
          <textarea class="contact-form-control" id="contact-message" name="message" rows="5" placeholder="Your message"
            required></textarea>
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
</section>

<style>
  :root {
    --dark-blue: #1a2a3a;
    --nav-bg: #ffffff08;
    --gold: #b68f0e;
    --green: #2a8c82;
    --white: #fff;
    --nav-link: #bac0c7;
    --nav-link-active: #e0b83b;
  }

  .contact-location-section {
    padding: 60px 0;
    color: var(--white);
  }

  .contact-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }

  .contact-location-left {
    flex: 1;
    min-width: 300px;
  }

  .contact-location-right {
    flex: 1;
    min-width: 300px;
    display: flex;
    align-items: center;
  }

  .contact-label {
    font-size: 1.1rem;
    text-transform: uppercase;
    color: var(--gold);
    letter-spacing: 1px;
  }

  .contact-title {
    font-size: 38px;
    font-weight: 600;
    margin: 20px 0;
    line-height: 1.3;
    color: var(--dark-blue)
  }

  .contact-highlight-green {
    color: var(--green);
  }

  .contact-desc {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
    color: var(--dark-blue)

  }

  .contact-form-group {
    margin-bottom: 35px;
    position: relative;
  }

  .contact-form-label {
    display: block;
    font-size: 1rem;
    color: var(--nav-link);
    margin-bottom: 8px;
    transition: all 0.3s ease;
    background: #fff;
    position: absolute;
    top: -14px;
    left: 12px;
    padding: 0 8px;
  }

  .contact-form-label.active {
    color: var(--gold);
    transform: translateY(-15px);
    left: 2px;
    font-size: 0.9em;
  }

  .contact-form-control {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    border: 1px solid var(--nav-link);
    border-radius: 4px;
    background-color: var(--nav-bg);
    color: var(--white);
    transition: border-color 0.3s ease;
  }

  .contact-form-control:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 5px rgba(182, 143, 14, 0.3);
  }

  .contact-form-control::placeholder {
    color: var(--nav-link);
    opacity: 0.7;
  }

  textarea.contact-form-control {
    resize: vertical;
    min-height: 100px;
  }

  .contact-btn {
    padding: 12px 24px;
    font-size: 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .contact-btn-gold {
    background-color: var(--gold);
    color: var(--white);
    border: none;
  }

  .contact-btn-gold:hover {
    background-color: var(--nav-link-active);
  }

  .contact-btn-outline {
    background: transparent;
    border: 1px solid var(--gold);
    color: var(--gold);
  }

  .contact-btn-outline:hover {
    background-color: var(--gold);
    color: var(--dark-blue);
  }

  .contact-map-wrapper {
    width: 100%;
  }

  .contact-map {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }

  @media (max-width: 768px) {
    .contact-container {
      flex-direction: column;
    }

    .contact-title {
      font-size: 2rem;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    if (form) {
      const inputs = form.querySelectorAll('.contact-form-control');
      inputs.forEach(input => {
        const label = form.querySelector('label[for="' + input.id + '"]');
        if (!label) return;
        input.addEventListener('focus', () => {
          label.classList.add('active');
        });
        input.addEventListener('blur', () => {
          label.classList.remove('active');
        });
      });

      // Basic form validation
      form.addEventListener('submit', (e) => {
        const email = document.getElementById('contact-email').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          e.preventDefault();
          alert('Please enter a valid email address');
        }
      });
    }
  });
</script>

<?php include 'includes/footer.php'; ?>