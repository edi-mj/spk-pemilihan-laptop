<?php
$page = "Alternatif";
include_once './layout/html_head.php';
include_once BASEPATH . '/src/sql.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

if (isset($_POST['hapus'])) {
  $deleted = hapusAlternatif($_GET['id_laptop']);

  if ($deleted) {
    header("Location:alternatif.php");
    exit();
  }
}
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex" style="padding-left: 20%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="container min-vh-100 w-100 p-4 d-flex justify-content-center align-items-center">

      <div class="w-50 mx-auto p-4 bg-body-tertiary shadow rounded">
        <h3 class="text-center pb-3">Apakah Anda yakin?</h3>
        <p class="lead">
          Apakah Anda yakin ingin menghapus item <b><?= $_GET['model'] ?></b>? Aksi ini tidak dapat dikembalikan
        </p>
        <form action="" method="POST" class="row g-3 mt-3">
          <div class="col-6">
            <a class="btn btn-outline-secondary w-100" href="./alternatif.php">Batal</a>
          </div>
          <div class="col-6">
            <button name="hapus" type="submit" class="btn btn-danger w-100">Hapus</button>
          </div>
        </form>
      </div>
    </div>
    <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>