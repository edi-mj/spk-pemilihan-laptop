<!-- NAVBAR -->
<?php
$page = 'Hasil';
require './layout/navbar.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/user_permission.php';
require_once BASEPATH . '/src/sql.php';

require_once BASEPATH . '/src/admin/normalisasi.php';

$data_alternatif = getAlternatif();
$data_normal = normalisasi($data_alternatif);
$data_normal_terbobot = normalisasiTerbobot($data_normal);
$nilai_preferensi = nilaiPreferensi($data_normal_terbobot);

$hasilRekomendasi = array_filter(
  $nilai_preferensi,
  function ($row) {
    $laptop = getAlternatifById($row['id_laptop']);
    $harga_laptop = $laptop['harga'];
    $kategori_preferensi = $_GET['kategori'];
    $harga_preferensi = isEmpty($_GET['maks_harga']) ? null : $_GET['maks_harga'];

    if ($harga_preferensi != null) {
      return $harga_laptop <= $harga_preferensi && in_array($kategori_preferensi, $row['nama_kategori']);
    } else {
      return in_array($kategori_preferensi, $row['nama_kategori']);
    }
  }
);

$hasilRekomendasi = array_slice($hasilRekomendasi, 0, 3);

?>
<!-- NAVBAR END -->

<!-- CONTENT -->
<div id="content" class="container min-vh-100 d-flex flex-column justify-content-center align-items-center" style="padding: 56px;">
  <!-- CARD ITEM -->
  <?php if (!empty($hasilRekomendasi)): ?>
    <h3 class="m-4">Rekomendasi Untuk Anda</h3>
    <div class="container d-flex flex-wrap justify-content-center align-items-center gap-4">
      <?php foreach ($hasilRekomendasi as $row): ?>
        <?php $laptop = getAlternatifById($row['id_laptop']) ?>
        <div class="rounded-4 card shadow border-0" style="width: 14rem;">
          <div class="ratio ratio-1x1 border-bottom border-dark-subtle">
            <img src="<?= BASEURL . '/src/assets/img/' . $laptop['gambar'] ?>" class="rounded-top-4 card-img-top img-fluid object-fit-cover" alt="...">
          </div>
          <div class="card-body">
            <h6 class="card-title"><?= $laptop['model'] ?></h6>
            <p class="card-text">Rp. <?= number_format($laptop['harga'], 0, ',', '.'); ?></p>
            <a href="./laptop_details.php?id_laptop=<?= $laptop['id_laptop'] ?>" class="btn btn-primary">Lihat Detail</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="fs-5">Oops! Rekomendasi tidak tersedia untuk preferensi Anda.</p>
  <?php endif; ?>
  <!-- CARD ITEM END -->
</div>
<!-- CONTENT END -->

</body>

</html>