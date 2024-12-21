<?php
require_once '../base.php';
require BASEPATH . '/src/validate.php';
if (isset($_POST['cari'])) {
  $search = $_POST['input-cari'];
  if (!isEmpty($search)) {
    header("Location:" . BASEURL . "/src/users/laptop_list.php?input-cari=" . $search);
  }
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
  <nav class="navbar fixed-top bg-body-secondary shadow navbar-expand-lg">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="<?= BASEURL; ?>/src/logout.php" class="nav-link"><i class="bi bi-box-arrow-left pe-2"></i>Logout</a>
        </li>
        <li class="nav-item">
          <a href="<?= BASEURL; ?>/src/users/index.php" class="nav-link <?= $page == 'Beranda' ? 'active' : '' ?>"><i class="bi bi-house-door pe-1"></i>Beranda</a>
        </li>
      </ul>
      <form method="POST" action="" class="d-flex" role="search">
        <input
          name="input-cari"
          value="<?= isset($_GET['input-cari']) ? (htmlspecialchars($_GET['input-cari'])) : '' ?>"
          class="form-control me-2"
          type="search"
          placeholder="Cari Laptop" />
        <button name="cari" class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
    </div>
  </nav>
  <!-- NAVBAR END -->