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
        <i class="fas fa-phone contact-social-icon"></i>
        <h3 class="contact-social-title">Mobile</h3>
        <p class="contact-social-info">+966 987 654 321</p>
        <a href="tel:+966987654321" class="contact-social-link">Call Now</a>
      </div>
      <div class="contact-social-card">
        <i class="fas fa-envelope contact-social-icon"></i>
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

<style>
  .contact-location-section {
    padding: 0 0 40px 0;
    color: var(--dark-blue);
  }

  .lets-talk-title {
    font-size: clamp(1.8rem, 5vw, 2.5rem);
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 30px;
    line-height: 1.3;
    text-transform: capitalize;
    text-align: center;
  }

  .contact-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin: 0 auto;
    padding: 0 15px;
  }

  .contact-location-left,
  .contact-location-right {
    flex: 1;
    min-width: 280px;
  }

  .contact-location-right {
    display: flex;
    align-items: center;
  }

  /* Social Cards Styles */
  .contact-social-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 0 auto 60px;
    padding: 0 15px;
    justify-content: space-between;
  }

  .contact-social-card {
  background: var(--white);
  border-radius: 12px;
  padding: 24px;
  text-align: center;
  flex: 1;
  width: 100%;
  border: 1px solid rgba(78, 124, 169, 0.4); /* بديل خفيف للظل */
  transition: all 0.3s ease;
}

  .contact-social-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 4px 15px rgb(81 126 172 / 20%);
  }

  .contact-social-icon {
    font-size: 36px;
    color: var(--gold);
    margin-bottom: 15px;
    animation: pulse 2s infinite ease-in-out;
  }

  @keyframes pulse {

    0%,
    100% {
      transform: scale(1);
      opacity: 1;
    }

    50% {
      transform: scale(1.07);
      opacity: 0.8;
    }
  }

  .contact-social-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin: 0 0 10px;
  }

  .contact-social-info {
    font-size: 1rem;
    color: var(--nav-link);
    margin-bottom: 15px;
  }

  .contact-social-link {
    display: inline-block;
    padding: 10px 20px;
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--white);
    background: var(--gold);
    border-radius: 50px;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.2s ease;
  }

  .contact-social-link:hover {
    background: var(--nav-link-active);
    transform: scale(1.05);
  }

  .contact-label {
    font-size: 1rem;
    text-transform: uppercase;
    color: var(--gold);
    letter-spacing: 1.5px;
    display: block;
    margin-bottom: 10px;
  }

  .contact-title {
    font-size: 2.25rem;
    font-weight: 700;
    margin: 15px 0 20px;
    line-height: 1.4;
  }

  .contact-highlight-green {
    color: var(--green);
  }

  .contact-desc {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 30px;
    opacity: 0.9;
  }

  .contact-form-group {
    margin-bottom: 40px;
    position: relative;
  }

  .contact-form-label {
    position: absolute;
    top: -10px;
    left: 15px;
    font-size: 0.9rem;
    color: var(--nav-link);
    background: var(--white);
    padding: 0 6px;
    transition: all 0.3s ease;
  }

  .contact-form-label.active {
    color: var(--gold);
    font-size: 0.85rem;
    transform: translateY(-15px);
  }

  .contact-form-control {
    width: 100%;
    padding: 12px 20px;
    font-size: 1rem;
    border: 1px solid var(--nav-link);
    border-radius: 50px;
    background: var(--white);
    color: var(--dark-blue);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  .contact-form-control:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 8px rgba(182, 143, 14, 0.2);
  }

  .contact-form-control::placeholder {
    color: var(--nav-link);
    opacity: 0.6;
  }

  textarea.contact-form-control {
    resize: vertical;
    min-height: 120px;
    border-radius: 8px;
  }

  .contact-btn {
    padding: 12px 30px;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .contact-btn-gold {
    background: var(--gold);
    color: var(--white);
    border: none;
    width: 100%;
  }

  .contact-btn-gold:hover {
    background: var(--nav-link-active);
    transform: scale(1.05);
  }

  .contact-btn-outline {
    background: transparent;
    border: 1px solid var(--gold);
    color: var(--gold);
  }

  .contact-btn-outline:hover {
    background: var(--gold);
    color: var(--dark-blue);
  }



  .contact-map {
    width: 100%;
    height: auto;
    display: block;
  }

  @media (max-width: 766px) {
    .contact-social-cards {
      flex-direction: column;
      align-items: center;
    }

    .contact-social-card {
      width: 100%;
    }

    .contact-container {
      flex-direction: column-reverse;
      gap: 20px;
    }

    .contact-title {
      font-size: 1.8rem;
    }

    .contact-desc {
      font-size: 1rem;
    }
  }

  @media (max-width: 480px) {
    .contact-social-card {
      padding: 20px;
    }

    .contact-social-icon {
      font-size: 2rem;
    }

    .contact-social-title {
      font-size: 1.2rem;
    }
  }
</style>

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