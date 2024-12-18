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
      <select class="form-select" aria-label="Default select example">
        <option selected>Pilih kategori</option>
        <option value="1">Gaming</option>
        <option value="2">Design/Editing</option>
        <option value="3">Kuliah/Kerja Ringan</option>
      </select>
    </div>
    <div class="text-danger ps-1">
      <?= isset($_GET['submit']) ? 'jenis errornya' : '' ?>
    </div>

    <div class="input-group mt-3">
      <span class="input-group-text">Rp.</span>
      <input type="text" class="form-control">
      <span class="input-group-text">.00</span>
    </div>
    <div class="text-danger ps-1">
      <?= isset($_GET['submit']) ? 'jenis errornya' : '' ?>
    </div>

    <div class="input-group mt-3">
      <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- CONTENT END -->

</body>

</html>