<?php
// Breadcrumb component for internal pages
// Usage: include and set $breadcrumb_items = [['label' => 'Home', 'url' => 'Home.php'], ...];
if (!isset($breadcrumb_items) || !is_array($breadcrumb_items)) {
  $breadcrumb_items = [
    ['label' => 'Home', 'url' => 'Home.php']
  ];
}
?>
<nav aria-label="breadcrumb" class="breadcrumb-nav py-2 mb-4">
  <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
    <?php foreach ($breadcrumb_items as $index => $item): ?>
      <?php if ($index < count($breadcrumb_items) - 1): ?>
        <li class="breadcrumb-item">
          <a href="<?php echo htmlspecialchars($item['url']); ?>" class="breadcrumb-link">
            <?php echo htmlspecialchars($item['label']); ?>
          </a>
        </li>
      <?php else: ?>
        <li class="breadcrumb-item active text-gold" aria-current="page">
          <?php echo htmlspecialchars($item['label']); ?>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ol>
</nav> 