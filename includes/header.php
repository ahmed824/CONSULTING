<?php
// Header include with Bootstrap
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-papm6r+Y6U6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6QKq+6Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
        <a class="navbar-brand " href="#">
          <img src="assets/images/Logo.svg" alt="Consulting Logo">
        </a>
        <!-- Nav links for large screens -->
        <ul class="navbar-nav flex-row gap-3 align-items-center mx-auto d-none d-lg-flex">
          <li class="nav-item"><a class="nav-link nav-home" href="Home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
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
      <a class="navbar-brand px-3" href="#">
        CONSULTING <span class="contact-info-nav"></span>
      </a>
      <button class="close-btn" id="sideNavClose" aria-label="Close navigation">&times;</button>
    </div>
    <ul class="navbar-nav flex-column gap-3 align-items-start mt-4">
      <li class="nav-item"><a class="nav-link nav-home" href="Home.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
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
          <div class="modal-body">
            <div class="mb-3">
              <label for="consultName" class="form-label">Name</label>
              <input type="text" class="form-control" id="consultName" name="name" required>
            </div>
            <div class="mb-3">
              <label for="consultEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="consultEmail" name="email" required>
            </div>
            <div class="mb-3">
              <label for="consultPhone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="consultPhone" name="phone">
            </div>
            <div class="mb-3">
              <label for="consultService" class="form-label">Service Interested In</label>
              <input type="text" class="form-control" id="consultService" name="service">
            </div>
            <div class="mb-3">
              <label for="consultMessage" class="form-label">Message</label>
              <textarea class="form-control" id="consultMessage" name="message" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-gold">Send Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>

</html>