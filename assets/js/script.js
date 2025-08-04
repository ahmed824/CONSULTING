
// Counter Animation
function animateCounter(element, target, isKFormat) {
  let start = 0;
  const duration = 2000;
  let startTime = null;

  function step(currentTime) {
    if (!startTime) startTime = currentTime;
    const progress = Math.min((currentTime - startTime) / duration, 1);
    const value = progress * target;

    element.textContent = isKFormat
      ? `+${(value / 1000).toFixed(target % 1000 === 0 ? 0 : 1)}k`
      : `+${Math.floor(value)}`;

    if (progress < 1) {
      requestAnimationFrame(step);
    } else {
      element.textContent = isKFormat
        ? `+${(target / 1000).toFixed(target % 1000 === 0 ? 0 : 1)}k`
        : `+${target}`;
    }
  }
  requestAnimationFrame(step);
}

// Main DOMContentLoaded Handler
document.addEventListener('DOMContentLoaded', () => {
  // Stats Section Animation
  const statsSection = document.querySelector('.stats-section');
  if (statsSection) {
    const statNumbers = document.querySelectorAll('.stat-number');
    const observer = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          statNumbers.forEach(el => {
            if (el.dataset.animated === 'true') return;
            const text = el.textContent.trim();
            const isKFormat = text.endsWith('k');
            const target = isKFormat
              ? parseFloat(text.replace('+', '').replace('k', '')) * 1000
              : parseInt(text.replace('+', ''));
            animateCounter(el, target, isKFormat);
            el.dataset.animated = 'true';
          });
          observer.unobserve(statsSection);
        }
      },
      { root: null, rootMargin: '0px', threshold: 0.1 }
    );
    observer.observe(statsSection);
  }

  // Swiper Initialization for Clients Section
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
      grabCursor: true
    });
  }

  // Language Switch Logic
  const btnEn = document.getElementById('btn-en');
  const btnAr = document.getElementById('btn-ar');
  const btnEnSide = document.getElementById('btn-en-side');
  const btnArSide = document.getElementById('btn-ar-side');

  function switchLanguage(lang) {
    const isEnglish = lang === 'en';
    btnEn.classList.toggle('active', isEnglish);
    btnAr.classList.toggle('active', !isEnglish);
    btnEnSide.classList.toggle('active', isEnglish);
    btnArSide.classList.toggle('active', !isEnglish);

    const styleId = isEnglish ? 'style-en' : 'style-ar';
    const cssFile = isEnglish ? 'assets/css/style.css' : 'assets/css/style-ar.css';
    const oppositeStyleId = isEnglish ? 'style-ar' : 'style-en';

    document.getElementById(oppositeStyleId)?.remove();
    if (!document.getElementById(styleId)) {
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = cssFile;
      link.id = styleId;
      document.head.appendChild(link);
    }
    document.body.dir = isEnglish ? 'ltr' : 'rtl';
  }

  btnEn?.addEventListener('click', () => switchLanguage('en'));
  btnAr?.addEventListener('click', () => switchLanguage('ar'));
  btnEnSide?.addEventListener('click', () => switchLanguage('en'));
  btnArSide?.addEventListener('click', () => switchLanguage('ar'));

  // Side Navigation Toggle
  const sideNav = document.getElementById('sideNav');
  const sideNavOverlay = document.getElementById('sideNavOverlay');
  const sideNavToggle = document.getElementById('sideNavToggle');
  const sideNavClose = document.getElementById('sideNavClose');

  function toggleSideNav(open) {
    sideNav?.classList.toggle('open', open);
    sideNavOverlay?.classList.toggle('open', open);
    document.body.style.overflow = open ? 'hidden' : '';
  }

  sideNavToggle?.addEventListener('click', () => toggleSideNav(true));
  sideNavClose?.addEventListener('click', () => toggleSideNav(false));
  sideNavOverlay?.addEventListener('click', () => toggleSideNav(false));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') toggleSideNav(false);
  });

  // Consultation Modal and Form
  const btnGolds = document.querySelectorAll('button.btn-gold');
  const consultationModal = document.getElementById('consultationModal');
  const consultationForm = document.getElementById('consultationForm');

  if (consultationForm) {
    const inputs = consultationForm.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
      const label = consultationForm.querySelector(`label[for="${input.id}"]`);
      if (label) {
        input.addEventListener('focus', () => label.classList.add('active'));
        input.addEventListener('blur', () => label.classList.remove('active'));
      }
    });

    consultationForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!consultationForm.checkValidity()) {
        consultationForm.reportValidity();
        return;
      }

      const formData = new FormData(consultationForm);
      console.log('Consultation Request Submitted:', Object.fromEntries(formData));
      consultationForm.reset();
      bootstrap.Modal.getInstance(consultationModal)?.hide();
    });
  }

  btnGolds.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      consultationModal && new bootstrap.Modal(consultationModal).show();
    });
  });

  // Navigation Active Link
  let path = window.location.pathname.split('/').pop().toLowerCase() || 'home.php';
  if (path === 'index.php') path = 'home.php';
  document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    const href = link.getAttribute('href')?.replace(/^\.\//, '').toLowerCase();
    link.classList.toggle('active', href === path);
  });

  // Payment Method Switching
  const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
  const sections = {
    credit_card: document.getElementById('credit-card-section'),
    paypal: document.getElementById('paypal-section'),
    bank_transfer: document.getElementById('bank-transfer-section')
  };
  const cardDetailsRow = document.getElementById('card-details-row');

  function updatePaymentFields() {
    const selectedMethod = document.querySelector('input[name="payment_method"]:checked')?.value || 'credit_card';
    Object.keys(sections).forEach(method => {
      sections[method].style.display = method === selectedMethod ? 'block' : 'none';
    });
    cardDetailsRow.style.display = selectedMethod === 'credit_card' ? 'grid' : 'none';

    const requiredFields = {
      credit_card: ['card-number', 'expiry-date', 'cvv'],
      paypal: ['paypal-email'],
      bank_transfer: ['account-number', 'routing-number']
    };

    Object.values(sections).forEach(section => {
      section.querySelectorAll('input').forEach(input => {
        input.required = requiredFields[selectedMethod].includes(input.id);
      });
    });
  }

  paymentMethods.forEach(method => method.addEventListener('change', updatePaymentFields));
  paymentMethods.length && updatePaymentFields();

  // Card Number Formatting and Brand Detection
  const cardNumberInput = document.getElementById('card-number');
  const cardBrandSpan = document.getElementById('card-brand');
  if (cardNumberInput && cardBrandSpan) {
    cardNumberInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/g, '');
      e.target.value = value.match(/.{1,4}/g)?.join(' ') || value;
      cardBrandSpan.textContent = value.startsWith('4') ? 'VISA' :
        value.startsWith('5') || value.startsWith('2') ? 'MASTERCARD' :
        value.startsWith('3') ? 'AMEX' : 'CARD';
    });
  }

  // Expiry Date and CVV Formatting
  const expiryInput = document.getElementById('expiry-date');
  if (expiryInput) {
    expiryInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length >= 2) value = `${value.slice(0, 2)}/${value.slice(2, 4)}`;
      e.target.value = value.slice(0, 5);
    });
  }

  const cvvInput = document.getElementById('cvv');
  if (cvvInput) {
    cvvInput.addEventListener('input', (e) => {
      e.target.value = e.target.value.replace(/\D/g, '').slice(0, 3);
    });
  }

  // Pricing Toggle
  const pricingToggle = document.getElementById('pricing-toggle');
  const priceAmount = document.getElementById('price-amount');
  const packageSubtitle = document.getElementById('package-subtitle');
  const featureTaxOptimization = document.getElementById('feature-tax-optimization');
  const modalAmount = document.getElementById('modal-amount');
  const modalTotalPaid = document.getElementById('modal-total-paid');
  const saveBadge = document.getElementById('save-badge');

  if (pricingToggle) {
    pricingToggle.addEventListener('change', () => {
      const isAnnual = pricingToggle.checked;
      priceAmount.textContent = isAnnual ? '44.80' : '56';
      packageSubtitle.textContent = isAnnual ? '6/7 Services' : '5/7 Services';
      featureTaxOptimization.classList.toggle('disabled', !isAnnual);
      featureTaxOptimization.textContent = isAnnual ? '✓' : '○';
      modalAmount.textContent = `SAR ${isAnnual ? '44.80' : '56.00'}`;
      modalTotalPaid.textContent = `SAR ${isAnnual ? '44.80' : '56.00'}`;
      saveBadge.style.display = isAnnual ? 'inline' : 'none';
    });
  }

  // Contact Form Validation and Submission
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    const formMessages = document.getElementById('form-messages');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = submitBtn?.querySelector('.btn-text');
    const btnSpinner = submitBtn?.querySelector('.btn-spinner');

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

    function validateField(field) {
      const rules = validationRules[field.name];
      if (!rules) return true;
      const value = field.value.trim();
      const errorElement = document.getElementById(`${field.name}-error`);

      field.classList.remove('error');
      errorElement?.classList.remove('show');

      if (rules.required && !value) {
        showFieldError(field, errorElement, `${field.name.charAt(0).toUpperCase() + field.name.slice(1)} is required`);
        return false;
      }
      if (!rules.required && !value) return true;
      if (rules.pattern && !rules.pattern.test(value)) {
        showFieldError(field, errorElement, rules.message);
        return false;
      }
      if (rules.minLength && value.length < rules.minLength) {
        showFieldError(field, errorElement, rules.message);
        return false;
      }
      return true;
    }

    function showFieldError(field, errorElement, message) {
      field.classList.add('error');
      if (errorElement) {
        errorElement.textContent = message;
        errorElement.classList.add('show');
      }
    }

    const formFields = contactForm.querySelectorAll('.contact-form-control');
    formFields.forEach(field => {
      field.addEventListener('blur', () => validateField(field));
      field.addEventListener('input', () => field.classList.contains('error') && validateField(field));
      field.addEventListener('focus', () => field.parentElement.classList.add('focused'));
      field.addEventListener('blur', () => !field.value.trim() && field.parentElement.classList.remove('focused'));
    });

    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const isValid = Array.from(formFields).every(field => validateField(field));
      if (!isValid) {
        showFormMessage('Please correct the errors above', 'error');
        return;
      }

      setLoadingState(true);
      try {
        const response = await fetch('process_contact.php', {
          method: 'POST',
          body: new FormData(contactForm),
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const result = await response.json();
        showFormMessage(result.message || (result.success ? 'Thank you! Your message has been sent successfully.' : 'There was an error sending your message. Please try again.'), result.success ? 'success' : 'error');
        if (result.success) {
          contactForm.reset();
          formFields.forEach(field => field.classList.remove('error'));
          document.querySelectorAll('.error-message').forEach(error => error.classList.remove('show'));
        }
      } catch (error) {
        console.error('Form submission error:', error);
        showFormMessage('There was an error sending your message. Please try again later.', 'error');
      } finally {
        setLoadingState(false);
      }
    });

    function setLoadingState(loading) {
      if (submitBtn) {
        submitBtn.disabled = loading;
        if (btnText) btnText.style.display = loading ? 'none' : 'inline';
        if (btnSpinner) btnSpinner.style.display = loading ? 'flex' : 'none';
      }
    }

    function showFormMessage(message, type) {
      if (formMessages) {
        formMessages.textContent = message;
        formMessages.className = `form-messages ${type}`;
        formMessages.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        if (type === 'success') {
          setTimeout(() => {
            formMessages.classList.remove('success');
            formMessages.style.display = 'none';
          }, 5000);
        }
      }
    }
  }

  // Payment Form Handling
  const paymentForm = document.getElementById('payment-form');
  if (paymentForm) {
    paymentForm.querySelectorAll('input, textarea, select').forEach(input => {
      const label = paymentForm.querySelector(`label[for="${input.id}"]`);
      if (label) {
        input.addEventListener('focus', () => label.classList.add('active'));
        input.addEventListener('blur', () => label.classList.remove('active'));
      }
    });

    paymentForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const transactionId = '#TXN' + Date.now().toString().slice(-9);
      document.getElementById('transaction-id').textContent = transactionId;
      const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
      document.getElementById('modal-payment-method').textContent =
        selectedMethod === 'credit_card' ? 'Credit Card' :
        selectedMethod === 'paypal' ? 'PayPal' : 'Bank Transfer';
      document.getElementById('success-modal').classList.add('active');
    });
  }

  // File Upload Handling
  const fileInput = document.getElementById('commercial_register');
  if (fileInput) {
    const filePreview = document.getElementById('file-preview');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');
    const removeFile = document.getElementById('remove-file');
    const uploadLabel = document.querySelector('.file-upload-label');
    const uploadContainer = document.querySelector('.file-upload-container');

    fileInput.addEventListener('change', (e) => e.target.files[0] && handleFileUpload(e.target.files[0]));
    uploadLabel.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadLabel.classList.add('dragover');
    });
    uploadLabel.addEventListener('dragleave', (e) => {
      e.preventDefault();
      uploadLabel.classList.remove('dragover');
    });
    uploadLabel.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadLabel.classList.remove('dragover');
      const file = e.dataTransfer.files[0];
      if (file) {
        fileInput.files = e.dataTransfer.files;
        handleFileUpload(file);
      }
    });
    removeFile.addEventListener('click', () => {
      fileInput.value = '';
      filePreview.style.display = 'none';
      uploadContainer.classList.remove('error');
    });

    function handleFileUpload(file) {
      const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'application/pdf'];
      if (!allowedTypes.includes(file.type)) {
        uploadContainer.classList.add('error');
        alert('Please upload a valid file type (JPG, PNG, GIF, or PDF)');
        return;
      }

      uploadContainer.classList.remove('error');
      fileName.textContent = file.name;
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (e) => {
          previewImage.src = e.target.result;
          filePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        previewImage.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSIjRkY2NjY2Ii8+CjxwYXRoIGQ9Ik0yMCAyMEg4MFY4MEgyMFYyMFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0zMCAzMEg3MFY3MEgzMFYzMFoiIGZpbGw9IiNGRjY2NjYiLz4KPHN2ZyB4PSIzNSIgeT0iMzUiIHdpZHRoPSIzMCIgaGVpZ2h0PSIzMCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMTQgMkg2QzQuOSAyIDQgMi45IDQgNFYyMEM0IDIxLjEgNC45IDIyIDYgMjJIMThDMjAuMjEgMjIgMjIgMjAuMjEgMjIgMThWN0wyMCAySDI0VjZIMTZWMloiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xNCAxNEgxMFYxNkgxNFYxNFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xNCAxOEgxMFYyMEgxNFYxOFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xOCAxNEgxNlYxNkgxOFYxNFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xOCAxOEgxNlYyMEgxOFYxOFoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo8L3N2Zz4K';
        filePreview.style.display = 'block';
      }
    }
  }

  // PDF Generation
  const downloadBillBtn = document.getElementById('download-bill');
  if (downloadBillBtn) {
    downloadBillBtn.addEventListener('click', () => {
      try {
        downloadBillBtn.disabled = true;
        downloadBillBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const primaryColor = [35, 100, 93];
        const secondaryColor = [113, 140, 141];
        const textColor = [44, 62, 80];

        // Header
        doc.setFillColor(...primaryColor);
        doc.rect(0, 0, 210, 40, 'F');
        doc.setTextColor(255, 255, 255);
        doc.setFontSize(24);
        doc.setFont(undefined, 'bold');
        doc.text('PAYMENT RECEIPT', 20, 25);
        doc.setFontSize(12);
        doc.setFont(undefined, 'normal');
        doc.text(`Date: ${new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}`, 140, 25);
        doc.text(`Transaction ID: ${document.getElementById('transaction-id').textContent}`, 140, 32);
        doc.setTextColor(...textColor);

        // Customer Information
        let yPos = 60;
        doc.setFontSize(16);
        doc.setFont(undefined, 'bold');
        doc.text('Customer Information', 20, yPos);
        doc.setDrawColor(...primaryColor);
        doc.setLineWidth(0.5);
        doc.line(20, yPos + 2, 80, yPos + 2);
        yPos += 15;
        doc.setFontSize(11);

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

        // Package Details
        yPos += 10;
        doc.setFontSize(16);
        doc.setFont(undefined, 'bold');
        doc.text('Package Details', 20, yPos);
        doc.setDrawColor(...primaryColor);
        doc.line(20, yPos + 2, 70, yPos + 2);
        yPos += 15;
        doc.setFontSize(11);
        doc.setFont(undefined, 'bold');
        doc.text('Package:', 20, yPos);
        doc.setFont(undefined, 'normal');
        doc.text(`Standard Package (${packageSubtitle.textContent})`, 50, yPos);
        yPos += 10;
        doc.setFont(undefined, 'bold');
        doc.text('Services Included:', 20, yPos);
        yPos += 8;

        const services = [
          '• Bookkeeping & Financial Reporting',
          '• Tax Preparation & Planning',
          '• Payroll Management',
          '• Financial Consulting',
          '• Dedicated Account Manager',
          ...(featureTaxOptimization.classList.contains('disabled') ? [] : ['• Advanced Tax Optimization'])
        ];

        services.forEach(service => {
          doc.text(service, 25, yPos);
          yPos += 6;
        });

        // Payment Summary
        yPos += 15;
        doc.setFillColor(248, 249, 250);
        doc.rect(20, yPos - 5, 170, 35, 'F');
        doc.setDrawColor(...secondaryColor);
        doc.setLineWidth(1);
        doc.rect(20, yPos - 5, 170, 35);
        doc.setFontSize(14);
        doc.setFont(undefined, 'bold');
        doc.text('Payment Summary', 25, yPos + 5);
        yPos += 15;
        doc.setFontSize(11);

        const paymentDetails = [
          ['Amount:', modalAmount.textContent],
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

        // Total
        yPos += 5;
        doc.setFillColor(...primaryColor);
        doc.rect(25, yPos - 3, 140, 12, 'F');
        doc.setTextColor(255, 255, 255);
        doc.setFontSize(12);
        doc.setFont(undefined, 'bold');
        doc.text(`TOTAL PAID: ${modalTotalPaid.textContent}`, 30, yPos + 4);

        // Footer
        doc.setTextColor(...textColor);
        doc.setFontSize(10);
        doc.setFont(undefined, 'normal');
        doc.text('Thank you for your business!', 20, 260);
        doc.text('For support, contact us at support@company.com', 20, 268);
        doc.text('This is a computer-generated receipt.', 20, 276);

        const timestamp = new Date().toISOString().slice(0, 19).replace(/[-:]/g, '').replace('T', '_');
        doc.save(`Payment_Receipt_${timestamp}.pdf`);
      } catch (error) {
        console.error('Error generating PDF:', error);
        alert('Error generating PDF. Please try again.');
      } finally {
        downloadBillBtn.disabled = false;
        downloadBillBtn.innerHTML = '<i class="fas fa-download"></i> Download PDF Bill';
      }
    });
  }

  // Modal Handling
  const modal = document.getElementById('success-modal');
  modal?.addEventListener('click', (e) => {
    if (e.target === modal) modal.classList.remove('active');
  });
  document.getElementById('close-payment-modal')?.addEventListener('click', () => {
    modal.classList.remove('active');
  });

  // Discount Button
  document.querySelector('.apply-btn')?.addEventListener('click', () => {
    alert('Discount applied successfully!');
  });
});
 