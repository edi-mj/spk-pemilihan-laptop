<?php
$page = "Penilaian";
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
      <table class="table table-sm table-striped text-center border-top">
        <caption>Nilai Awal Alternatif</caption>
        <thead class="table-dark align-middle">
          <tr>
            <th scope="col" rowspan="2">No</th>
            <th scope="col" rowspan="2">ID</th>
            <th scope="col" rowspan="2">Model</th>
            <th scope="col" colspan="5">Kriteria</th>
          </tr>
          <tr>
            <th scope="col">Harga</th>
            <th scope="col">RAM</th>
            <th scope="col">Storage</th>
            <th scope="col">Baterai</th>
            <th scope="col">Berat</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>kosong</td>
            <td>kosong</td>
            <td>kosong</td>
            <td>kosong</td>
            <td>kosong</td>
            <td>kosong</td>
            <td>kosong</td>
          </tr>

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