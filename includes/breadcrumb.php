<?php
// Breadcrumb component for internal pages
// Usage: include and set $breadcrumb_items = [['label' => 'Home', 'url' => 'Home.php'], ...];
if (!isset($breadcrumb_items) || !is_array($breadcrumb_items)) {
  $breadcrumb_items = [
    ['label' => 'Home', 'url' => 'Home.php']
  ];
}
?>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
  <ol class="breadcrumb-container">
    <?php foreach ($breadcrumb_items as $index => $item): ?>
      <?php if ($index < count($breadcrumb_items) - 1): ?>
        <li class="breadcrumb-item">
          <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>" class="breadcrumb-link">
            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </li>
      <?php else: ?>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">
          <h1> <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></h1>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ol>
</nav>