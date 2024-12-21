<?php
$page = "Alternatif";
include_once './layout/html_head.php';
require BASEPATH . '/src/validate.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

$errors = [];
if (isset($_POST['tambah'])) {
  $_POST['harga'] = preg_replace("/[^0-9]/", "", $_POST['harga']);
  $_POST['ram'] = preg_replace("/[^0-9]/", "", $_POST['ram']);
  $_POST['kapasitas-storage'] = preg_replace("/[^0-9]/", "", $_POST['kapasitas-storage']);
  $_POST['kapasitas-baterai'] = preg_replace("/[^0-9]/", "", $_POST['kapasitas-baterai']);
  $_POST['berat'] = preg_replace("/[^0-9\.]/", "", $_POST['berat']);
  $model = $_POST['model'];
  $harga = $_POST['harga'];
  $ram = $_POST['ram'];
  $tipeStorage = $_POST['tipe-storage'];
  $kapasitasStorage = $_POST['kapasitas-storage'];
  $kapasitasBaterai = $_POST['kapasitas-baterai'];
  $berat = $_POST['berat'];
  $kategori = $_POST['kategori'] ?? [];

  validateModel($errors, $model);
  validateNumeric($errors, 'harga', $harga);
  validateNumeric($errors, 'ram', $ram);
  validateTipeStorage($errors, $tipeStorage);
  validateNumeric($errors, 'kapasitas-storage', $kapasitasStorage);
  validateNumeric($errors, 'kapasitas-baterai', $kapasitasBaterai);
  validateKategori($errors, $kategori);
  validateNumeric($errors, 'berat', $berat);
  $gambar = validateGambar($errors);

  $modelValue = htmlspecialchars($model);
  $hargaValue = htmlspecialchars($harga);
  $ramValue = htmlspecialchars($ram);
  $tipeStorageValue = htmlspecialchars($tipeStorage);
  $kapasitasStorageValue = htmlspecialchars($kapasitasStorage);
  $kapasitasBateraiValue = htmlspecialchars($kapasitasBaterai);
  $beratValue = htmlspecialchars($berat);

  if (!$errors) {
    addAlternatif($_POST, $gambar);

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

      <div class="w-75 mx-auto p-4 bg-body-tertiary shadow rounded">
        <h3 class="text-center pb-4">Tambah Alternatif</h3>
        <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
          <div class="col-md-6">
            <label for="model" class="form-label">Model <span class="text-danger ">
                <?= $errors['model'] ?? '' ?>
              </span></label>
            <input type="text" id="model" name="model" value="<?= ($modelValue) ?? '' ?>" class="form-control">

          </div>
          <div class="col-md-6">
            <label for="gambar" class="form-label">Gambar <span class="text-danger ">
                <?= $errors['gambar'] ?? '' ?>
              </span></label>
            <input name="gambar" class="form-control" type="file" id="gambar">

          </div>
          <div class=" col-md-6">
            <label for="harga" class="form-label">Harga <span class="text-danger">
                <?= $errors['harga'] ?? '' ?>
              </span></label>
            <input type="text" id="harga" name="harga" value="<?= ($hargaValue) ?? '' ?>" class="form-control">

          </div>
          <div class="col-md-6">
            <label for="ram" class="form-label">RAM (GB) <span class="text-danger">
                <?= $errors['ram'] ?? '' ?>
              </span></label>
            <input type="text" id="ram" name="ram" value="<?= ($ramValue) ?? '' ?>" class="form-control">

          </div>
          <div class=" col-md-6">
            <label for="tipe-storage" class="form-label">Tipe Storage <span class="text-danger">
                <?= $errors['tipe-storage'] ?? '' ?>
              </span></label>
            <input type="text" id="tipe-storage" name="tipe-storage" value="<?= ($tipeStorageValue) ?? '' ?>" class="form-control">

          </div>
          <div class=" col-md-6">
            <label for="kapasitas-storage" class="form-label">Kapasitas Storage (GB)<span class="text-danger">
                <?= $errors['kapasitas-storage'] ?? '' ?>
              </span></label>
            <input type="text" id="kapasitas-storage" name="kapasitas-storage" value="<?= ($kapasitasStorageValue) ?? '' ?>" class="form-control">

          </div>
          <div class=" col-md-6">
            <label for="kapasitas-baterai" class="form-label">Kapasitas Baterai (Wh)<span class="text-danger">
                <?= $errors['kapasitas-baterai'] ?? '' ?>
              </span></label>
            <input type="text" id="kapasitas-baterai" name="kapasitas-baterai" value="<?= ($kapasitasBateraiValue) ?? '' ?>" class="form-control">

          </div>
          <div class=" col-md-6">
            <label for="berat" class="form-label">Berat (KG) <span class="text-danger">
                <?= $errors['berat'] ?? '' ?>
              </span></label>
            <input type="text" id="berat" name="berat" value="<?= ($beratValue) ?? '' ?>" class="form-control">

          </div>
          <label class="form-label mb-0">Kategori <span class="text-danger">
              <?= $errors['kategori'] ?? '' ?>
            </span></label>
          <div class="col-md-3">
            <input class="form-check-input" style="outline: 1px solid black;" type="checkbox" id="gaming" name="kategori[]" value="gaming" <?= (isset($kategori) && !empty($kategori) && in_array("gaming", $kategori)) ? 'checked' : '' ?>>
            <label class="form-check-label" for="gaming">Gaming</label>
          </div>
          <div class="col-md-3">
            <input class="form-check-input" style="outline: 1px solid black;" type="checkbox" id="design/editing" name="kategori[]" value="design/editing" <?= (isset($kategori) && !empty($kategori) && in_array("design/editing", $kategori)) ? 'checked' : '' ?>>
            <label class="form-check-label" for="design/editing">Design/Editing</label>
          </div>
          <div class="col-md-3">
            <input class="form-check-input" style="outline: 1px solid black;" type="checkbox" id="kuliah/kerja" name="kategori[]" value="kuliah/kerja" <?= (isset($kategori) && !empty($kategori) && in_array("kuliah/kerja", $kategori)) ? 'checked' : '' ?>>
            <label class="form-check-label" for="kuliah/kerja">Kuliah/Kerja</label>
          </div>
          <div class="col-md-3">
            <input class="form-check-input" style="outline: 1px solid black;" type="checkbox" id="programming" name="kategori[]" value="programming" <?= (isset($kategori) && !empty($kategori) && in_array("programming", $kategori)) ? 'checked' : '' ?>>
            <label class="form-check-label" for="programming">Programming</label>
          </div>


          <div class="col-12 mt-5">
            <button name="tambah" type="submit" class="btn btn-success w-100">Tambah</button>
            <a class="btn btn-secondary w-100 mt-2" href="./alternatif.php">Batal</a>
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