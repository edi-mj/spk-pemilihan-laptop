<?php
$page = "Alternatif";
include_once './layout/html_head.php';
require BASEPATH . '/src/validate.php';

$dataAlternatif = getAlternatifById($_GET['id_laptop']);

$errors = [];
if (isset($_POST['edit'])) {

  $model = $_POST['model'];
  $harga = $_POST['harga'];
  $ram = $_POST['ram'];
  $tipeStorage = $_POST['tipe-storage'];
  $kapasitasStorage = $_POST['kapasitas-storage'];
  $kapasitasBaterai = $_POST['kapasitas-baterai'];
  $berat = $_POST['berat'];
  $kategori = $_POST['kategori'];
  $gambarLama = $dataAlternatif['gambar'];

  validateModel($errors, $model);
  validateNumeric($errors, 'harga', $harga);
  validateNumeric($errors, 'ram', $ram);
  validateTipeStorage($errors, $tipeStorage);
  validateNumeric($errors, 'kapasitas-storage', $kapasitasStorage);
  validateNumeric($errors, 'kapasitas-baterai', $kapasitasBaterai);
  validateNumeric($errors, 'berat', $berat);
  $gambar = editGambar($gambarLama);

  $modelValue = htmlspecialchars($model);
  $hargaValue = htmlspecialchars($harga);
  $ramValue = htmlspecialchars($ram);
  $tipeStorageValue = htmlspecialchars($tipeStorage);
  $kapasitasStorageValue = htmlspecialchars($kapasitasStorage);
  $kapasitasBateraiValue = htmlspecialchars($kapasitasBaterai);
  $beratValue = htmlspecialchars($berat);
  $kategoriValue = htmlspecialchars($kategori);

  if (!$errors) {
    updateAlternatif($_POST, $gambar);

    header("Location:alternatif.php");
    exit();
  }
} else {
  // DATA SEBELUM DIEDIT
  $modelValue = $dataAlternatif['model'];
  $hargaValue = $dataAlternatif['harga'];
  $ramValue = $dataAlternatif['RAM'];
  $tipeStorageValue = $dataAlternatif['tipe_storage'];
  $kapasitasStorageValue = $dataAlternatif['kapasitas_storage'];
  $kapasitasBateraiValue = $dataAlternatif['kapasitas_baterai'];
  $beratValue = $dataAlternatif['berat'];
  $kategoriValue = $dataAlternatif['nama_kategori'];
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
          <input type="hidden" name="id_laptop" value="<?= $_GET['id_laptop']; ?>">
          <div class=" col-md-6">
            <label for="model" class="form-label">Model</label>
            <input type="text" id="model" name="model" value="<?= ($modelValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['model'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" id="harga" name="harga" value="<?= ($hargaValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['harga'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="ram" class="form-label">RAM (GB)</label>
            <input type="text" id="ram" name="ram" value="<?= ($ramValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['ram'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="tipe-storage" class="form-label">Tipe Storage</label>
            <input type="text" id="tipe-storage" name="tipe-storage" value="<?= ($tipeStorageValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['tipe-storage'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="kapasitas-storage" class="form-label">Kapasitas Storage (GB)</label>
            <input type="text" id="kapasitas-storage" name="kapasitas-storage" value="<?= ($kapasitasStorageValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['kapasitas-storage'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="kapasitas-baterai" class="form-label">Kapasitas Baterai (mAh)</label>
            <input type="text" id="kapasitas-baterai" name="kapasitas-baterai" value="<?= ($kapasitasBateraiValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['kapasitas-baterai'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="berat" class="form-label">Berat (KG)</label>
            <input type="text" id="berat" name="berat" value="<?= ($beratValue) ?? '' ?>" class="form-control">
            <div class="text-danger ps-1">
              <?= $errors['berat'] ?? '' ?>
            </div>
          </div>
          <div class=" col-md-6">
            <label for="kategori" class="form-label">Kategori</label>
            <select id="kategori" name="kategori" class="form-select">
              <option <?= (isset($kategori) && $kategori === "Gaming") ? 'selected' : '' ?>>Gaming</option>
              <option <?= (isset($kategori) && $kategori === "Design/Editing") ? 'selected' : '' ?>>Design/Editing</option>
              <option <?= (isset($kategori) && $kategori === "Kuliah/Kerja Ringan") ? 'selected' : '' ?>>Kuliah/Kerja Ringan</option>
            </select>
            <div class="text-danger ps-1">
              <?= $errors['kategori'] ?? '' ?>
            </div>
          </div>
          <div class="col-md-6">
            <label for="gambar" class="form-label">Gambar</label>
            <input name="gambar" class="form-control" type="file" id="gambar">
            <div class="text-danger ps-1">
              <?= $errors['gambar'] ?? '' ?>
            </div>
          </div>
          <div class="col-12">
            <button name="edit" type="submit" class="btn btn-success w-100">Edit</button>
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