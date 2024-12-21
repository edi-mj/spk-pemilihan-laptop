<?php
$page = "Penilaian";
include_once './layout/html_head.php';
require_once BASEPATH . '/src/sql.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';
require_once BASEPATH . '/src/admin/normalisasi.php';

$data_alternatif = getAlternatif();
$data_normal = normalisasi($data_alternatif);
$data_normal_terbobot = normalisasiTerbobot($data_normal);
$nilai_preferensi = nilaiPreferensi($data_normal_terbobot);

?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex" style="padding-left: 15%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-5 bg-body-secondary flex-grow-1 min-vh-100">
      <h2 class="mb-3">Perhitungan Metode SAW</h2>
      <div class="container p-0 shadow border-top border-3 border-primary">
        <table class="w-100 table table-striped text-center">
          <caption class="table caption-top ps-3">Nilai Awal Alternatif</caption>
          <thead class="table-light align-middle">
            <tr>
              <th scope="col" rowspan="2">No</th>
              <th scope="col" rowspan="2">Model</th>
              <th scope="col" colspan="5">Kriteria</th>
            </tr>
            <tr>
              <th scope="col">Harga (juta)</th>
              <th scope="col">RAM (GB)</th>
              <th scope="col">Storage (GB)</th>
              <th scope="col">Baterai (Wh)</th>
              <th scope="col">Berat (Kg)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_alternatif as $no => $row): ?>
              <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['model']; ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['RAM']; ?></td>
                <td><?= $row['kapasitas_storage']; ?></td>
                <td><?= $row['kapasitas_baterai']; ?></td>
                <td><?= $row['berat']; ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <div class="container p-0 shadow border-top border-3 border-primary">
        <table class="w-100 table table-striped text-center">
          <caption class="table caption-top ps-3">Nilai Normalisasi</caption>
          <thead class="table-light align-middle">
            <tr>
              <th scope="col" rowspan="2">No</th>
              <th scope="col" rowspan="2">Model</th>
              <th scope="col" colspan="5">Kriteria</th>
            </tr>
            <tr>
              <th scope="col">Harga (juta)</th>
              <th scope="col">RAM (GB)</th>
              <th scope="col">Storage (GB)</th>
              <th scope="col">Baterai (Wh)</th>
              <th scope="col">Berat (Kg)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_normal as $no => $row): ?>
              <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['model']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['RAM']; ?></td>
                <td><?= $row['kapasitas_storage']; ?></td>
                <td><?= $row['kapasitas_baterai']; ?></td>
                <td><?= $row['berat']; ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

      <div class="container p-0 shadow border-top border-3 border-primary">
        <table class="w-100 table table-striped text-center">
          <caption class="table caption-top ps-3">Nilai Normalisasi Terbobot</caption>
          <thead class="table-light align-middle">
            <tr>
              <th scope="col" rowspan="2">No</th>
              <th scope="col" rowspan="2">Model</th>
              <th scope="col" colspan="5">Kriteria</th>
            </tr>
            <tr>
              <th scope="col">Harga (juta)</th>
              <th scope="col">RAM (GB)</th>
              <th scope="col">Storage (GB)</th>
              <th scope="col">Baterai (Wh)</th>
              <th scope="col">Berat (Kg)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_normal_terbobot as $no => $row): ?>
              <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['model']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['RAM']; ?></td>
                <td><?= $row['kapasitas_storage']; ?></td>
                <td><?= $row['kapasitas_baterai']; ?></td>
                <td><?= $row['berat']; ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <div class="container p-0 shadow border-top border-3 border-primary">
        <table class="w-100 table table-striped text-center">
          <caption class="table caption-top ps-3">Nilai Preferensi V (Hasil Perankingan)</caption>
          <thead class="table-light align-middle">
            <tr>
              <th scope="col">Rank</th>
              <th scope="col">Id</th>

              <th scope="col">Model</th>
              <th scope="col">Nilai V (Skor)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($nilai_preferensi as $no => $row): ?>
              <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['id_laptop']; ?></td>
                <td><?= $row['model']; ?></td>
                <td><?= $row['skor']; ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>