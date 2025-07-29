<?php
// Header include with Bootstrap
$page_title = isset($page_title) ? $page_title : 'Home Page';
$page_description = isset($page_description) ? $page_description : 'Professional consulting services in Saudi Arabia';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="nav-container py-4">
    <nav class="navbar navbar-expand-lg container mx-auto rounded-full px-4 py-2">
      <div class="container-fluid justify-content-between align-items-center">
        <!-- Hamburger for mobile -->
        <button class="navbar-toggler d-lg-none" type="button" id="sideNavToggle" aria-label="Open navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Logo for large screens -->
        <a class="navbar-brand" href="Home.php">
          <img src="assets/images/Logo.svg" alt="Consulting Logo">
        </a>
        <!-- Nav links for large screens -->
        <ul class="navbar-nav flex-row gap-3 align-items-center mx-auto d-none d-lg-flex">
          <li class="nav-item"><a class="nav-link nav-home" href="Home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="packages.php">Packages</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        </ul>
        <!-- Lang switch and CTA for large screens -->
        <div class="d-none d-lg-flex align-items-center gap-2 ms-3">
          <div class="lang-switch">
            <button class="btn btn-sm btn-lang active" id="btn-en" type="button">En</button>
            <button class="btn btn-sm btn-lang" id="btn-ar" type="button">Ar</button>
          </div>
          <button class="btn btn-gold ms-2" id="btn-gold-main">Request Consultation</button>
        </div>
      </div>
    </nav>
  </div>

  <!-- Side Nav (hidden on large screens) -->
  <div id="sideNav" class="side-nav">
    <div class="side-nav-header">
      <a class="navbar-brand px-3" href="Home.php">
        CONSULTING <span class="contact-info-nav"></span>
      </a>
      <button class="close-btn" id="sideNavClose" aria-label="Close navigation">&times;</button>
    </div>
    <ul class="navbar-nav flex-column gap-3 align-items-start mt-4">
      <li class="nav-item"><a class="nav-link nav-home" href="Home.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="packages.php">Packages</a></li>
      <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
    </ul>
    <div class="lang-switch mt-4">
      <button class="btn btn-sm btn-lang active" id="btn-en-side" type="button">En</button>
      <button class="btn btn-sm btn-lang" id="btn-ar-side" type="button">Ar</button>
    </div>
    <button class="btn btn-gold mt-3" id="btn-gold-side">Request Consultation</button>
  </div>
  <div id="sideNavOverlay" class="side-nav-overlay"></div>

  <div id="consultationModal" class="modal fade" tabindex="-1" aria-labelledby="consultationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="consultationModalLabel">Request Consultation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="consultationForm">
          <div class="modal-body p-0">
            <div class="mb-3">
              <label for="consultName" class="form-label">Name</label>
              <input type="text" class="form-control" id="consultName" name="name" placeholder="Enter your full name"
                required aria-describedby="consultNamePlaceholder">
              <span id="consultNamePlaceholder" class="visually-hidden">Enter your full name</span>
            </div>
            <div class="mb-3">
              <label for="consultEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="consultEmail" name="email"
                placeholder="Enter your email address" required aria-describedby="consultEmailPlaceholder">
              <span id="consultEmailPlaceholder" class="visually-hidden">Enter your email address</span>
            </div>
            <div class="mb-3">
              <label for="consultPhone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="consultPhone" name="phone"
                placeholder="Enter your phone number" aria-describedby="consultPhonePlaceholder">
              <span id="consultPhonePlaceholder" class="visually-hidden">Enter your phone number</span>
            </div>
            <div class="mb-3">
              <label for="consultService" class="form-label">Service Interested In</label>
              <input type="text" class="form-control" id="consultService" name="service"
                placeholder="Specify the service you need" aria-describedby="consultServicePlaceholder">
              <span id="consultServicePlaceholder" class="visually-hidden">Specify the service you need</span>
            </div>

          </div>
          <div class="mb-3">
            <label for="consultMessage" class="form-label">Message</label>
            <textarea class="form-control" id="consultMessage" name="message" rows="3"
              placeholder="Describe your consultation needs" aria-describedby="consultMessagePlaceholder"></textarea>
            <span id="consultMessagePlaceholder" class="visually-hidden">Describe your consultation needs</span>
          </div>
          <div class="modal-footer d-flex justify-content-between flex-column  align-items-center p-0">
            <div class="mt-3">
              <label class="policy-checkbox">
                <input type="checkbox" id="policy-agree" name="policy_agree" required
                  aria-describedby="policyPlaceholder">
                <span class="policy-label">
                  I agree to the <a href="policies.php" class="terms-link">Policies</a>
                </span>
              </label>
              <span id="policyPlaceholder" class="visually-hidden">Agree to the policies</span>
            </div>
            <button type="submit" class="btn btn-submit w-100" id="consultationSubmit">Send Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add this before your script.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/script.js"></script>
</body>

</html>