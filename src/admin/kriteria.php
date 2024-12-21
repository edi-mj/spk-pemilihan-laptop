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
  <div class="d-flex" style="padding-left: 15%;">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-5 bg-body-secondary flex-grow-1 min-vh-100">
      <h2 class="mb-3">Daftar Kriteria</h2>
      <!-- Tombol Tambah -->
      <div class="d-flex justify-content-end pb-2">
        <a href="./tambah_kriteria.php" class="btn btn-success fw-medium">
          <i class="bi bi-plus-lg"></i> Tambah Kriteria
        </a>
      </div>
      <!-- Tabel -->
      <div class="container p-0 shadow border-top border-3 border-primary">
        <table class="w-100 table table-striped text-center">
          <thead class="table-light align-middle">
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
  </div>
  <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>