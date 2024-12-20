<div id="sidebar" class="position-fixed start-0 top-0 bg-dark bg-gradient text-white vh-100 p-3" style="width: 20%;">
  <h4>Admin</h4>
  <ul class="nav flex-column fw-medium" style="height: 100%;">
    <li class="nav-item <?= ($page == 'Dashboard') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="index.php"><i class="bi bi-house"></i> Dashboard</a>
    </li>
    <li class="nav-item <?= ($page == 'Alternatif') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="alternatif.php"><i class="bi bi-people"></i> Alternatif</a>
    </li>
    <li class="nav-item <?= ($page == 'Kriteria') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="kriteria.php"><i class="bi bi-card-checklist"></i> Kriteria</a>
    </li>

    <li class="nav-item <?= ($page == 'Penilaian') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="penilaian.php"><i class="bi bi-calculator"></i> Perhitungan</a>
    </li>
    <li class="nav-item mt-auto mb-5">
      <a href="<?= BASEURL; ?>/src/logout.php" class="nav-link text-white"><i class="bi bi-box-arrow-left pe-2"></i>Logout</a>
    </li>
  </ul>
</div>