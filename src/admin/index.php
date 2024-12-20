<?php
$page = "Dashboard";
include_once './layout/html_head.php';
?>

<body>
  <!-- CONTAINER -->
  <div class="d-flex" style="padding-left: 20%;">

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
            <th>No</th>
            <th>Nama Item</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Item 1</td>
            <td>Ini adalah keterangan item 1</td>
            <td>
              <button class="btn btn-sm btn-warning me-2">
                <i class="bi bi-pencil"></i> Edit
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Item 2</td>
            <td>Ini adalah keterangan item 2</td>
            <td>
              <button class="btn btn-sm btn-warning me-2">
                <i class="bi bi-pencil"></i> Edit
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i> Hapus
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