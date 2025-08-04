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
const btnEnSide = document.getElementById('btn-en-side');
const btnArSide = document.getElementById('btn-ar-side');
const head = document.head;

function switchToEnglish() {
  btnEn.classList.add('active');
  btnAr.classList.remove('active');
  btnEnSide.classList.add('active');
  btnArSide.classList.remove('active');
  const styleAr = document.getElementById('style-ar');
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
}

function switchToArabic() {
  btnAr.classList.add('active');
  btnEn.classList.remove('active');
  btnArSide.classList.add('active');
  btnEnSide.classList.remove('active');
  const styleEn = document.getElementById('style-en');
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
}

btnEn.addEventListener('click', switchToEnglish);
btnAr.addEventListener('click', switchToArabic);
btnEnSide.addEventListener('click', switchToEnglish);
btnArSide.addEventListener('click', switchToArabic);
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

// ===== PRICING TOGGLE FUNCTIONALITY =====
document.addEventListener('DOMContentLoaded', function () {
  const pricingToggle = document.getElementById('pricing-toggle');
  const toggleLabels = document.querySelectorAll('.toggle-label');
  const monthlyPrices = document.querySelectorAll('.price-monthly');
  const annuallyPrices = document.querySelectorAll('.price-annually');

  if (pricingToggle) {
    pricingToggle.addEventListener('change', function () {
      const isAnnually = this.checked;

      // Update toggle labels
      toggleLabels.forEach((label, index) => {
        if (index === 0) { // Monthly label
          label.classList.toggle('active', !isAnnually);
        } else if (index === 1) { // Annually label
          label.classList.toggle('active', isAnnually);
        }
      });

      // Update price displays
      monthlyPrices.forEach(price => {
        price.classList.toggle('hidden', isAnnually);
      });

      annuallyPrices.forEach(price => {
        price.classList.toggle('active', isAnnually);
      });
    });

    // Set initial state
    toggleLabels[0].classList.add('active'); // Monthly is active by default
  }
});

// ===== CONTACT FORM FUNCTIONALITY =====
document.addEventListener('DOMContentLoaded', function () {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) return;

  const formMessages = document.getElementById('form-messages');
  const submitBtn = document.getElementById('submit-btn');

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
  contactForm.addEventListener('submit', async function (e) {
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
    field.addEventListener('focus', function () {
      this.parentElement.classList.add('focused');
    });

    field.addEventListener('blur', function () {
      if (!this.value.trim()) {
        this.parentElement.classList.remove('focused');
      }
    });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  // Payment method switching
  const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
  const creditCardSection = document.getElementById('credit-card-section');
  const paypalSection = document.getElementById('paypal-section');
  const bankTransferSection = document.getElementById('bank-transfer-section');
  const cardDetailsRow = document.getElementById('card-details-row');

  function switchPaymentMethod() {
    const selectedMethodInput = document.querySelector('input[name="payment_method"]:checked');
    const selectedMethod = selectedMethodInput ? selectedMethodInput.value : 'credit_card';

    if (creditCardSection && paypalSection && bankTransferSection && cardDetailsRow) {
      creditCardSection.style.display = selectedMethod === 'credit_card' ? 'block' : 'none';
      paypalSection.style.display = selectedMethod === 'paypal' ? 'block' : 'none';
      bankTransferSection.style.display = selectedMethod === 'bank_transfer' ? 'block' : 'none';
      cardDetailsRow.style.display = selectedMethod === 'credit_card' ? 'grid' : 'none';

      // Handle required attributes based on selected payment method
      const cardNumberInput = document.getElementById('card-number');
      const expiryDateInput = document.getElementById('expiry-date');
      const cvvInput = document.getElementById('cvv');
      const paypalEmailInput = document.getElementById('paypal-email');
      const accountNumberInput = document.getElementById('account-number');
      const routingNumberInput = document.getElementById('routing-number');

      if (selectedMethod === 'credit_card') {
        cardNumberInput.required = true;
        expiryDateInput.required = true;
        cvvInput.required = true;
        if (paypalEmailInput) paypalEmailInput.required = false;
        if (accountNumberInput) accountNumberInput.required = false;
        if (routingNumberInput) routingNumberInput.required = false;
      } else if (selectedMethod === 'paypal') {
        if (paypalEmailInput) paypalEmailInput.required = true;
        cardNumberInput.required = false;
        expiryDateInput.required = false;
        cvvInput.required = false;
        if (accountNumberInput) accountNumberInput.required = false;
        if (routingNumberInput) routingNumberInput.required = false;
      } else if (selectedMethod === 'bank_transfer') {
        if (accountNumberInput) accountNumberInput.required = true;
        if (routingNumberInput) routingNumberInput.required = true;
        cardNumberInput.required = false;
        expiryDateInput.required = false;
        cvvInput.required = false;
        if (paypalEmailInput) paypalEmailInput.required = false;
      }
    }
  }

  if (paymentMethods.length > 0) {
    paymentMethods.forEach(method => {
      method.addEventListener('change', switchPaymentMethod);
    });
    switchPaymentMethod();
  }

  // Card number formatting and brand detection
  const cardNumberInput = document.getElementById('card-number');
  const cardBrandSpan = document.getElementById('card-brand');

  if (cardNumberInput && cardBrandSpan) {
    cardNumberInput.addEventListener('input', function (e) {
      let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
      let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
      e.target.value = formattedValue;

      if (value.startsWith('4')) {
        cardBrandSpan.textContent = 'VISA';
      } else if (value.startsWith('5') || value.startsWith('2')) {
        cardBrandSpan.textContent = 'MASTERCARD';
      } else if (value.startsWith('3')) {
        cardBrandSpan.textContent = 'AMEX';
      } else {
        cardBrandSpan.textContent = 'CARD';
      }
    });
  }

  // Expiry date formatting
  const expiryInput = document.getElementById('expiry-date');
  if (expiryInput) {
    expiryInput.addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length >= 2) {
        value = value.substring(0, 2) + '/' + value.substring(2, 4) + '/' + value.substring(4, 6);
      }
      e.target.value = value;
    });
  }

  // CVV input restriction
  const cvvInput = document.getElementById('cvv');
  if (cvvInput) {
    cvvInput.addEventListener('input', function (e) {
      e.target.value = e.target.value.replace(/\D/g, '').substring(0, 3);
    });
  }

  // Apply discount functionality
  const applyBtn = document.querySelector('.apply-btn');
  if (applyBtn) {
    applyBtn.addEventListener('click', function () {
      alert('Discount applied successfully!');
    });
  }

  // Modal functionality
  const modal = document.getElementById('success-modal');
  const closeModalBtn = document.getElementById('close-payment-modal');
  const downloadBillBtn = document.getElementById('download-bill');

  // Close modal
  closeModalBtn.addEventListener('click', function () {
    modal.classList.remove('active');
  });

  // Enhanced PDF generation with better formatting
  function generatePDF() {
    try {
      // Disable button during generation
      downloadBillBtn.disabled = true;
      downloadBillBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';

      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      // Company colors
      const primaryColor = [35, 100, 93]; // Dark blue-green
      const secondaryColor = [113, 140, 141]; // Light gray-blue
      const textColor = [44, 62, 80]; // Dark gray

      // Header section with company branding
      doc.setFillColor(...primaryColor);
      doc.rect(0, 0, 210, 40, 'F');

      doc.setTextColor(255, 255, 255);
      doc.setFontSize(24);
      doc.setFont(undefined, 'bold');
      doc.text('PAYMENT RECEIPT', 20, 25);

      doc.setFontSize(12);
      doc.setFont(undefined, 'normal');
      doc.text(`Date: ${new Date().toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      })}`, 140, 25);

      // Transaction ID
      const transactionId = document.getElementById('transaction-id').textContent;
      doc.text(`Transaction ID: ${transactionId}`, 140, 32);

      // Reset text color for body
      doc.setTextColor(...textColor);

      // Customer Information Section
      let yPos = 60;
      doc.setFontSize(16);
      doc.setFont(undefined, 'bold');
      doc.text('Customer Information', 20, yPos);

      // Underline
      doc.setDrawColor(...primaryColor);
      doc.setLineWidth(0.5);
      doc.line(20, yPos + 2, 80, yPos + 2);

      yPos += 15;
      doc.setFontSize(11);
      doc.setFont(undefined, 'normal');

      const customerInfo = [
        ['Name:', document.getElementById('consultName').value || 'N/A'],
        ['Email:', document.getElementById('email').value || 'N/A'],
        ['Phone:', document.getElementById('consultPhone').value || 'N/A'],
        ['City:', document.getElementById('city').value || 'N/A'],
        ['Address:', document.getElementById('address').value || 'N/A']
      ];

      customerInfo.forEach(([label, value]) => {
        doc.setFont(undefined, 'bold');
        doc.text(label, 20, yPos);
        doc.setFont(undefined, 'normal');
        doc.text(value, 50, yPos);
        yPos += 8;
      });

      // Package Details Section
      yPos += 10;
      doc.setFontSize(16);
      doc.setFont(undefined, 'bold');
      doc.text('Package Details', 20, yPos);

      doc.setDrawColor(...primaryColor);
      doc.line(20, yPos + 2, 70, yPos + 2);

      yPos += 15;
      doc.setFontSize(11);
      doc.setFont(undefined, 'normal');

      doc.setFont(undefined, 'bold');
      doc.text('Package:', 20, yPos);
      doc.setFont(undefined, 'normal');
      doc.text('Standard Package (5/7 Services)', 50, yPos);
      yPos += 10;

      doc.setFont(undefined, 'bold');
      doc.text('Services Included:', 20, yPos);
      yPos += 8;

      const services = [
        '• Bookkeeping & Financial Reporting',
        '• Tax Preparation & Planning',
        '• Payroll Management',
        '• Financial Consulting',
        '• Dedicated Account Manager'
      ];

      doc.setFont(undefined, 'normal');
      services.forEach(service => {
        doc.text(service, 25, yPos);
        yPos += 6;
      });

      // Payment Summary Box
      yPos += 15;
      const boxHeight = 35;
      const boxWidth = 170;

      // Box background
      doc.setFillColor(248, 249, 250);
      doc.rect(20, yPos - 5, boxWidth, boxHeight, 'F');

      // Box border
      doc.setDrawColor(...secondaryColor);
      doc.setLineWidth(1);
      doc.rect(20, yPos - 5, boxWidth, boxHeight);

      doc.setFontSize(14);
      doc.setFont(undefined, 'bold');
      doc.text('Payment Summary', 25, yPos + 5);

      yPos += 15;
      doc.setFontSize(11);

      const paymentDetails = [
        ['Amount:', 'SAR 56.00'],
        ['Payment Method:', document.getElementById('modal-payment-method').textContent],
        ['Status:', 'PAID']
      ];

      paymentDetails.forEach(([label, value]) => {
        doc.setFont(undefined, 'normal');
        doc.text(label, 25, yPos);
        doc.setFont(undefined, 'bold');
        doc.text(value, 140, yPos);
        yPos += 7;
      });

      // Total amount highlight
      yPos += 5;
      doc.setFillColor(...primaryColor);
      doc.rect(25, yPos - 3, 140, 12, 'F');
      doc.setTextColor(255, 255, 255);
      doc.setFontSize(12);
      doc.setFont(undefined, 'bold');
      doc.text('TOTAL PAID: SAR 56.00', 30, yPos + 4);

      // Footer
      doc.setTextColor(...textColor);
      doc.setFontSize(10);
      doc.setFont(undefined, 'normal');
      doc.text('Thank you for your business!', 20, 260);
      doc.text('For support, contact us at support@company.com', 20, 268);
      doc.text('This is a computer-generated receipt.', 20, 276);

      // Generate timestamp for filename
      const timestamp = new Date().toISOString().slice(0, 19).replace(/[-:]/g, '').replace('T', '_');
      const filename = `Payment_Receipt_${timestamp}.pdf`;

      // Save the PDF
      doc.save(filename);

    } catch (error) {
      console.error('Error generating PDF:', error);
      alert('Error generating PDF. Please try again.');
    } finally {
      // Re-enable button
      downloadBillBtn.disabled = false;
      downloadBillBtn.innerHTML = '<i class="fas fa-download"></i> Download PDF Bill';
    }
  }

  // Download bill functionality
  downloadBillBtn.addEventListener('click', generatePDF);

  // Form submission
  const form = document.getElementById('payment-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // Generate random transaction ID
      const transactionId = '#TXN' + Date.now().toString().slice(-9);
      document.getElementById('transaction-id').textContent = transactionId;

      const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
      const paymentMethodDisplay = document.getElementById('modal-payment-method');
      if (paymentMethodDisplay) {
        paymentMethodDisplay.textContent =
          selectedMethod === 'credit_card' ? 'Credit Card' :
            selectedMethod === 'paypal' ? 'PayPal' :
              'Bank Transfer';
      }
      modal.classList.add('active');
    });
  }

  // Close modal when clicking outside
  modal.addEventListener('click', function (e) {
    if (e.target === modal) {
      modal.classList.remove('active');
    }
  });

  // File Upload Functionality
  const fileInput = document.getElementById('commercial_register');
  const filePreview = document.getElementById('file-preview');
  const previewImage = document.getElementById('preview-image');
  const fileName = document.getElementById('file-name');
  const removeFile = document.getElementById('remove-file');
  const uploadLabel = document.querySelector('.file-upload-label');
  const uploadContainer = document.querySelector('.file-upload-container');

  if (fileInput) {
    // Handle file selection
    fileInput.addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file) {
        handleFileUpload(file);
      }
    });

    // Handle drag and drop
    uploadLabel.addEventListener('dragover', function (e) {
      e.preventDefault();
      uploadLabel.classList.add('dragover');
    });

    uploadLabel.addEventListener('dragleave', function (e) {
      e.preventDefault();
      uploadLabel.classList.remove('dragover');
    });

    uploadLabel.addEventListener('drop', function (e) {
      e.preventDefault();
      uploadLabel.classList.remove('dragover');
      const file = e.dataTransfer.files[0];
      if (file) {
        fileInput.files = e.dataTransfer.files;
        handleFileUpload(file);
      }
    });

    // Remove file functionality
    removeFile.addEventListener('click', function () {
      fileInput.value = '';
      filePreview.style.display = 'none';
      uploadContainer.classList.remove('error');
    });
  }

  function handleFileUpload(file) {
    // Validate file type
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'application/pdf'];
    if (!allowedTypes.includes(file.type)) {
      uploadContainer.classList.add('error');
      alert('Please upload a valid file type (JPG, PNG, GIF, or PDF)');
      return;
    }

    uploadContainer.classList.remove('error');
    fileName.textContent = file.name;

    // Show preview for images
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImage.src = e.target.result;
        filePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      // For PDF files, show a PDF icon instead of preview
      previewImage.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSIjRkY2NjY2Ii8+CjxwYXRoIGQ9Ik0yMCAyMEg4MFY4MEgyMFYyMFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0zMCAzMEg3MFY3MEgzMFYzMFoiIGZpbGw9IiNGRjY2NjYiLz4KPHN2ZyB4PSIzNSIgeT0iMzUiIHdpZHRoPSIzMCIgaGVpZ2h0PSIzMCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMTQgMkg2QzQuOSAyIDQgMi45IDQgNFYyMEM0IDIxLjEgNC45IDIyIDYgMjJIMThDMjAuMjEgMjIgMjIgMjAuMjEgMjIgMThWN0wyMCAySDI0VjZIMTZWMloiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xNCAxNEgxMFYxNkgxNFYxNFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xNCAxOEgxMFYyMEgxNFYxOFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xOCAxNEgxNlYxNkgxOFYxNFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xOCAxOEgxNlYyMEgxOFYxOFoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo8L3N2Zz4K';
      filePreview.style.display = 'block';
    }
  }
});