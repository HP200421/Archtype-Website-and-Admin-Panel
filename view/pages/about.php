<?php
include '../../config.php';
include '../layout/head.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'about';

?>

<div id="gradient"></div>
<div class="container">
    <div class="row sample">
        <div class="col-6 col-lg-3 custom-burger">
            <?php include '../includes/burger.php'; ?>
        </div>
        <div class="col-12 col-sm-6 col-lg-9 custom-margin">
            <?php include '../includes/breadcrumb.php'; ?>
        </div>

        <div class="col-12 col-6 col-lg-3">
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled">
                <li><a href="<?= LINK; ?>about/services" class="text-decoration-none text-dark">Services</a></li>
                <li><a href="<?= LINK; ?>about/awards" class="text-decoration-none text-dark">Awards</a></li>
                <li><a href="<?= LINK; ?>about/news" class="text-decoration-none text-dark">News</a></li>
            </ul>
        </div>

        <div class="col-12 col-lg-9 custom-margin">
            <div class="post-details about-us">
                <?php
                switch ($page) {
                    case 'awards':
                        include 'awards.php'; // Include awards content
                        break;
                    case 'services':
                        include 'services.php'; // Include services content
                        break;
                    case 'news':
                        include 'news.php'; // Include news content
                        break;
                    default:
                        ?>
                        <p>We design private houses, apartments, as well as public rooms and hotel complexes followed by project implementation. Detailing in our work is an inherent part of our designs. You can expect a no-compromising approach from us towards the quality and finishing of projects. Our focus remains on executing every detail to perfection.</p>
                        <p>We believe in a holistic approach to design, rather than focusing on individual items, ensuring the desired ambiance across the entire space. Innovation in design and style has always been our character, and we continually strive to push the boundaries of creativity.</p>
                        <p>Our team constantly researches new materials and their technical aspects, enhancing our design knowledge. We also maintain an in-house library of samples and brochures to provide ready data and references, ensuring informed design choices.</p>
                        <p>We excel at adding value through design features, artifacts, and landscaping, bringing a unique identity to each project. Our commitment to detailing and presentation helps in visualizing and executing every project with clarity and precision.</p>
                        <p>Collaboration between our team members, working across different categories of the project, is key to delivering the satisfaction our clients expect.</p>
                        <?php
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
