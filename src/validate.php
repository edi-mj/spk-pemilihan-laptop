<?php

function isEmpty($input)
{
  return empty(trim($input));
}

function isDigit($input)
{
  return preg_match("/^[0-9]+$/", $input);
}

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
