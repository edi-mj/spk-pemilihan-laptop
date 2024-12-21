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

  foreach ($data['kategori'] as $kategori) {
    $queryIdKategori = DB->prepare("SELECT * FROM kategori WHERE nama_kategori = :kategori");
    $queryIdKategori->execute([
      ":kategori" => $kategori
    ]);
    $idKategori = $queryIdKategori->fetch(PDO::FETCH_ASSOC)['id_kategori'];

    $st2 =  DB->prepare("INSERT INTO laptop_kategori VALUES (:id_laptop, :id_kategori)");
    $st2->execute([
      ":id_laptop" => $idLaptop,
      ":id_kategori" => $idKategori
    ]);
  }
  move_uploaded_file($_FILES["gambar"]["tmp_name"], BASEPATH . "/src/assets/img/" . $gambar);
}

function getAlternatif()
{
  $queryLaptop = DB->prepare("SELECT * FROM laptop");
  $queryLaptop->execute();
  $laptop = $queryLaptop->fetchAll(PDO::FETCH_ASSOC);

  foreach ($laptop as &$row) {
    $queryKategori = DB->prepare("SELECT k.nama_kategori FROM kategori k JOIN laptop_kategori lk USING (id_kategori) WHERE lk.id_laptop = :id_laptop");
    $queryKategori->execute([
      ":id_laptop" => $row['id_laptop']
    ]);
    $kategori = $queryKategori->fetchAll(PDO::FETCH_ASSOC);
    $kategoriResult = array_column($kategori, "nama_kategori");
    $row['nama_kategori'] = $kategoriResult;
  }

  return $laptop;
}

function getAlternatifById($id)
{
  $st = DB->prepare("SELECT l.* FROM laptop l, kategori k, laptop_kategori lk WHERE lk.id_laptop = l.id_laptop AND lk.id_kategori = k.id_kategori AND l.id_laptop = :id");
  $st->execute([
    ":id" => $id
  ]);

  $queryKategori = DB->prepare("SELECT nama_kategori FROM kategori k JOIN laptop_kategori lk ON (lk.id_kategori = k.id_kategori) WHERE lk.id_laptop = :id");
  $queryKategori->execute([
    ":id" => $id
  ]);
  $kategori = $queryKategori->fetchAll(PDO::FETCH_ASSOC);
  $arrKategori = [];
  foreach ($kategori as $row) {
    $arrKategori[] = $row['nama_kategori'];
  }
  $result = $st->fetch(PDO::FETCH_ASSOC);
  $result['nama_kategori'] = $arrKategori;
  return $result;
}

function getLaptopBySearch($search)
{
  $search = trim($search);
  if (empty($search)) {
    return false;
  }
  $st = DB->prepare("SELECT * FROM laptop WHERE model LIKE :search_model");
  $st->execute([
    ":search_model" => "%$search%"
  ]);

  return $st->fetchAll(PDO::FETCH_ASSOC);
}

function updateAlternatif($data, $gambar)
{
  // data lama laptop
  $dataLaptopLama = getAlternatifById($data['id-laptop']);
  // hapus gambar sebelum lama
  if (isset($_FILES['gambar']['tmp_name']) && $_FILES['gambar']['error'] != 4) {
    unlink(BASEPATH . "/src/assets/img/" . $dataLaptopLama['gambar']);

    move_uploaded_file($_FILES["gambar"]["tmp_name"], BASEPATH . "/src/assets/img/" . $gambar);
  }

  // Update data laptop
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

  // Ambil daftar kategori lama
  $queryLama = DB->prepare("SELECT k.id_kategori, k.nama_kategori FROM kategori k JOIN laptop_kategori lk USING (id_kategori) WHERE lk.id_laptop = :id_laptop");
  $queryLama->execute([":id_laptop" => $data['id-laptop']]);
  $kategoriLama = $queryLama->fetchAll(PDO::FETCH_ASSOC);

  $kategoriBaru = $data['kategori'];
  $idKategoriBaru = [];

  // Proses kategori baru
  foreach ($kategoriBaru as $kategori) {
    $queryIdKategori = DB->prepare("SELECT id_kategori FROM kategori WHERE nama_kategori = :nama_kategori");
    $queryIdKategori->execute([":nama_kategori" => $kategori]);

    $idKategori = $queryIdKategori->fetch(PDO::FETCH_ASSOC)['id_kategori'] ?? null;

    if (!$idKategori) {
      continue; // Jika kategori tidak ditemukan, lewati
    }

    $idKategoriBaru[] = $idKategori;

    // Tambahkan ke laptop_kategori jika belum ada
    $insertKategori = DB->prepare("INSERT IGNORE INTO laptop_kategori (id_laptop, id_kategori) VALUES (:id_laptop, :id_kategori)");
    $insertKategori->execute([
      ":id_laptop" => $data['id-laptop'],
      ":id_kategori" => $idKategori
    ]);
  }

  // Hapus kategori lama yang tidak ada dalam kategori baru
  foreach ($kategoriLama as $row) {
    if (!in_array($row['id_kategori'], $idKategoriBaru)) {
      $deleteKategori = DB->prepare("DELETE FROM laptop_kategori WHERE id_laptop = :id_laptop AND id_kategori = :id_kategori");
      $deleteKategori->execute([
        ":id_laptop" => $data['id-laptop'],
        ":id_kategori" => $row['id_kategori']
      ]);
    }
  }
}

function hapusAlternatif($id)
{
  try {
    $dataLaptop = getAlternatifById($id);
    unlink(BASEPATH . "/src/assets/img/" . $dataLaptop['gambar']);

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

function addPreferensi($data)
{
  $queryIdKategori = DB->prepare("SELECT id_kategori FROM kategori WHERE nama_kategori = :nama_kategori");
  $queryIdKategori->execute([
    ":nama_kategori" => $data['kategori']
  ]);
  $idKategori = $queryIdKategori->fetch(PDO::FETCH_ASSOC)['id_kategori'];
  $maks_harga = empty($data['maks_harga']) ? null : $data['maks_harga'];

  $queryIdUser = DB->prepare("SELECT * FROM preferensi WHERE id_users = :id_users");
  $queryIdUser->execute([
    ":id_users" => $data['id_users']
  ]);
  if ($queryIdUser->rowCount() == 0) {

    $st = DB->prepare("INSERT INTO `preferensi`(`id_kategori`, `id_users`, `maks_harga`) VALUES (:id_kategori, :id_users, :maks_harga)");
    $st->execute([
      ":id_kategori" => $idKategori,
      ":id_users" => $data['id_users'],
      ":maks_harga" => $maks_harga
    ]);
  } else {
    $st = DB->prepare("UPDATE preferensi SET id_kategori = :id_kategori, maks_harga = :maks_harga WHERE id_users = :id_users");
    $st->execute([
      ":id_users" => $data['id_users'],
      ":id_kategori" => $idKategori,
      ":maks_harga" => $maks_harga
    ]);
  }
}


// NORMALISASI

function getMinMax()
{
  $st = DB->prepare("SELECT MIN(harga) AS min_harga, MAX(RAM) AS maks_ram, MAX(kapasitas_storage) AS maks_storage, MAX(kapasitas_baterai) AS maks_baterai, MIN(berat) AS min_berat FROM `laptop`;");
  $st->execute();
  return $st->fetch(PDO::FETCH_ASSOC);
}

function getBobotKriteria()
{
  $st = DB->prepare("SELECT nama_kriteria, bobot FROM kriteria");
  $st->execute();
  $fetch = $st->fetchAll(PDO::FETCH_ASSOC);

  $result = [];

  foreach ($fetch as $row) {
    $result[$row['nama_kriteria']] = $row['bobot'];
  }

  return $result;
}


function countUsers()
{
  $st = DB->prepare("SELECT COUNT(*) AS count FROM users WHERE role = 'user'");
  $st->execute();

  return $st->fetch(PDO::FETCH_ASSOC)['count'];
}
function countAlternatif()
{
  $st = DB->prepare("SELECT COUNT(*) AS count FROM laptop");
  $st->execute();

  return $st->fetch(PDO::FETCH_ASSOC)['count'];
}
function countKriteria()
{
  $st = DB->prepare("SELECT COUNT(*) AS count FROM kriteria");
  $st->execute();

  return $st->fetch(PDO::FETCH_ASSOC)['count'];
}
