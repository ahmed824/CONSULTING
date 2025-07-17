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
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="  nav-container py-4">
    <nav class="navbar navbar-expand-lg container mx-auto rounded-full px-4 py-2">
      <div class="container-fluid justify-content-center">
        <a class="navbar-brand px-3" href="#">
          <img src="assets/images/Logo.svg" alt="Consulting Logo">
        </a>
        <ul class="navbar-nav flex-row gap-3 align-items-center mx-auto">
          <li class="nav-item"><a class="nav-link nav-home active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Clients</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2 ms-3">
          <div class="lang-switch">
            <button class="btn btn-sm btn-lang active">En</button>
            <button class="btn btn-sm btn-lang">Ar</button>
          </div>
          <a href="#" class="btn btn-gold ms-2">Request Consultation</a>
        </div>
      </div>
    </nav>
  </div>

  <script src="assets/js/script.js"></script>
</body>

</html>