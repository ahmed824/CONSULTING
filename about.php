<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'About Us']
];
include 'includes/breadcrumb.php'; ?>
<div class="about-page pb-5 mb-5">
  <?php include 'components/stats-section.php'; ?>
  <!-- Our Categories Section (Service Categories) -->
  <?php include 'components/our-categories-section.php'; ?>
  <div class="clients-page py-5">
    <?php include 'components/clients.php'; ?>
  </div>
</div>
<?php include 'includes/footer.php'; ?>