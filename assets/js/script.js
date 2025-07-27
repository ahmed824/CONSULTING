function animateCounter(element, target, isKFormat) {
  let start = 0;
  let duration = 2000; // 2 seconds
  let startTime = null;

  function step(currentTime) {
    if (!startTime) startTime = currentTime;
    let progress = Math.min((currentTime - startTime) / duration, 1);
    let value = progress * target;

    if (isKFormat) {
      let displayValue = value / 1000;
      if (target % 1000 === 0) {
        displayValue = Math.floor(displayValue);
      } else {
        displayValue = displayValue.toFixed(1);
      }
      element.textContent = '+' + displayValue + 'k';
    } else {
      element.textContent = '+' + Math.floor(value);
    }

    if (progress < 1) {
      requestAnimationFrame(step);
    } else {
      // Set final value
      if (isKFormat) {
        let displayValue = target / 1000;
        if (target % 1000 === 0) {
          displayValue = Math.floor(displayValue);
        } else {
          displayValue = displayValue.toFixed(1);
        }
        element.textContent = '+' + displayValue + 'k';
      } else {
        element.textContent = '+' + target;
      }
    }
  }
  requestAnimationFrame(step);
}

document.addEventListener('DOMContentLoaded', function () {
  const statsSection = document.querySelector('.stats-section');
  const statNumbers = document.querySelectorAll('.stat-number');

  // Check if stats-section exists
  if (!statsSection) return; // silently skip if not found

  // Create Intersection Observer
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Trigger animation for each stat-number
          statNumbers.forEach(el => {
            if (el.dataset.animated === 'true') return;

            let text = el.textContent.trim();
            let target = 0;
            let isKFormat = text.endsWith('k');
            if (isKFormat) {
              target = parseFloat(text.replace('+', '').replace('k', '')) * 1000;
            } else {
              target = parseInt(text.replace('+', ''));
            }
            animateCounter(el, target, isKFormat);
            el.dataset.animated = 'true';
          });

          observer.unobserve(statsSection);
        }
      });
    },
    {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    }
  );

  observer.observe(statsSection);
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

window.addEventListener('DOMContentLoaded', function () {
  // Modal logic for btn-gold
  const btnGolds = document.querySelectorAll('button.btn-gold');
  const consultationModal = document.getElementById('consultationModal');

  if (btnGolds.length && consultationModal) {
    btnGolds.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        const modal = new bootstrap.Modal(consultationModal);
        modal.show();
      });
    });
  } else {
    console.warn('Modal or gold buttons not found in the DOM.');
  }

  // Form submission logic
  const consultationForm = document.getElementById('consultationForm');
  if (consultationForm) {
    consultationForm.addEventListener('submit', function (e) {
      e.preventDefault();

      // Check HTML5 validation
      if (!consultationForm.checkValidity()) {
        consultationForm.reportValidity();
        return;
      }

      // Collect form data
      const formData = new FormData(consultationForm);
      const data = {
        name: formData.get('name') || '',
        email: formData.get('email') || '',
        phone: formData.get('phone') || '',
        service: formData.get('service') || '',
        message: formData.get('message') || ''
      };

      // Log form data to console
      console.log('Consultation Request Submitted:', data);

      // Reset form
      consultationForm.reset();

      // Close modal
      const modal = bootstrap.Modal.getInstance(consultationModal);
      if (modal) {
        modal.hide();
      } else {
        console.warn('Modal instance not found for closing.');
      }
    });
  } else {
    console.warn('Consultation form not found in the DOM.');
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
  const creditCardFields = document.getElementById('credit-card-fields');
  const paypalFields = document.getElementById('paypal-fields');
  const bankFields = document.getElementById('bank-transfer-fields');

  // Check if elements exist to prevent null errors
  if (!creditCardFields || !paypalFields || !bankFields) return;


  function updateFields() {
    const selected = document.querySelector('input[name="payment_method"]:checked')?.value;
    if (!selected) {
      console.warn('No payment method selected.');
      return;
    }

    // Set display based on selected payment method
    creditCardFields.style.display = selected === 'credit_card' ? 'block' : 'none';
    paypalFields.style.display = selected === 'paypal' ? 'block' : 'none';
    bankFields.style.display = selected === 'bank_transfer' ? 'block' : 'none';

    // Update required fields based on payment method
    updateRequiredFields(selected);
  }

  function updateRequiredFields(method) {
    const fields = {
      'credit_card': ['card_number', 'expiry_date', 'cvv', 'card_holder'],
      'paypal': ['paypal_email'],
      'bank_transfer': ['account_number', 'routing_number']
    };

    // Reset required attributes for all inputs
    [creditCardFields, paypalFields, bankFields].forEach(field => {
      const inputs = field.querySelectorAll('input');
      inputs.forEach(input => {
        input.required = method === field.id.replace('-fields', '') && fields[method].includes(input.name);
      });
    });
  }

  methodRadios.forEach(radio => {
    radio.addEventListener('change', updateFields);
  });

  // Set initial state
  updateFields();

  // Input formatting for card number
  const cardNumberInput = document.getElementById('card-number');
  if (cardNumberInput) {
    cardNumberInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      value = value.match(/.{1,4}/g)?.join(' ') || value;
      e.target.value = value.slice(0, 19); // Limit to 16 digits + 3 spaces
    });
  }

  // Input formatting for expiry date
  const expiryDateInput = document.getElementById('expiry-date');
  if (expiryDateInput) {
    expiryDateInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2, 4);
      }
      e.target.value = value.slice(0, 5); // Limit to MM/YY
    });
  }

  // Basic form validation
  const paymentForm = document.getElementById('payment-form');
  if (paymentForm) {
    paymentForm.addEventListener('submit', (e) => {
      const amount = document.getElementById('amount').value;
      if (amount <= 0) {
        e.preventDefault();
        alert('Please enter a valid amount');
      }
    });

    // Label animation for form inputs
    const inputs = paymentForm.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
      const label = paymentForm.querySelector(`label[for="${input.id}"]`);
      if (!label) return;
      input.addEventListener('focus', () => {
        label.classList.add('active');
      });
      input.addEventListener('blur', () => {
        label.classList.remove('active');
      });
    });
  }
});