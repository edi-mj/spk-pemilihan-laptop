<!-- NAVBAR -->
<?php
$page = 'Hasil';
require './layout/navbar.php';
?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div id="content" class="container d-flex flex-wrap justify-content-center p-5 gap-4">
  <!-- CARD ITEM -->
  <div class="card shadow border-0" style="width: 14rem;">
    <div class="ratio ratio-1x1 border-bottom border-dark-subtle">
      <img src="<?= BASEURL; ?>/src/assets/img/sample.jpg" class="card-img-top img-fluid object-fit-contain" alt="...">
    </div>
    <div class="card-body">
      <p class="card-text">ASUS Vivobook M413</p>
      <h5 class="card-title">Rp.7.800.000</h5>
      <a href="#" class="btn btn-primary">Lihat Detail</a>
    </div>
  </div>
  <div class="card shadow border-0" style="width: 14rem;">
    <div class="ratio ratio-1x1 border-bottom border-dark-subtle">
      <img src="<?= BASEURL; ?>/src/assets/img/test.png" class="card-img-top img-fluid object-fit-contain " alt="item">
    </div>
    <div class="card-body">
      <p class="card-text">ASUS Vivobook M413</p>
      <h5 class="card-title">Rp.7.800.000</h5>
      <a href="#" class="btn btn-primary">Lihat Detail</a>
    </div>
  </div>
  <!-- CARD ITEM END -->
</div>
<!-- CONTENT END -->

</body>

</html>