<?php
function addUser($data)
{
  try {
    $statement = DB->prepare("INSERT INTO users (username, password, email, role)VALUES (:username, SHA2(:password, 0), :email, :role)");
    $statement->execute([
      ":username" => $data['username'],
      ":password" => $data['password'],
      ":email" => $data['email'],
      ":role" => "user"
    ]);
  } catch (PDOException $err) {
    echo $err->getMessage();
  }
}

function getUser($username, $password)
{
  $statement = DB->prepare("SELECT * FROM users WHERE username=:username AND password=SHA2(:password, 0)");
  $statement->execute([
    ":username" => $username,
    ":password" => $password
  ]);

  return $statement->fetch(PDO::FETCH_ASSOC);
}

function checkUsernameSql($username)
{
  try {
    $statement = DB->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindValue(":username", $username);
    $statement->execute();

    return $statement->rowCount() > 0;
  } catch (PDOException $err) {
    echo $err->getMessage();
  }
}

function addAlternatif($data, $gambar)
{
  $st = DB->prepare("INSERT INTO `laptop`(`model`, `harga`, `RAM`, `tipe_storage`, `kapasitas_storage`, `kapasitas_baterai`, `berat`, `gambar`) VALUES (:model, :harga, :ram, :tipe_storage, :kapasitas_storage, :kapasitas_baterai, :berat, :gambar)");

  $st->execute([
    ":model" => $data['model'],
    ":harga" => $data['harga'],
    ":ram" => $data['ram'],
    ":tipe_storage" => $data['tipe-storage'],
    ":kapasitas_storage" => $data['kapasitas-storage'],
    ":kapasitas_baterai" => $data['kapasitas-baterai'],
    ":berat" => $data['berat'],
    ":gambar" => $gambar
  ]);

  $queryIdLaptop =  DB->prepare("SELECT * FROM laptop WHERE model = :model");
  $queryIdLaptop->execute([
    ":model" => $data['model']
  ]);
  $idLaptop = $queryIdLaptop->fetch(PDO::FETCH_ASSOC)['id_laptop'];

  $queryIdKategori = DB->prepare("SELECT * FROM kategori WHERE nama_kategori = :kategori");
  $queryIdKategori->execute([
    ":kategori" => $data['kategori']
  ]);
  $idKategori = $queryIdKategori->fetch(PDO::FETCH_ASSOC)['id_kategori'];

  $st2 =  DB->prepare("INSERT INTO laptop_kategori VALUES (:id_laptop, :id_kategori)");
  $st2->execute([
    ":id_laptop" => $idLaptop,
    ":id_kategori" => $idKategori
  ]);
}

function getAlternatif()
{
  $st = DB->prepare("SELECT l.*, k.nama_kategori FROM laptop l, kategori k, laptop_kategori lk WHERE lk.id_laptop = l.id_laptop AND lk.id_kategori = k.id_kategori");
  $st->execute();

  return $st->fetchAll(PDO::FETCH_ASSOC);
}

function getAlternatifById($id)
{
  $st = DB->prepare("SELECT l.*, k.nama_kategori FROM laptop l, kategori k, laptop_kategori lk WHERE lk.id_laptop = l.id_laptop AND lk.id_kategori = k.id_kategori AND l.id_laptop = :id");
  $st->execute([
    ":id" => $id
  ]);

  return $st->fetch(PDO::FETCH_ASSOC);
}

function updateAlternatif($data, $gambar)
{
  $updateLaptop = DB->prepare("UPDATE laptop SET model = :model, harga = :harga, RAM = :RAM, tipe_storage = :tipe_storage, kapasitas_storage = :kapasitas_storage, kapasitas_baterai = :kapasitas_baterai, berat = :berat, gambar = :gambar WHERE id_laptop = :id");

  $updateLaptop->execute([
    ":id" => $data['id-laptop'],
    ":model" => $data['model'],
    ":harga" => $data['harga'],
    ":RAM" => $data['ram'],
    ":tipe_storage" => $data['tipe-storage'],
    ":kapasitas_storage" => $data['kapasitas-storage'],
    ":kapasitas_baterai" => $data['kapasitas-baterai'],
    ":berat" => $data['berat'],
    ":gambar" => $gambar
  ]);

  $queryIdKategori = DB->prepare("SELECT * FROM kategori WHERE nama_kategori = :kategori");
  $queryIdKategori->execute([
    ":kategori" => $data['kategori']
  ]);
  $idKategori = $queryIdKategori->fetch(PDO::FETCH_ASSOC)['id_kategori'];

  $updateLaptopKategori =  DB->prepare("UPDATE laptop_kategori SET id_kategori = :id_kategori WHERE id_laptop = :id_laptop");
  $updateLaptopKategori->execute([
    ":id_laptop" => $data['id_laptop'],
    ":id_kategori" => $idKategori
  ]);
}

function hapusAlternatif($id)
{
  try {
    $st = DB->prepare("DELETE FROM laptop_kategori WHERE id_laptop = :id");
    $st->execute([
      ":id" => $id
    ]);
    $st2 = DB->prepare("DELETE FROM laptop WHERE id_laptop = :id");
    $st2->execute([
      ":id" => $id
    ]);
    return true;
  } catch (PDOException $err) {
    return false;
  }
}

function addKriteria($data)
{
  $st = DB->prepare("INSERT INTO kriteria (nama_kriteria, atribut, bobot) VALUES (:nama_kriteria, :atribut, :bobot)");

  $st->execute([
    ":nama_kriteria" => $data['nama-kriteria'],
    ":atribut" => $data['atribut'],
    ":bobot" => $data['bobot']
  ]);
}

function getKriteria()
{
  $st = DB->prepare("SELECT * FROM kriteria");
  $st->execute();

  return $st->fetchAll(PDO::FETCH_ASSOC);
}

function getKriteriaById($id)
{
  $st = DB->prepare("SELECT * FROM kriteria WHERE id_kriteria = :id");
  $st->execute([
    ":id" => $id
  ]);
  return $st->fetch(PDO::FETCH_ASSOC);
}

function updateKriteria($data)
{
  $st = DB->prepare("UPDATE kriteria SET nama_kriteria = :nama_kriteria, atribut = :atribut, bobot = :bobot WHERE id_kriteria = :id");

  $st->execute([
    ":id" => $data['id-kriteria'],
    ":nama_kriteria" => $data['nama-kriteria'],
    ":atribut" => $data['atribut'],
    ":bobot" => $data['bobot']
  ]);
}

function hapusKriteria($id)
{
  try {
    $st = DB->prepare("DELETE FROM kriteria WHERE id_kriteria = :id");
    $st->execute([
      ":id" => $id
    ]);
    return true;
  } catch (PDOException $e) {
    return false;
  }
}
