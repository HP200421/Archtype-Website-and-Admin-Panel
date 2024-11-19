<?php
$dataFilePath = '../../data/news.json'; 

if (file_exists($dataFilePath)) {
    $jsonData = file_get_contents($dataFilePath);
    
    $awards = json_decode($jsonData, true); 
  
    if ($awards === null) {
        echo "Error decoding JSON data.";
    }
} else {
    echo "Data file not found.";
}
?>

<div class="awards-section">
    <div class="row">
        <?php if (!empty($awards)): ?>
            <?php foreach ($awards as $award): ?>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="h-100 gallery-item">
                        <a href="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['imgUrl']); ?>" 
                           data-fancybox="gallery" 
                           data-caption="<?php echo htmlspecialchars($award['name']); ?>">
                            <img src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['imgUrl']); ?>" 
                                 alt="<?php echo htmlspecialchars($award['name']); ?>" 
                                 class="fancybox news-image" />
                        </a>
                        <div class="awards-section-content">
                            <div class="text-uppercase"><?php echo htmlspecialchars($award['name']); ?></div>
                            <p class="text-uppercase text-secondary"><?php echo htmlspecialchars($award['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news data available.</p>
        <?php endif; ?>
    </div>
</div>

