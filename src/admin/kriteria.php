<?php
$page = "Kriteria";
include_once './layout/html_head.php';
require_once BASEPATH . '/src/sql.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

$data_kriteria = getKriteria();
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex" style="padding-left: 20%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 flex-grow-1">
      <h2 class="mb-4">Daftar Kriteria</h2>
      <!-- Tombol Tambah -->
      <div class="d-flex justify-content-end pb-2">
        <a href="./tambah_kriteria.php" class="btn btn-success fw-medium">
          <i class="bi bi-plus-lg"></i> Tambah Kriteria
        </a>

      </div>
      <!-- Tabel -->
      <table class="w-100 table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>Nama Kriteria</th>
            <th>Atribut</th>
            <th>Bobot</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_kriteria as $row): ?>
            <tr>
              <td><?= $row['nama_kriteria'] ?></td>
              <td><?= $row['atribut'] ?></td>
              <td><?= $row['bobot'] ?></td>
              <td>
                <a href="edit_kriteria.php?id_kriteria=<?= $row['id_kriteria']; ?>" class="btn btn-sm btn-warning me-2">
                  <i class="bi bi-pencil-square"></i>Edit
                </a>
                <a href="hapus_kriteria.php?id_kriteria=<?= $row['id_kriteria'] . '&nama-kriteria=' . $row['nama_kriteria']; ?>" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>Hapus
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