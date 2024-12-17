<div id="sidebar" class="w-25 bg-dark bg-gradient text-white vh-100 p-3">
  <h4>Admin</h4>
  <ul class=" nav flex-column">
    <li class="nav-item <?= ($page == 'Dashboard') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="index.php"><i class="bi bi-house"></i> Dashboard</a>
    </li>
    <li class="nav-item <?= ($page == 'Alternatif') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="alternatif.php"><i class="bi bi-people"></i> Altermatif</a>
    </li>
    <li class="nav-item <?= ($page == 'Kriteria') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="kriteria.php"><i class="bi bi-card-checklist"></i> Kriteria</a>
    </li>

    <li class="nav-item <?= ($page == 'Penilaian') ? 'bg-primary rounded' : '' ?>">
      <a class="nav-link text-white" href="penilaian.php"><i class="bi bi-calculator"></i> Penilaian</a>
    </li>
  </ul>
</div>