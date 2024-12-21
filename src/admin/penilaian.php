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
  <div class="d-flex" style="padding-left: 20%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 flex-grow-1">
      <table class="table table-sm table-striped text-center border-top">
        <caption>Nilai Awal Alternatif</caption>
        <thead class="table-dark align-middle">
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
              <td><?= $row['harga']; ?></td>
              <td><?= $row['RAM']; ?></td>
              <td><?= $row['kapasitas_storage']; ?></td>
              <td><?= $row['kapasitas_baterai']; ?></td>
              <td><?= $row['berat']; ?></td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>

      <table class="table table-sm table-striped text-center border-top">
        <caption>Nilai Normalisasi</caption>
        <thead class="table-dark align-middle">
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

      <table class="table table-sm table-striped text-center border-top">
        <caption>Nilai Normalisasi Terbobot</caption>
        <thead class="table-dark align-middle">
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

      <table class="table table-sm table-striped text-center border-top">
        <caption>Nilai Preferensi V (Hasil Perankingan)</caption>
        <thead class="table-dark align-middle">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Model</th>
            <th scope="col">Nilai V (Skor)</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nilai_preferensi as $no => $row): ?>
            <tr>
              <td><?= $no + 1; ?></td>
              <td><?= $row['model']; ?></td>
              <td><?= $row['skor']; ?></td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
  <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>