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