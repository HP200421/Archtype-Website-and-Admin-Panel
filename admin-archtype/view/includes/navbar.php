<div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
        >
          <a class="navbar-brand brand-logo me-5" href="<?= LINK; ?>dashboard"
            >
        <span>ARCH</span>TYPE
        </a>
          <a class="navbar-brand brand-logo-mini" href="<?= LINK; ?>dashboard">
            AT
          </a>
        </div>
        <div
          class="navbar-menu-wrapper d-flex align-items-center justify-content-end"
        >
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize"
          >
            <span class="icon-menu"></span>
          </button>
          <div class="navbar-nav ms-auto">
            <a class="nav-link d-flex align-items-center text-dark gap-2" href="<?= LINK; ?>index/logout">
              Logout
              <i class="ti-power-off me-2"></i> 
            </a>
          </div>


          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas"
          >
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
</div>
<div class="main-panel">
  <div class="content-wrapper">