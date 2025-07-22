<?php include 'includes/header.php'; ?>
<?php $breadcrumb_items = [
  ['label' => 'Home', 'url' => 'Home.php'],
  ['label' => 'Clients']
];
include 'includes/breadcrumb.php'; ?>

<div class="clients-page py-5">
<?php include 'components/clients.php'; ?>
</div>

<?php include 'includes/footer.php'; ?> 