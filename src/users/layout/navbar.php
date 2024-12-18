<?php
require '../base.php';
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
    href="<?= BASEURL ?>/node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />
</head>

<body class="bg-body-tertiary mt-5 p-4">
  <!-- NAVBAR -->
  <nav class="navbar fixed-top bg-body-secondary shadow">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="<?= BASEURL ?>/src/users/" class="nav-link <?= $page == 'Beranda' ? 'active' : '' ?>"><i class="bi bi-house-door pe-1"></i>Beranda</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Cari Laptop"
          aria-label="Search" />
        <a href="./laptop_list.php" class="btn btn-outline-primary" type="submit">Cari</a>
      </form>
    </div>
  </nav>
  <!-- NAVBAR END -->