<?php
$page = "Alternatif";
include_once './layout/html_head.php';
include_once BASEPATH . '/src/sql.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

$data_alternatif = getAlternatif();
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex" style="padding-left: 20%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 bg-light flex-grow-1">
      <h2 class="mb-4">Daftar Alternatif</h2>

      <div class="d-flex justify-content-end pb-2">
        <!-- Tombol Tambah -->
        <a href="tambah_alternatif.php" class="btn btn-success fw-medium">
          <i class="bi bi-plus-lg"></i> Tambah Alternatif
        </a>
      </div>

      <!-- Tabel -->
      <table class="w-100 table table-striped text-center table-hover">
        <thead class="table-dark align-middle">
          <tr>
            <th>Model</th>
            <th>Harga</th>
            <th>RAM</th>
            <th>Tipe Storage</th>
            <th>Kapasitas Storage</th>
            <th>Kapasitas Baterai</th>
            <th>Berat</th>
            <th>Kategori</th>
            <th style="width:10%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_alternatif as $row): ?>
            <tr>
              <td><?= $row['model']; ?></td>
              <td><?= $row['harga']; ?></td>
              <td><?= $row['RAM']; ?></td>
              <td><?= $row['tipe_storage']; ?></td>
              <td><?= $row['kapasitas_storage']; ?></td>
              <td><?= $row['kapasitas_baterai']; ?></td>
              <td><?= $row['berat']; ?></td>
              <td><?= implode(", ", $row['nama_kategori']); ?></td>
              <td>
                <a href="edit_alternatif.php?id_laptop=<?= $row['id_laptop']; ?>" class="btn btn-sm btn-warning m-auto">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a href="hapus_alternatif.php?id_laptop=<?= $row['id_laptop'] . '&model=' . $row['model']; ?>" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
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