<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Archtype Admin</title>

    <link rel="stylesheet" href="<?= ASSET; ?>vendors/feather/feather.css" />
    <link
      rel="stylesheet"
      href="<?= ASSET; ?>vendors/ti-icons/css/themify-icons.css"
    />
    <link
      rel="stylesheet"
      href="<?= ASSET; ?>vendors/css/vendor.bundle.base.css"
    />
    <link
      rel="stylesheet"
      href="<?= ASSET; ?>vendors/font-awesome/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="<?= ASSET; ?>vendors/mdi/css/materialdesignicons.min.css"
    />

    <link
      rel="stylesheet"
      href="<?= ASSET; ?>css/style.css"
    />
   
    <link rel="shortcut icon" href="<?= ASSET; ?>images/favicon.png" />
  </head>
  <body>
  <input type="hidden" name="LINK" value="<?= LINK; ?>">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="<?= ASSET; ?>images/logo.svg" alt="logo" />
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="ajaxCall pt-3" action="login" method="post" class="pt-3">
                  <div class="form-group">
                    <input
                      type="email"
                      name="user_name"
                      class="form-control form-control-lg"
                      id="exampleInputEmail1"
                      placeholder="Username"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      type="password"
                      name="user_password"
                      class="form-control form-control-lg"
                      id="exampleInputPassword1"
                      placeholder="Password"
                    />
                  </div>
                  <div class="mt-3 d-grid gap-2">
                  <button
                      class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                      type="submit"
                      >Login</a
                    >
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ASSET; ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= ASSET; ?>js/login.js"></script>
    <script src="<?= ASSET; ?>js/config.js"></script>

  </body>
</html>
