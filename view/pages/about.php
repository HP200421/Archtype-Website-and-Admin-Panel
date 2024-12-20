<?php
include '../../config.php';
include '../layout/head.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'about';
$awardName = isset($_GET['name']) ? urldecode($_GET['name']) : null;
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
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled category-list-item">
                <li><a href="<?= LINK; ?>about/awards">Awards</a></li>
                <li><a href="<?= LINK; ?>about/news">News</a></li>
            </ul>
        </div>

        <div class="col-12 col-lg-9 custom-margin">
            <div class="post-details about-us">
                <?php
                if ($page === 'awards') {
                    if ($awardName) {
                        // Specific award logic
                        include 'award-details.php';
                    } else {
                        // General awards page
                        include 'awards.php';
                    }
                } elseif ($page === 'news') {
                    include 'news.php';
                } else {
                    ?>
                    <p>Archetype is a design firm seamlessly integrating architecture, interiors, and landscape to create unique spatial experiences.
                    Archetype has projects across India, providing integral design solutions with an exemplary eye for detailing.
                    An innovative approach to each project has been a defining characteristic throughout 25 years of practice.</p>
                    <p>A young team of architects and interior designers, under the guidance of Ar. Prakash Chandak, has developed a distinct style of presentation and detailing, offering clear visualization for understanding designs and ensuring immaculate execution. In parallel, Archetype pioneers various social and cultural initiatives.</p>
                    <p>The firm applies inherent research in materials and methodical practices to contribute to sustainable and environmental causes. Promoting local resources has been a key factor at Archetype, contributing to socio-economic development.</p>
                    <div class="team-section">
                        <h3 class="text-center fs-4">Meet Our Team</h3>
                        <div class="row text-uppercase">
                            <div class="col-12 col-md-4 mb-4">
                                <div class="team-member text-center">
                                    <img src="<?= LINK; ?>assets/images/Prakash.jpeg" alt="Prakash Chandak" class="img-fluid">
                                    <h4 class="mt-2">Ar. Prakash Chandak</h4>
                                    <h4 class="text-capitalize text-secondary designation">Founder</h4>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <div class="team-member text-center"> 
                                    <img src="<?= LINK; ?>assets/images/Sanuja.jpeg" alt="Sanuja Kurkure" class="img-fluid">
                                    <h4 class="mt-2">Sanuja Kurkure</h4>
                                    <h4 class="text-capitalize text-secondary designation">Senior Architect</h4>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <div class="team-member text-center">
                                    <img src="<?= LINK; ?>assets/images/Nilesh.jpeg" alt="Nilesh Baheti" class="img-fluid">
                                    <h4 class="mt-2">Nilesh Baheti</h4>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <div class="team-member text-center">
                                    <img src="<?= LINK; ?>assets/images/Atul.jpeg" alt="Atul Malpani" class="img-fluid">
                                    <h4 class="mt-2">Atul Malpani</h4>
                                    <h4 class="text-capitalize text-secondary designation">Interior Designer</h4>
                                </div>
                            </div>

                            <!-- Add more team members here as needed -->
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
