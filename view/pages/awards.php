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
        <?php if (!empty($awards)): ?>
            <?php foreach ($awards as $award): ?>
                <!-- Main Award Image -->
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="h-100 gallery-item">
                        <a href="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['imgUrl']); ?>" 
                           data-fancybox="gallery" 
                           data-caption="<?php echo htmlspecialchars($award['description']); ?>">
                            <img src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['imgUrl']); ?>" 
                                 alt="<?php echo htmlspecialchars($award['name']); ?>" 
                                 class="fancybox award-image" />
                        </a>
                        <div class="awards-section-content">
                            <div class="text-uppercase"><?php echo htmlspecialchars($award['name']); ?></div>
                            <p class="text-uppercase text-secondary"><?php echo htmlspecialchars($award['description']); ?></p>
                        </div>
                    </div>
                </div>

                <!-- PDF Images as JPGs -->
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="h-100 gallery-item">
                            <?php if (!empty($award['pdfImages'][$i])): ?>
                                <a href="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['pdfImages'][$i]['imgUrl']); ?>" 
                                   data-fancybox="gallery" 
                                   data-caption="<?php echo htmlspecialchars($award['pdfImages'][$i]['description']); ?>">
                                    <img src="<?= LINK; ?>assets/images/<?php echo htmlspecialchars($award['pdfImages'][$i]['imgUrl']); ?>" 
                                         alt="<?php echo htmlspecialchars($award['pdfImages'][$i]['description']); ?>" 
                                         class="fancybox award-image" />
                                </a>
                                <div class="awards-section-content">
                                    <p class="text-uppercase"><?php echo htmlspecialchars($award['pdfImages'][$i]['description']); ?></p>
                                </div>
                            <?php else: ?>
                                <!-- Empty placeholder to maintain layout -->
                                <div class="empty-placeholder"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No awards data available.</p>
        <?php endif; ?>
    </div>
</div>
