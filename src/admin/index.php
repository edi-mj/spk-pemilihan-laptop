<?php
$page = "Dashboard";
include_once './layout/html_head.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';
require BASEPATH . '/src/validate.php';

?>

<body>
  <!-- CONTAINER -->
  <div>
    <?php include_once BASEPATH . '/src/admin/layout/navbar.php' ?>
    <!-- MAIN CONTENT -->
    <div class="d-flex" style="padding-left: 15%;">
      <div id="content" class="w-75 p-5 bg-body-secondary flex-grow-1 min-vh-100">
        <h4 class="text-center">Selamat datang <span class="text-primary">Admin</span></h4>
        <div class="container d-flex gap-5 p-5 justify-content-center">
          <div class="card mb-3 w-25">
            <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-center align-items-center bg-primary">
                <span class="bi bi-people-fill w-100 fs-1 text-center"><span>
              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h2 class="card-title"><?= countUsers(); ?></h2>
                  <p class="card-text">Users</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3 w-25">
            <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-center align-items-center bg-primary">
                <span class="bi bi-laptop w-100 fs-1 text-center"><span>
              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h2 class="card-title"><?= countAlternatif(); ?></h2>
                  <p class="card-text">Alternatif</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3 w-25">
            <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-center align-items-center bg-primary">
                <span class="bi bi-card-list w-100 fs-1 text-center"><span>
              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h2 class="card-title"><?= countKriteria(); ?></h2>
                  <p class="card-text">Kriteria</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>