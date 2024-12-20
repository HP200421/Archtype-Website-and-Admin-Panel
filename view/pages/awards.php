<?php
$dataFilePath = '../../data/awards.json'; 

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
            <!-- Display award thumbnails -->
<?php if (!empty($awards)): ?>
    <?php foreach ($awards as $award): ?>
        <!-- <div class="col-12 col-sm-6 col-lg-4 mb-4"> -->
        <div class="col-6 col-md-4 col-lg-3 mb-4"> 
            <div class="h-100 gallery-item">
                <?php 
                // Create a slug from the award name
                $awardSlug = createSlug($award['name']);
                ?>
                <a href="<?= LINK; ?>about/awards/<?php echo htmlspecialchars($awardSlug); ?>">
                    <img loading="lazy" src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['thumbnail']); ?>" 
                         alt="<?php echo htmlspecialchars($award['name']); ?>" 
                         class="thumbnail-image" />
                </a>
                <div class="awards-section-content">
                    <div class="text-uppercase"><?php echo htmlspecialchars($award['name']); ?></div>
                    <div class="thumnail-description"><?php echo htmlspecialchars($award['thumbdes']); ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>No awards data available.</p>
    <?php endif; ?>
    </div>
</div>
