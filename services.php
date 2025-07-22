<?php 
/**
 * Services Page
 * This page displays the services offered by the consulting company
 */

// Include the main header (navigation, meta tags, etc.)
include 'includes/header.php'; 
?>

<?php 
// Set up breadcrumb navigation for the services page
$breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],    // Link back to home page
  ['label' => 'Services']                      // Current page (no URL needed)
];

// Display the breadcrumb navigation
include 'components/breadcrumb.php'; 
?>

<?php 
// Display the main services selection section
include 'components/select-section.php'; 
?>

<?php 
// Include the footer with contact info and links
include 'includes/footer.php'; 
?> 