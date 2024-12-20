<?php
$page = "Dashboard";
include_once './layout/html_head.php';
require_once BASEPATH . '/src/actor_permission.php';
require_once BASEPATH . '/src/admin_permission.php';

?>

<body>
  <!-- CONTAINER -->
  <div>
    <?php include_once BASEPATH . '/src/admin/layout/navbar.php' ?>
    <!-- MAIN CONTENT -->
    <div></div>
    <!-- MAIN CONTENT END -->

  </div>
  <!-- CONTAINER END -->

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>