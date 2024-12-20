<?php
if ($_SESSION['role'] === "user") {
  header("Location:" . BASEURL . "/src/users");
  exit();
}
