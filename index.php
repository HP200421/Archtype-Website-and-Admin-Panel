<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARCHTYPE</title>
    <link rel="stylesheet" href="<?= LINK; ?>assets/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= LINK; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= LINK; ?>assets/vendor/owlcarousel/assets/owl.carousel.css" />
    <link rel="stylesheet" href="<?= LINK; ?>assets/vendor/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= LINK; ?>assets/css/main.css" />

  </head>
  <body class="roboto-thin">
    <main>
      <section class="hero">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <img src="<?= LINK; ?>assets/images/1.jpg" class="img" alt="Image 1" />
          </div>
          <div class="item">
            <img src="<?= LINK; ?>assets/images/2.jpg" class="img" alt="Image 2" />
          </div>
          <div class="item">
            <img src="<?= LINK; ?>assets/images/3.jpg" class="img" alt="Image 3"/>
          </div>
          <div class="item">
            <img src="<?= LINK; ?>assets/images/4.jpg" class="img" alt="Image 4" />
          </div>
          <div class="item">
            <img src="<?= LINK; ?>assets/images/5.jpg" class="img" alt="Image 5" />
          </div>
        </div>
      </section>
    </main>
    
    <!-- <div class="fixed-arch-div d-flex flex-column flex-lg-row justify-content-around align-items-end position-fixed w-100 z-index-5"> -->
    <!-- <div class="fixed-arch-div position-fixed w-100 z-index-5">
      <nav class="order-2 order-lg-1 animate-in">
        <ul class="list-unstyled d-flex fs-6 gap-4 mb-0 text-uppercase hero-link">
          <li><a href="<?= LINK; ?>portfolio/architectural">Architecture</a></li>
          <li><a href="<?= LINK; ?>portfolio/interior">Interior</a></li>
        </ul>
      </nav>
      <div class="order-1 order-lg-2 mt-1 animate-in">
        <h1 class="text-white display-2 fw-normal">ARCHTYPE</h1>
         <img src="<?= LINK; ?>assets/images/logo.png" alt="">
      </div>
    </div> -->
    <div class="fixed-arch-div position-fixed w-100 z-index-5">
      <nav class="order-2 order-lg-2 order-md-2 animate-in">
        <ul class="list-unstyled d-flex fs-6 gap-4 mb-0 text-uppercase hero-link">
          <li><a href="<?= LINK; ?>portfolio/architectural">Architecture</a></li>
          <li><a href="<?= LINK; ?>portfolio/interior">Interiors</a></li>
        </ul>
      </nav>
      <div class="order-1 order-lg-1 order-md-1 mt-1 animate-in">
        <!-- <h1 class="text-white display-2 fw-normal">ARCHTYPE</h1> -->
        <img src="<?= LINK; ?>assets/images/logo.png" alt="">
      </div>
    </div>
    
    <div class="fixed-bottom-nav d-flex flex-column flex-lg-row justify-content-around position-fixed">
      <nav>
        <ul class="nav-list">
          <li><a href="<?= LINK; ?>portfolio/architectural">Architecture</a></li> 
          <li><a href="<?= LINK; ?>portfolio/interior">Interiors</a></li> 
          <li><a href="<?= LINK; ?>about">About</a></li>
          <li><a href="<?= LINK; ?>about/awards">Awards</a></li>
          <li><a href="<?= LINK; ?>about/news">News</a></li>
          <li><a href="<?= LINK; ?>contact">Contact</a></li>
        </ul>
      </nav>
      <div class="social-media">
        <a class="text-decoration-none text-reset" href="https://www.instagram.com/archtype.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
        <a class="text-decoration-none text-reset" href="https://www.facebook.com/archtype.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
        <a class="text-decoration-none text-reset" href="mailto:info@archtype.in" target="_blank" rel="noopener noreferrer"><i class="bi bi-envelope"></i></a>
      </div>
    </div>


    <script src="<?= LINK; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= LINK; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= LINK; ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= LINK; ?>assets/vendor/owlcarousel/owl.carousel.js"></script>
    <script src="<?= LINK; ?>assets/vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= LINK; ?>assets/js/main.js"></script>
  </body>
</html>
