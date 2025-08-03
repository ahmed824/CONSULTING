<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Services']
];
include 'includes/breadcrumb.php'; ?>
<div class="services-page overflow-hidden">
  <div class="container position-relative">
    <h2 class="text-center mb-5">Our Services</h2>
    <div class=" categories-bg-gradient">
      <div class="gradient1"></div>
      <div class="gradient2"></div>
    </div>
    <div class="services-page-categories-grid">
      <a href="#" class="service-card-link disabled-card" data-service="engineering">
        <div class=" category-card" style="background-image: url('assets/images/img1.jpg');">
          <div class="category-content">
            <h3>Engineering Consulting Solutions</h3>
            <span class="coming-soon">coming soon</span>
          </div>
        </div>
      </a>
      <a href="accounting-services.php" class="service-card-link">
        <div class=" category-card category-card-right" style="background-image: url('assets/images/img2.png');">
          <div class="category-content">
            <h3>Professional Accounting Services for Your Business</h3>
            <div class=" explore-btn d-flex align-items-center gap-2 position-relative overflow-hidden">
              Explore
              <span class="explore-icon d-flex justify-content-center align-items-center">
                <svg class="rotate-icon" viewBox="0 0 16 19" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                  <path
                    d="M7 18C7 18.5523 7.44772 19 8 19C8.55228 19 9 18.5523 9 18H7ZM8.70711 0.292893C8.31658 -0.0976311 7.68342 -0.0976311 7.29289 0.292893L0.928932 6.65685C0.538408 7.04738 0.538408 7.68054 0.928932 8.07107C1.31946 8.46159 1.95262 8.46159 2.34315 8.07107L8 2.41421L13.6569 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.70711 0.292893ZM9 18L9 1H7L7 18H9Z"
                    fill="#b68f0e" />
                </svg>
              </span>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="service-card-link disabled-card" data-service="legal">
        <div class=" category-card" style="background-image: url('assets/images/img3.jpg');">
          <div class="category-content">
            <h3>Trusted Legal Services</h3>
            <span class="coming-soon">coming soon</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<script>
// Add click handler for disabled cards
document.addEventListener('DOMContentLoaded', function() {
  const disabledCards = document.querySelectorAll('.disabled-card');
  
  disabledCards.forEach(card => {
    card.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Get the service name from data attribute
      const serviceName = this.getAttribute('data-service');
      const serviceTitle = this.querySelector('h3').textContent;
      
      // Show a notification or modal
      showComingSoonNotification(serviceTitle);
    });
  });
});

function showComingSoonNotification(serviceName) {
  // Create notification element
  const notification = document.createElement('div');
  notification.className = 'coming-soon-notification';
  notification.innerHTML = `
    <div class="notification-content">
      <h4>Coming Soon!</h4>
      <p>${serviceName} will be available soon. Stay tuned!</p>
      <button class="notification-close">×</button>
    </div>
  `;
  
  // Add to page
  document.body.appendChild(notification);
  
  // Show notification
  setTimeout(() => {
    notification.classList.add('show');
  }, 100);
  
  // Close notification
  const closeBtn = notification.querySelector('.notification-close');
  closeBtn.addEventListener('click', () => {
    notification.classList.remove('show');
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  });
  
  // Auto close after 3 seconds
  setTimeout(() => {
    if (notification.parentNode) {
      notification.classList.remove('show');
      setTimeout(() => {
        if (notification.parentNode) {
          document.body.removeChild(notification);
        }
      }, 300);
    }
  }, 3000);
}
</script>

<?php include 'includes/footer.php'; ?>
 