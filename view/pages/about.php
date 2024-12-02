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
                        <p>Archetype is a design firm seamlessly integrating architecture, interiors, and landscape to create unique spatial experiences.
                        Archetype has projects across India, providing integral design solutions with an exemplary eye for detailing.
                        An innovative approach to each project has been a defining characteristic throughout 25 years of practice.</p>
                        <p>A young team of architects and interior designers, under the guidance of Ar. Prakash Chandak, has developed a distinct style of presentation and detailing, offering clear visualization for understanding designs and ensuring immaculate execution. In parallel, Archetype pioneers various social and cultural initiatives.</p>
                        <p>The firm applies inherent research in materials and methodical practices to contribute to sustainable and environmental causes. Promoting local resources has been a key factor at Archetype, contributing to socio-economic development.</p>
                        <?php
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
