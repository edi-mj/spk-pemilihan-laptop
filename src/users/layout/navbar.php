<?php
define("BASEURL", "http://" . $_SERVER['SERVER_NAME'] . "/spk-pemilihan-laptop");
if (isset($_GET['cari'])) {
  $search_value = htmlspecialchars($_GET['input-cari']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $page ?></title>
  <link
    rel="stylesheet"
    href="<?= BASEURL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />
</head>

<body class="bg-body-tertiary mt-5 p-4">
  <!-- NAVBAR -->
  <nav class="navbar fixed-top bg-body-secondary shadow">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="../index.php" class="nav-link <?= $page == 'Beranda' ? 'active' : '' ?>"><i class="bi bi-house-door pe-1"></i>Beranda</a>
        </li>
      </ul>
      <form method="GET" action="./laptop_list.php" class="d-flex" role="search">
        <input
          name="input-cari"
          value="<?= ($search_value) ?? '' ?>"
          class="form-control me-2"
          type="search"
          placeholder="Cari Laptop" />
        <button name="cari" class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
    </div>
  </nav>
  <!-- NAVBAR END -->