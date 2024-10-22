<?php
// Get the current URL path
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = array_filter(explode('/', trim($currentPath, '/'))); // Filter out any empty segments

// Initialize an empty array for breadcrumb items
$breadcrumbItems = [];

// Loop through the segments to build the breadcrumb items
foreach ($segments as $index => $segment) {

  // Skip the first item (web root)
  if($index === 0 || $index === 1) {
    continue;
  }
    // Create the link for the current segment
    $link = '/' . implode('/', array_slice($segments, 0, $index + 1));
    
    // Add the segment as a breadcrumb item
    if ($index === count($segments) - 1) {
        // Last item is the active page, make it bold
        $breadcrumbItems[] = [
            'name' => ucfirst($segment),
            'link' => '',
            'isActive' => true,
        ];
    } else {
        $breadcrumbItems[] = [
            'name' => ucfirst($segment),
            'link' => $link,
            'isActive' => false,
        ];
    }
}
?>

<nav aria-label="breadcrumb" class="bread">
  <ol class="breadcrumb">
    <?php foreach ($breadcrumbItems as $index => $item): ?>
      <li class="breadcrumb-item fs-5 <?php echo $index === count($breadcrumbItems) - 1 ? ' active' : ''; ?>" aria-current="<?php echo $index === count($breadcrumbItems) - 1 ? 'page' : ''; ?>">
        <?php if ($index !== count($breadcrumbItems) - 1): ?>
          <?php echo convertSlugToString(htmlspecialchars($item['name'])); ?>
        <?php else: ?>
          <strong><?php echo convertSlugToString(htmlspecialchars($item['name'])); ?></strong>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
