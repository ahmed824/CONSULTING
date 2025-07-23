// Counter animation for .stat-number elements
function animateCounter(element, target) {
  let start = 0;
  let duration = 2000; // 2 seconds
  let startTime = null;

  function step(currentTime) {
    if (!startTime) startTime = currentTime;
    let progress = Math.min((currentTime - startTime) / duration, 1);
    let value = Math.floor(progress * target);
    if (target < 1000) {
      element.textContent = '+' + value;
    } else {
      // For thousands, show as 1k, 10.2k, etc.
      let displayValue = (progress * target) / 1000;
      if (target % 1000 === 0) {
        displayValue = Math.floor(displayValue);
      } else {
        displayValue = displayValue.toFixed(1);
      }
      element.textContent = '+' + displayValue + 'k';
    }
    if (progress < 1) {
      requestAnimationFrame(step);
    } else {
      // Set final value
      if (target < 1000) {
        element.textContent = '+' + target;
      } else {
        let displayValue = target / 1000;
        if (target % 1000 === 0) {
          displayValue = Math.floor(displayValue);
        } else {
          displayValue = displayValue.toFixed(1);
        }
        element.textContent = '+' + displayValue + 'k';
      }
    }
  }
  requestAnimationFrame(step);
}

document.addEventListener('DOMContentLoaded', function () {
  const langButtons = document.querySelectorAll('.lang-switch .btn-lang');
  langButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      langButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      // Optionally, you can add logic here to change the language
    });
  });

  const statNumbers = document.querySelectorAll('.stat-number');
  statNumbers.forEach(el => {
    let text = el.textContent.trim();
    let target = 0;
    if (text.endsWith('k')) {
      // Remove + and k, parse float, multiply by 1000
      target = parseFloat(text.replace('+', '').replace('k', '')) * 1000;
    } else {
      target = parseInt(text.replace('+', ''));
    }
    animateCounter(el, target);
  });
});

// Swiper initialization for Clients Section
window.addEventListener('DOMContentLoaded', function () {
  if (window.Swiper) {
    new Swiper('.clients-swiper-container', {
      loop: true,
      autoplay: { delay: 2000, disableOnInteraction: false },
      slidesPerView: 3,
      spaceBetween: 40,
      breakpoints: {
        0: { slidesPerView: 2, spaceBetween: 20 },
        700: { slidesPerView: 3, spaceBetween: 40 },
        1100: { slidesPerView: 5, spaceBetween: 40 }
      },
      grabCursor: true,
      // navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      // pagination: { el: '.swiper-pagination', clickable: true },
    });
  }
});

// Language switch logic
const btnEn = document.getElementById('btn-en');
const btnAr = document.getElementById('btn-ar');
const head = document.head;
let styleAr = document.getElementById('style-ar');
let styleEn = document.getElementById('style-en');

// Ensure style links have IDs for toggling
const styleLinks = document.querySelectorAll('link[rel="stylesheet"]');
styleLinks.forEach(link => {
  if (link.getAttribute('href').includes('style.css')) {
    link.id = 'style-en';
  }
  if (link.getAttribute('href').includes('style-ar.css')) {
    link.id = 'style-ar';
  }
});

btnEn.addEventListener('click', function () {
  btnEn.classList.add('active');
  btnAr.classList.remove('active');
  let styleAr = document.getElementById('style-ar');
  if (styleAr) styleAr.remove();
  let styleEn = document.getElementById('style-en');
  if (!styleEn) {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'assets/css/style.css';
    link.id = 'style-en';
    head.appendChild(link);
  }
  document.body.dir = 'ltr';
});

btnAr.addEventListener('click', function () {
  btnAr.classList.add('active');
  btnEn.classList.remove('active');
  let styleEn = document.getElementById('style-en');
  if (styleEn) styleEn.remove();
  let styleAr = document.getElementById('style-ar');
  if (!styleAr) {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'assets/css/style-ar.css';
    link.id = 'style-ar';
    head.appendChild(link);
  }
  document.body.dir = 'rtl';
});

// Side Nav Toggle Logic
function setupSideNav() {
  const sideNav = document.getElementById('sideNav');
  const sideNavOverlay = document.getElementById('sideNavOverlay');
  const sideNavToggle = document.getElementById('sideNavToggle');
  const sideNavClose = document.getElementById('sideNavClose');

  function openSideNav() {
    sideNav.classList.add('open');
    sideNavOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeSideNav() {
    sideNav.classList.remove('open');
    sideNavOverlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  if (sideNavToggle) {
    sideNavToggle.addEventListener('click', openSideNav);
  }
  if (sideNavClose) {
    sideNavClose.addEventListener('click', closeSideNav);
  }
  if (sideNavOverlay) {
    sideNavOverlay.addEventListener('click', closeSideNav);
  }
  // Optional: close on ESC key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeSideNav();
  });
}

document.addEventListener('DOMContentLoaded', setupSideNav);

// Modal logic for btn-gold
window.addEventListener('DOMContentLoaded', function () {
  var btnGolds = document.querySelectorAll('button.btn-gold');
  var consultationModal = document.getElementById('consultationModal');
  if (btnGolds.length && consultationModal) {
    btnGolds.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var modal = new bootstrap.Modal(consultationModal);
        modal.show();
      });
    });
  }

  // Form submission logic
  var consultationForm = document.getElementById('consultationForm');
  if (consultationForm) {
    consultationForm.addEventListener('submit', function (e) {
      e.preventDefault();
      // Basic validation (HTML5 required fields already in place)
      // You can add AJAX here if needed
      alert('Thank you! Your consultation request has been submitted.');
      consultationForm.reset();
      var modal = bootstrap.Modal.getInstance(consultationModal);
      if (modal) modal.hide();
    });
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('consultationForm');
  if (!form) return;
  const inputs = form.querySelectorAll('input, textarea, select');
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
});

document.addEventListener('DOMContentLoaded', function () {
  // Handle active nav link for both top and side navs
  var path = window.location.pathname.split("/").pop().toLowerCase();
  if (!path || path === '' || path === 'index.php') path = 'home.php';
  document.querySelectorAll('.navbar-nav .nav-link').forEach(function (link) {
    var href = link.getAttribute('href');
    if (!href) return;
    // Normalize for case and possible leading './'
    var normalizedHref = href.replace(/^\.\//, '').toLowerCase();
    if (normalizedHref === path) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
});

// Payment method switching logic for payment.php

document.addEventListener('DOMContentLoaded', function () {
  const methodRadios = document.querySelectorAll('input[name="payment_method"]');
  const creditCardFields = document.getElementById('creditCardFields');
  const paypalFields = document.getElementById('paypalFields');
  const bankFields = document.getElementById('bankFields');

  function updateFields() {
    const selected = document.querySelector('input[name="payment_method"]:checked').value;
    creditCardFields.style.display = selected === 'credit_card' ? 'flex' : 'none';
    paypalFields.style.display = selected === 'paypal' ? 'flex' : 'none';
    bankFields.style.display = selected === 'bank_transfer' ? 'flex' : 'none';
  }

  methodRadios.forEach(radio => {
    radio.addEventListener('change', updateFields);
  });

  updateFields(); // Set initial state
});

// ===== CONTACT FORM FUNCTIONALITY =====
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) return;

  const formMessages = document.getElementById('form-messages');
  const submitBtn = document.getElementById('submit-btn');
  const btnText = submitBtn.querySelector('.btn-text');
  const btnSpinner = submitBtn.querySelector('.btn-spinner');

  // Form validation rules
  const validationRules = {
    name: {
      required: true,
      minLength: 2,
      pattern: /^[a-zA-Z\s]+$/,
      message: 'Please enter a valid name (letters only, minimum 2 characters)'
    },
    email: {
      required: true,
      pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
      message: 'Please enter a valid email address'
    },
    phone: {
      required: false,
      pattern: /^[\+]?[0-9\s\-\(\)]{10,}$/,
      message: 'Please enter a valid phone number'
    },
    subject: {
      required: true,
      minLength: 5,
      message: 'Subject must be at least 5 characters long'
    },
    message: {
      required: true,
      minLength: 10,
      message: 'Message must be at least 10 characters long'
    }
  };

  // Real-time validation
  function validateField(field) {
    const fieldName = field.name;
    const fieldValue = field.value.trim();
    const rules = validationRules[fieldName];
    const errorElement = document.getElementById(`${fieldName}-error`);

    if (!rules) return true;

    // Clear previous error
    field.classList.remove('error');
    errorElement.classList.remove('show');

    // Required field validation
    if (rules.required && !fieldValue) {
      showFieldError(field, errorElement, `${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)} is required`);
      return false;
    }

    // Skip other validations if field is empty and not required
    if (!rules.required && !fieldValue) return true;

    // Pattern validation
    if (rules.pattern && !rules.pattern.test(fieldValue)) {
      showFieldError(field, errorElement, rules.message);
      return false;
    }

    // Length validation
    if (rules.minLength && fieldValue.length < rules.minLength) {
      showFieldError(field, errorElement, rules.message);
      return false;
    }

    // Field is valid
    field.classList.remove('error');
    errorElement.classList.remove('show');
    return true;
  }

  function showFieldError(field, errorElement, message) {
    field.classList.add('error');
    errorElement.textContent = message;
    errorElement.classList.add('show');
  }

  // Add event listeners for real-time validation
  const formFields = contactForm.querySelectorAll('.contact-form-control');
  formFields.forEach(field => {
    field.addEventListener('blur', () => validateField(field));
    field.addEventListener('input', () => {
      // Clear error state on input
      if (field.classList.contains('error')) {
        validateField(field);
      }
    });
  });

  // Form submission
  contactForm.addEventListener('submit', async function(e) {
    e.preventDefault();

    // Validate all fields
    let isValid = true;
    formFields.forEach(field => {
      if (!validateField(field)) {
        isValid = false;
      }
    });

    if (!isValid) {
      showFormMessage('Please correct the errors above', 'error');
      return;
    }

    // Show loading state
    setLoadingState(true);

    try {
      const formData = new FormData(contactForm);
      const response = await fetch('process_contact.php', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });

      const result = await response.json();

      if (result.success) {
        showFormMessage(result.message || 'Thank you! Your message has been sent successfully.', 'success');
        contactForm.reset();
        // Clear any remaining error states
        formFields.forEach(field => {
          field.classList.remove('error');
        });
        document.querySelectorAll('.error-message').forEach(error => {
          error.classList.remove('show');
        });
      } else {
        showFormMessage(result.message || 'There was an error sending your message. Please try again.', 'error');
      }
    } catch (error) {
      console.error('Form submission error:', error);
      showFormMessage('There was an error sending your message. Please try again later.', 'error');
    } finally {
      setLoadingState(false);
    }
  });

  function setLoadingState(loading) {
    if (loading) {
      submitBtn.disabled = true;
      btnText.style.display = 'none';
      btnSpinner.style.display = 'flex';
    } else {
      submitBtn.disabled = false;
      btnText.style.display = 'inline';
      btnSpinner.style.display = 'none';
    }
  }

  function showFormMessage(message, type) {
    formMessages.textContent = message;
    formMessages.className = `form-messages ${type}`;
    formMessages.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    
    // Auto-hide success messages after 5 seconds
    if (type === 'success') {
      setTimeout(() => {
        formMessages.classList.remove('success');
        formMessages.style.display = 'none';
      }, 5000);
    }
  }

  // Smooth form animations
  formFields.forEach(field => {
    field.addEventListener('focus', function() {
      this.parentElement.classList.add('focused');
    });

    field.addEventListener('blur', function() {
      if (!this.value.trim()) {
        this.parentElement.classList.remove('focused');
      }
    });
  });
});