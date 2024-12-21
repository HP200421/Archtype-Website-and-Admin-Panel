<?php
include '../../config.php';
include '../layout/head.php';
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
        
        <div class="col-12 col-6 col-lg-3 contact">
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled">
                <li><a href="/archtype" class="text-decoration-none text-dark">Back to Home</a></li>
            </ul>
        </div>
        
        <div class="col-12 col-lg-9 custom-margin d-flex flex-column">
          <form id="contact-form" action="" method="post" class="mb-lg-4 contact-form order-2 order-lg-1">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="name" class="form-label font-weight-bold">Name*</label>
                <input
                type="text"
                name="name"
                class="form-control shadow-none"
                id="name"
                placeholder="Your Name"
                required
                />
              </div>
              <div class="col-md-6 mt-3 mt-md-0">
                <label for="email" class="form-label">Email*</label>
                <input
                type="email"
                class="form-control shadow-none"
                name="email"
                id="email"
                placeholder="Your Email"
                required
                />
              </div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject*</label>
              <input
              type="text"
              class="form-control shadow-none"
              name="subject"
              id="subject"
              placeholder="Subject"
              required
              />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message*</label>
              <textarea
              class="form-control shadow-none"
              name="message"
              id="message"
              placeholder="Enter your message......."
              rows="2"
              required
              ></textarea>
            </div>
            <div id="form-messages" class="my-3"></div>
            <div class="text-center">
              <button type="submit" class="btn btn-dark">Send Message</button>
            </div>
          </form>
          <div class="address-map-container order-1 order-lg-2">
            <div class="address">
                <h5>Address</h5>
                <p>
                    10, Satsang Society, Near Vaikunth (Niwara),<br>
                    Navi Peth, Off. L. B. Shastri Road,<br>
                    Pune – 411030.<br>
                    Tel: 020 2951 1177<br>
                    Email: <a href="mailto:info@archtype.in">info@archtype.in</a>
                </p>
            </div>
            <div class="map">
                <h5>Location</h5>
                <iframe 
                    src="https://www.google.com/maps/d/u/0/embed?mid=1-zU0Out0PFFdN4wmO9h6I0vNg0Q&hl=en&ll=18.507456999999988%2C73.84169700000001&z=17"
                    loading="lazy">
                </iframe>
            </div>
          </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
