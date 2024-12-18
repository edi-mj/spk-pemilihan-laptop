<?php

require '../validate.php';

$errors = [];

if (isset($_GET['submit'])) {
  $kategori = $_GET['kategori'];
  $max_price = $_GET['max-price'];

  validateKategori($errors, $kategori);
  validatePrice($errors, $max_price);
}

?>

<!-- NAVBAR -->
<?php
$page = 'Beranda';
require './layout/navbar.php';
?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div class="container p-5 mt-5 w-50 shadow rounded">
  <h4 class="text-center mb-4">Input Preferensi Anda</h4>
  <form action="" method="get">
    <div class="input-group">
      <select name="kategori" class="form-select">
        <option value="-1" <?= (isset($kategori) && $kategori === "-1") ? 'selected' : '' ?>>Pilih kategori</option>
        <option value="1" <?= (isset($kategori) && $kategori === "1") ? 'selected' : '' ?>>Gaming</option>
        <option value="2" <?= (isset($kategori) && $kategori === "2") ? 'selected' : '' ?>>Design/Editing</option>
        <option value="3" <?= (isset($kategori) && $kategori === "3") ? 'selected' : '' ?>>Kuliah/Kerja Ringan</option>
      </select>
    </div>
    <div class="text-danger ps-1">
      <?= $errors['kategori'] ?? '' ?>
    </div>

    <div class="input-group mt-3">
      <span class="input-group-text">Rp.</span>
      <input type="text" name="max-price" value="<?php if (isset($max_price)) echo htmlspecialchars($max_price) ?>" class="form-control" placeholder="Input maksimal harga">
      <span class="input-group-text">.00</span>
    </div>
    <div class="text-danger ps-1">
      <?= $errors['max-price'] ?? '' ?>
    </div>

    <div class="input-group mt-3">
      <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- CONTENT END -->

</body>

</html>