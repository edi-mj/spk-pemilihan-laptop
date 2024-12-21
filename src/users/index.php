<!-- NAVBAR -->
<?php
$page = 'Beranda';
require_once './layout/navbar.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/user_permission.php';
?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div id="content" class="container min-vh-100 d-flex flex-column align-items-center justify-content-center p-5">

  <h2>
    Rekomendasi Pemilihan Laptop
  </h2>
  <p class="lead">
    Dapatkan rekomendasi laptop terbaik
    sesuai kebutuhan Anda.
  </p>
  <a href="./preferensi.php" class="btn btn-primary p-3 fw-bold">Dapatkan Rekomendasi</a>
</div>
<!-- CONTENT END -->

</body>

</html>