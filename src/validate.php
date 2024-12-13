<?php
require_once BASEPATH . '/src/sql.php';

function isEmpty($input)
{
  return empty(trim($input));
}

function isDigit($input)
{
  return preg_match("/^[0-9]+$/", $input);
}

function isAlphabet($input)
{
  $patt = "/^[a-zA-Z]+$/";
  return preg_match($patt, $input);
}

function checkAlphaNumeric($field)
{
  $patt = "/^[A-Za-z\d]+$/";
  return preg_match($patt, $field);
}

// VALIDASI FORM PREFERENSI USER
function validateKategori(&$errors, $input)
{
  if ($input == -1) {
    $errors['kategori'] = "mohon pilih kategori";
  }
}

function validatePrice(&$errors, $input)
{
  if (!isEmpty($input) && !isDigit($input)) {
    $errors['max-price'] = "masukan hanya boleh mengandung angka";
  }
}
// VALIDASI FORM PREFERENSI USER END


// VALIDASI FORM REGISTRASI
function validateEmail(&$errors, $email)
{
  if (isEmpty($email)) {
    $errors["email"] = "email tidak boleh kosong";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "format email tidak valid";
    }
  }
}

function validateUsername(&$errors, $username)
{
  $oneDigit = "/(?=.*\d)/";
  $oneLetter = "/(?=.*[a-zA-Z])/";

  if (isEmpty($username)) {
    $errors["username"] = "username tidak boleh kosong";
  } else {
    if (!checkAlphaNumeric($username)) {
      $errors["username"] = "username hanya boleh mengandung huruf dan angka";
    } else if (!preg_match($oneDigit, $username)) {
      $errors["username"] = "username harus mengandung setidaknya 1 digit angka";
    } else if (!preg_match($oneLetter, $username)) {
      $errors["username"] = "username harus mengandung setidaknya 1 huruf";
    } else if (strlen($username) < 6) {
      $errors["username"] = "username harus terdiri dari minimal 6 karakter";
    }
    // else if (checkUsernameSql($username)) {
    //   $errors["username"] = "username tidak tersedia";
    // }
  }
}

function validatePassword(&$errors, $password)
{
  if (isEmpty($password)) {
    $errors["password"] = "password tidak boleh kosong";
  } else {

    $re = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).+$/';
    if (!preg_match($re, $password)) {
      $errors["password"] = "password harus mengandung kombinasi huruf besar dan kecil, angka, dan spesial karakter";
    } else if (strlen($password) < 8) {
      $errors["password"] = "password harus terdiri dari minimal 8 karakter";
    }
  }
}

function validateConfirmPassword(&$errors, $password, $confirmPassword)
{
  if (isEmpty($confirmPassword)) {
    $errors["confirm-password"] = "konfirmasi password tidak boleh kosong";
  } else {
    if ($password != $confirmPassword) {
      $errors["confirm-password"] = "password tidak cocok";
    }
  }
}
// VALIDASI FORM REGISTRASI END

// VALIDASI LOGIN
function authenticate(&$errors, $username, $password)
{
  $user = getUser($username, $password);
  if (!empty($user)) {
    $_SESSION['user-id'] = $user['id_users'];
    $_SESSION['role'] = $user['role'];
    return true;
  }
  $errors['login'] = "USERNAME ATAU PASSWORD SALAH";
  return false;
}
// VALIDASI LOGIN END

// VALIDASI TAMBAH KRITERIA
function validateNamaKriteria(&$errors, $input)
{
  if (isEmpty($input)) {
    $errors['nama-kriteria'] = "Nama kriteria tidak boleh kosong";
  } else {
    if (!isAlphabet($input)) {
      $errors['nama-kriteria'] = "Nama kriteria hanya boleh berupa huruf alfabet";
    }
  }
}

function validateBobot(&$errors, $input)
{
  $patt = "/^[0-9]+([\/\.]*[0-9]+)*$/";
  $isValid = preg_match($patt, $input);

  if (isEmpty($input)) {
    $errors['bobot'] = "Bobot tidak boleh kosong";
  } else {
    if (!$isValid) {
      $errors['bobot'] = "Bobot hanya boleh berupa angka desimal";
    }
  }
}
// VALIDASI TAMBAH KRITERIA END