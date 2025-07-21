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

document.addEventListener('DOMContentLoaded', function() {
  const langButtons = document.querySelectorAll('.lang-switch .btn-lang');
  langButtons.forEach(btn => {
    btn.addEventListener('click', function() {
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
window.addEventListener('DOMContentLoaded', function() {
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

 btnEn.addEventListener('click', function() {
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

 btnAr.addEventListener('click', function() {
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
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeSideNav();
  });
}

document.addEventListener('DOMContentLoaded', setupSideNav);

// Modal logic for btn-gold
window.addEventListener('DOMContentLoaded', function() {
  var btnGolds = document.querySelectorAll('button.btn-gold');
  var consultationModal = document.getElementById('consultationModal');
  if (btnGolds.length && consultationModal) {
    btnGolds.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        var modal = new bootstrap.Modal(consultationModal);
        modal.show();
      });
    });
  }

  // Form submission logic
  var consultationForm = document.getElementById('consultationForm');
  if (consultationForm) {
    consultationForm.addEventListener('submit', function(e) {
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
  document.querySelectorAll('.navbar-nav .nav-link').forEach(function(link) {
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

document.addEventListener('DOMContentLoaded', function() {
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