<?php
// File path to your JSON data
$dataFilePath = '../../data/awards.json'; 

// Check if the data file exists and load it
if (file_exists($dataFilePath)) {
    $jsonData = file_get_contents($dataFilePath);
    $awards = json_decode($jsonData, true);
    
    if ($awards === null) {
        echo "Error decoding JSON data.";
    }
} else {
    echo "Data file not found.";
}

$awardSlug = isset($_GET['name']) ? urldecode($_GET['name']) : null;
$currentAward = null;

// If the 'name' parameter exists, convert the slug back to the original name and find the corresponding award
if ($awardSlug && !empty($awards)) {
    // Convert the slug back to the original award name
    $awardName = convertSlugToString($awardSlug);

    // Now, search for the award using the original name
    foreach ($awards as $award) {
        if ($award['name'] === $awardName) {
            $currentAward = $award;
            break;
        }
    }
}

?>

<div class="award-details-section">
    <?php if ($currentAward): ?>
        <!-- Award Title -->
        <div class="row">
            <div class="col-12">
                <!-- Award Description -->
                <div id="award-details" class="post-details text-center mb-3">
                 <?php echo htmlspecialchars($currentAward['name']); ?> <br>
                 <?php echo nl2br(htmlspecialchars($currentAward['description'])); ?>
             </div>
            </div>
        </div>

        <!-- Award Images Gallery -->
        <div class="post-images">
        <!-- Display the thumbnail image first -->
            <?php if (!empty($currentAward['imgUrl'])): ?>
                <div class="gallery-item mb-4">
                    <a href="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($currentAward['imgUrl']); ?>" 
                       alt="<?php echo htmlspecialchars($currentAward['description']); ?>" 
                       class="fancybox" 
                       data-fancybox="gallery">
                        <img src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($currentAward['imgUrl']); ?>" 
                             alt="<?php echo htmlspecialchars($currentAward['description']); ?>" 
                             class="post-image mb-4"/>
                    </a>
                </div>
            <?php endif; ?>

    <!-- Display the pdfImages -->
            <?php if (!empty($currentAward['pdfImages'])): ?>
                <div class="row">
                    <?php foreach ($currentAward['pdfImages'] as $image): ?>
                        <div class="gallery-item mb-4">
                            <a href="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($image['imgUrl']); ?>" 
                               alt="<?php echo htmlspecialchars($image['description']); ?>" 
                               class="fancybox" 
                               data-fancybox="gallery">
                                <img src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($image['imgUrl']); ?>" 
                                     alt="<?php echo htmlspecialchars($image['description']); ?>" 
                                     class="post-image mb-4"/>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No images available for this award.</p>
            <?php endif; ?>
    </div>

    <?php else: ?>
        <!-- Award not found message -->
        <p>Award not found or invalid URL.</p>
    <?php endif; ?>
</div>
