<?php
$page = "Kriteria";
include_once './layout/html_head.php';
require_once BASEPATH . '/src/validate.php';
require_once BASEPATH . '/src/sql.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

$dataKriteria = getKriteriaById($_GET['id_kriteria']);

$errors = [];
if (isset($_POST['tambah'])) {

  $namaKriteria = $_POST['nama-kriteria'];
  $atribut = $_POST['atribut'];
  $bobot = $_POST['bobot'];

  validateNamaKriteria($errors, $namaKriteria);
  validateBobot($errors, $bobot);

  $namaKriteriaValue = htmlspecialchars($namaKriteria);
  $bobotValue = htmlspecialchars($bobot);

  if (!$errors) {
    updateKriteria($_POST);

    header("Location:kriteria.php");
    exit();
  }
} else {
  $namaKriteriaValue = $dataKriteria['nama_kriteria'];
  $atributValue = $dataKriteria['atribut'];
  $bobotValue = $dataKriteria['bobot'];
}
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex " style="padding-left: 20%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 d-flex flex-grow-1 justify-content-center align-items-center" style="height: 100vh;">

      <div class="p-3 w-50 bg-body-tertiary shadow rounded">
        <h3 class="text-center pb-4">Edit Kriteria</h3>
        <form action="" method="POST">
          <input type="hidden" name="id-kriteria" value="<?= $_GET['id_kriteria'] ?>">
          <div class="mb-3">
            <label for="nama-kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" id="nama-kriteria" name="nama-kriteria" value="<?= ($namaKriteriaValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['nama-kriteria'] ?? '' ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="atribut" class="form-label">Atribut</label>
            <select id="atribut" name="atribut" class="form-select">
              <option value="cost" <?= (isset($atributValue) && $atributValue === "cost") ? 'selected' : '' ?>>Cost</option>
              <option value="benefit" <?= (isset($atributValue) && $atributValue === "benefit") ? 'selected' : '' ?>>Benefit</option>
            </select>
            <div class="text-danger ps-1">
              <?= $errors['atribut'] ?? '' ?>
            </div>
          </div>

          <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="text" id="bobot" name="bobot" value="<?= ($bobotValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['bobot'] ?? '' ?>
            </div>
          </div>
          <button name="tambah" type="submit" class="btn btn-success w-100">Edit</button>
        </form>
        <a class="btn btn-secondary w-100 mt-2" href="./kriteria.php">Batal</a>
      </div>
    </div>
    <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>