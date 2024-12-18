<?php
require_once './base.php';
require BASEPATH . '/src/validate.php';

session_start();
$errors = [];
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $usernameValue = htmlspecialchars($username);
  $passwordValue = htmlspecialchars($password);

  if (authenticate($errors, $username, $password)) {
    if ($_SESSION['role'] == 'user') {
      header("Location:users/index.php");
      exit();
    } else {
      header("Location:admin/index.php");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link
    rel="stylesheet"
    href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />
</head>

<body class="d-flex align-items-center justify-content-center bg-body-secondary" style="height: 100vh;">
  <div class="p-5 bg-body-tertiary shadow rounded border-top border-4 border-primary" style="width: 40%;">
    <h3 class="text-center">login</h3>
    <div class="text-danger text-center fs-6">
      <?= $errors['login'] ?? '' ?>
    </div>
    <form action="" method="POST" class="mt-4">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" value="<?= $usernameValue ?? '' ?>" class="form-control">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" value="<?= $passwordValue ?? '' ?>" class="form-control">
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
      <p class="text-center mt-3">Belum memiliki akun? <a class="link-offset-2 link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="./registration.php">Daftar</a></p>
    </form>
  </div>
</body>

</html>