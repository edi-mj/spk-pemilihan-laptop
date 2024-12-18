<?php
require 'base.php';
require './validate.php';

$errors = [];
if (isset($_POST['daftar'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  validateEmail($errors, $email);
  validateUsername($errors, $username);
  validatePassword($errors, $password);
  validateConfirmPassword($errors, $password, $confirmPassword);

  $emailValue = htmlspecialchars($email);
  $usernameValue = htmlspecialchars($username);
  $passwordValue = htmlspecialchars($password);
  $confirmPasswordValue = htmlspecialchars($confirmPassword);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link
    rel="stylesheet"
    href="<?= BASEURL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="<?= BASEURL ?>/node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />
</head>

<body class="d-flex align-items-center justify-content-center bg-body-secondary" style="height: 100vh;">
  <div class="p-5 bg-body-tertiary shadow rounded border-top border-4 border-primary" style="width: 40%;">
    <h3 class="text-center pb-4">Registrasi</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="<?= ($emailValue) ?? '' ?>" class="form-control">
        <div class="text-danger ps-1">
          <?= $errors['email'] ?? '' ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" value="<?= ($usernameValue) ?? '' ?>" class="form-control">
        <div class="text-danger ps-1">
          <?= $errors['username'] ?? '' ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" value="<?= ($passwordValue) ?? '' ?>" class="form-control">
        <div class="text-danger ps-1">
          <?= $errors['password'] ?? '' ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Konfirmasi Password</label>
        <input type="confirm-password" id="confirm-password" name="confirm-password" value="<?= ($confirmPasswordValue) ?? '' ?>" class="form-control">
        <div class="text-danger ps-1">
          <?= $errors['confirm-password'] ?? '' ?>
        </div>
      </div>
      <button name="daftar" type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
  </div>
</body>

</html>