<?php
$page = "Alternatif";
include_once './layout/html_head.php';
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex">

    <!-- SIDEBAR MENU -->
    <?php include_once './layout/navbar.php'; ?>

    <!-- SIDEBAR MENU END -->

    <!-- MAIN CONTENT -->
    <div id="content" class="w-75 p-3 bg-light">
      <h2 class="mb-4">Daftar Item</h2>
      <!-- Tabel -->
      <table class="w-100 table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>Model</th>
            <th>Harga</th>
            <th>Tipe Storage</th>
            <th>Kapasitas Storage</th>
            <th>Kapasitas Baterai</th>
            <th>Berat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Asus vivobook 14</td>
            <td>7.800.000</td>
            <td>SSD</td>
            <td>512</td>
            <td>6000</td>
            <td>1.5</td>
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
      <button class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Tambah Item
      </button>
    </div>
  </div>
  <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>