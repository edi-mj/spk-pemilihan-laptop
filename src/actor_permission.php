<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
  header("Location:" . BASEURL . "/src/index.php");
  exit();
}
