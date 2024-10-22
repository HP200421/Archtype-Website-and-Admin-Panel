<?php
include '../config.php';
include 'layout/head.php';

// Function to fetch post by slug
function getPostBySlug($conn, $slug) {
    $stmt = $conn->prepare("SELECT * FROM posts WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $post = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $post;
}

// Get the post slug from the URL
$postSlug = $_GET['post'] ?? '';
$images = [];

// If a post slug is provided, fetch the post details
if ($postSlug) {
    $post = getPostBySlug($conn, $postSlug);
    // Get the images from the post's thumbnail_image
    $images = json_decode($post['post_images'], true);
}

$conn->close();
?>

<div id="gradient"></div>
<div class="container">
    <div class="row sample">
        <div class="col-6 col-lg-3 custom-burger">
            <?php include 'includes/burger.php'; ?>
        </div>
        <div class="col-12 col-sm-6 col-lg-9">
            <?php include 'includes/breadcrumb.php'; ?>
        </div>

        <div class="col-6 col-lg-3">
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled">
                <li><a href="/archtype/portfolio/<?php echo htmlspecialchars($categorySlug); ?>" class="text-decoration-none text-dark">View All Projects</a></li>
                <li><a href="/archtype/portfolio/<?php echo htmlspecialchars($categorySlug); ?>" class="text-decoration-none text-dark">Project Highlights</a></li>
            </ul>
        </div>
 
        <div class="col-12 col-lg-9">
            <!-- <h1><?php echo htmlspecialchars($post['post_name']); ?></h1> -->
            <div class="post-images">
                <?php if (!empty($images)): ?>
                    <div class="row">
                        <?php foreach ($images as $image): ?>
                            <div class="gallery-item w-100">
                                <a href="<?php echo htmlspecialchars(LINK . 'uploads/' . $image); ?>" alt="<?php echo htmlspecialchars($post['post_name']); ?>" class="fancybox" data-fancybox="gallery">
                                    <img src="<?php echo htmlspecialchars(LINK . 'uploads/' . $image); ?>" alt="<?php echo htmlspecialchars($post['post_name']); ?>" class="post-image mb-4"/>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No images available.</p>
                <?php endif; ?>
            </div>
            <div class="post-description">
                <p><?php echo $post['details']; ?></p>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
