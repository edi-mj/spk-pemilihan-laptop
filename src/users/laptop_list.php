<!-- NAVBAR -->
<?php
$page = 'Hasil';
require './layout/navbar.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/user_permission.php';
require_once BASEPATH . '/src/sql.php';

$search = $_GET['input-cari'];
$hasilCari = getLaptopBySearch($search);

?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div id="content" class="container min-vh-100 d-flex flex-wrap justify-content-center align-items-center gap-4">
  <!-- CARD ITEM -->
  <?php if (!empty($hasilCari)): ?>
    <?php foreach ($hasilCari as $laptop): ?>
      <div class="card shadow border-0 rounded-4" style="width: 14rem;">
        <div class="ratio ratio-1x1 border-bottom border-dark-subtle">
          <img src="<?= BASEURL . '/src/assets/img/' . $laptop['gambar'] ?>" class="card-img-top img-fluid object-fit-cover rounded-top-4 " alt="...">
        </div>
        <div class="card-body">
          <h6 class="card-title"><?= $laptop['model'] ?></h6>
          <p class="card-text">Rp. <?= number_format($laptop['harga'], 0, ',', '.'); ?></p>
          <a href="./laptop_details.php?id_laptop=<?= $laptop['id_laptop'] ?>" class="btn btn-primary">Lihat Detail</a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="fs-5">Oops! Laptop yang kamu cari tidak tersedia.</p>
  <?php endif; ?>
  <!-- CARD ITEM END -->
</div>
<!-- CONTENT END -->

</body>

</html>