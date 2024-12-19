<?php
$page = "Kriteria";
include_once './layout/html_head.php';
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 flex-grow-1">
      <h2 class="mb-4">Daftar Item</h2>
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
          <tr>
            <td>Harga</td>
            <td>Cost</td>
            <td>0.30</td>
            <td>
              <button class="btn btn-sm btn-warning me-2">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Tombol Tambah -->
      <a href="./tambah_kriteria.php" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Tambah Kriteria
      </a>
    </div>
  </div>
  <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>