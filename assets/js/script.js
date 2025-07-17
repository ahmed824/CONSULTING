document.addEventListener('DOMContentLoaded', function() {
  const langButtons = document.querySelectorAll('.lang-switch .btn-lang');
  langButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      langButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      // Optionally, you can add logic here to change the language
    });
  });
}); 