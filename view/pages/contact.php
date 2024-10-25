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
        <div class="col-12 col-sm-6 col-lg-9">
            <?php include '../includes/breadcrumb.php'; ?>
        </div>
        
        <div class="col-12 col-6 col-lg-3 contact">
            <ul id="category-list" class="ps-1 category-list categoryListVisible list-unstyled">
                <li><a href="/archtype" class="text-decoration-none text-dark">Back to Home</a></li>
            </ul>
        </div>
        
        <div class="col-12 col-lg-9">
          <form id="contact-form" action="" method="post" class="mb-4 contact-form">
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
              rows="5"
              required
              ></textarea>
            </div>
            <div id="form-messages" class="my-3"></div>
            <div class="text-center">
              <button type="submit" class="btn btn-dark">Send Message</button>
            </div>
          </form>
          <!-- <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1-zU0Out0PFFdN4wmO9h6I0vNg0Q&hl=en&ll=18.507456999999988%2C73.84169700000001&z=17"  style="width: 100%; height: 400px"  frameborder="0" allowfullscreen="" loading="lazy"></iframe> -->
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
