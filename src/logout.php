<?php
require_once './base.php';

session_start();
session_destroy();

header("Location:" . BASEURL);
exit();
