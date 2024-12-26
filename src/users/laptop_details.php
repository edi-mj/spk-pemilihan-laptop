<!-- NAVBAR -->
<?php
$page = 'Hasil';
require './layout/navbar.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/user_permission.php';

$dataLaptop = getAlternatifById($_GET['id_laptop']);

$prev_page = $_SERVER['HTTP_REFERER'] ?? BASEURL . '/src/users/index.php';

?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div id="content" class="container min-vh-100 d-flex flex-column align-items-center justify-content-center gap-4" style="padding: 56px;">
  <div class="card rounded-4 shadow" style="width: 65%;">
    <div class="row g-2">
      <div class="col-md-6">
        <img src="<?= BASEURL . '/src/assets/img/' . $dataLaptop['gambar'] ?>" class="card-img-top img-fluid object-fit-cover rounded-start-4" alt="<? $dataLaptop['model'] ?>">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h6 class="card-title">Model: <?= $dataLaptop['model'] ?></h6>
          <p class="card-text">Harga: Rp. <?= number_format($dataLaptop['harga'], 0, ',', '.'); ?></p>
          <p class="card-text">RAM: <?= $dataLaptop['RAM'] ?> GB</p>
          <p class="card-text">Storage: <?= $dataLaptop['tipe_storage'] . ' ' . $dataLaptop['kapasitas_storage'] ?> GB</p>
          <p class="card-text">Kapasitas Baterai: <?= $dataLaptop['kapasitas_baterai'] ?> Wh</p>
          <p class="card-text">Berat: <?= $dataLaptop['berat'] ?></p>
        </div>
      </div>
    </div>
  </div>
  <a href="<?= $prev_page ?>" class="btn btn-outline-secondary">Kembali</a>
</div>
<!-- CONTENT END -->

</body>

</html>