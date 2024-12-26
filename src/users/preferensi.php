<!-- NAVBAR -->
<?php
$page = 'Input Preferensi';
require './layout/navbar.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/user_permission.php';

$errors = [];

if (isset($_POST['mulai'])) {
  $kategori = $_POST['kategori'];
  $maks_harga = $_POST['maks_harga'];
  $maks_harga_bersih = preg_replace("/[^0-9]/", "", $maks_harga);
  $_POST['maks_harga'] = $maks_harga_bersih;

  validateKategori($errors, $kategori);
  validatePrice($errors, $maks_harga);

  if (!$errors) {
    addPreferensi($_POST);
    header("Location: ./rekomendasi.php?kategori=$kategori&maks_harga=$maks_harga_bersih");
  }
}
?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div class="container min-vh-100 d-flex justify-content-center align-items-center" style="padding: 56px;">
  <div class="container p-5 w-50 shadow rounded">
    <h4 class="text-center mb-4">Input Preferensi Anda</h4>
    <form action="" method="POST">
      <input type="hidden" name="id_users" value="<?= $_SESSION['id_users']; ?>">
      <div class="input-group">
        <select name="kategori" class="form-select">
          <option value="" <?= (isset($kategori) && $kategori === "-1") ? 'selected' : '' ?>>Pilih kategori</option>
          <option value="gaming" <?= (isset($kategori) && $kategori === "gaming") ? 'selected' : '' ?>>Gaming</option>
          <option value="design/editing" <?= (isset($kategori) && $kategori === "design/editing") ? 'selected' : '' ?>>Design/Editing</option>
          <option value="kuliah/kerja" <?= (isset($kategori) && $kategori === "kuliah/kerja") ? 'selected' : '' ?>>Kuliah/Kerja</option>
          <option value="programming" <?= (isset($kategori) && $kategori === "programming") ? 'selected' : '' ?>>Programming</option>
        </select>
      </div>
      <div class="text-danger ps-1">
        <?= $errors['kategori'] ?? '' ?>
      </div>

      <div class="input-group mt-3">
        <span class="input-group-text">Rp.</span>
        <input type="text" name="maks_harga" value="<?php if (isset($maks_harga)) echo htmlspecialchars($maks_harga) ?>" class="form-control" placeholder="Input maksimal harga">
        <span class="input-group-text">.00</span>
      </div>
      <div class="text-danger ps-1">
        <?= $errors['maks_harga'] ?? '' ?>
      </div>

      <div class="input-group mt-3">
        <button type="submit" name="mulai" value="true" class="btn btn-primary">Mulai</button>
      </div>
    </form>
  </div>
</div>
<!-- CONTENT END -->

</body>

</html>