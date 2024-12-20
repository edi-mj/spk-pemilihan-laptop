<?php
session_start();
if (isset($_SESSION['is_logged_in'])) {
  if ($_SESSION['role'] === 'admin') {
    header("Location:" . BASEURL . "/src/admin");
    exit();
  }
  if ($_SESSION['role'] === 'user') {
    header("Location:" . BASEURL . "/src/users");
    exit();
  }
}
