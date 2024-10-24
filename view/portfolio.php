<?php
include '../config.php';
include 'layout/head.php';

// Get the main category and subcategory from the URL
$categorySlug = $_GET['category'] ?? '';
$subCategorySlug = $_GET['subcategory'] ?? '';

$categories = [];
$posts = [];

// Check if a category is selected
if ($categorySlug) {
    // Fetch the main category ID from the database based on the slug
    $stmt = $conn->prepare("SELECT id FROM main_category WHERE slug = ?");
    $stmt->bind_param("s", $categorySlug);
    $stmt->execute();
    $stmt->bind_result($categoryId);
    $stmt->fetch();
    $stmt->close();

    // If the main category is found
    if ($categoryId) {
        // Fetch the subcategories for the selected main category
        $stmt = $conn->prepare("SELECT subcategory_name, slug FROM sub_category WHERE main_category_id = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $categories[$categorySlug][] = $row;  // Store both subcategory name and slug
        }
        
        $stmt->close();

        // Fetch posts based on main category and optional subcategory
        if ($subCategorySlug) {
            // Fetch posts by both main category and subcategory
            $stmt = $conn->prepare("
                SELECT posts.* FROM posts 
                JOIN sub_category ON sub_category.id = posts.sub_id 
                WHERE posts.main_id = ? AND sub_category.slug = ?
            ");
            $stmt->bind_param("is", $categoryId, $subCategorySlug);
        } else {
            // Fetch posts only by main category
            $stmt = $conn->prepare("SELECT * FROM posts WHERE main_id = ?");
            $stmt->bind_param("i", $categoryId);
        }

        $stmt->execute();
        $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
} else {
    echo "No category selected.";
}

$conn->close();
?>

<!-- HTML Starts -->
<div id="gradient"></div>
<div class="container">
    <div class="row sample">
        <div class="col-12 col-sm-6 col-lg-3 custom-burger p-0">
            <?php include 'includes/burger.php'; ?>
        </div>
        <div class="col-12 col-sm-6 col-lg-9 p-0">
            <?php include 'includes/breadcrumb.php'; ?>
        </div>

        <!-- Categories Section -->
        <div class="col-12 col-sm-6 col-lg-3 p-0">
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled">
                <li><a href="/archtype/portfolio/<?php echo htmlspecialchars($categorySlug); ?>" class="text-decoration-none text-dark">All</a></li>
                <?php foreach ($categories[$categorySlug] ?? [] as $subCategory): ?>
                    <li>
                        <a href="/archtype/portfolio/<?php echo htmlspecialchars($categorySlug); ?>/<?php echo htmlspecialchars($subCategory['slug']); ?>" 
                            class="text-decoration-none text-dark">
                            <?php echo htmlspecialchars($subCategory['subcategory_name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Content Section -->
        <div class="col-12 col-sm-6 col-lg-9">
            <div class="content">
                <?php if (!empty($posts)): ?>
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-5"> 
                                <div class="post">
                                    <?php
                                        $image = json_decode($post['thumbnail_image'], true);
                                        if (is_array($image) && !empty($image)):
                                            $firstImage = $image[0];
                                    ?>
                                        <a href="/archtype/portfolio/<?php echo htmlspecialchars($categorySlug); ?>/<?php echo htmlspecialchars($subCategory['slug']); ?>/<?php echo htmlspecialchars($post['slug']); ?>" class="post-link"> 
                                            <img loading="lazy" src="<?php echo htmlspecialchars(LINK . 'uploads/' . $firstImage); ?>"  class="thumbnail-image" />
                                        </a>
                                        <div class="post-title"><?php echo htmlspecialchars($post['post_name']); ?></div>
                                        <div class="post-location"><?php echo htmlspecialchars($post['location']); ?></div>
                                    <?php else: ?>
                                        <p>No images available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <h2>No posts found.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
