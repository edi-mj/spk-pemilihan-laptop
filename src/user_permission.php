<?php
if ($_SESSION['role'] === "admin") {
  header("Location:" . BASEURL . "/src/admin");
  exit();
}
