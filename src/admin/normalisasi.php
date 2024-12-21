<?php
function normalisasi($data)
{
  return array_map(function ($row) {
    $dataMinMax = getMinMax();
    $harga = $dataMinMax['min_harga'] / $row['harga'];
    $row['harga'] = round($harga, 4);

    $ram = $row['RAM'] / $dataMinMax['maks_ram'];
    $row['RAM'] = round($ram, 4);

    $storage = $row['kapasitas_storage'] / $dataMinMax['maks_storage'];
    $row['kapasitas_storage'] = round($storage, 4);

    $baterai = $row['kapasitas_baterai'] / $dataMinMax['maks_baterai'];
    $row['kapasitas_baterai'] = round($baterai, 4);

    $berat = $dataMinMax['min_berat'] / $row['berat'];
    $row['berat'] = round($berat, 4);
    return $row;
  }, $data);
}

function normalisasiTerbobot($data)
{
  return array_map(
    function ($row) {
      $bobotKriteria = getBobotKriteria();
      $harga = $bobotKriteria['Harga'] * $row['harga'];
      $row['harga'] = round($harga, 4);

      $ram = $row['RAM'] * $bobotKriteria['RAM'];
      $row['RAM'] = round($ram, 4);

      $storage = $row['kapasitas_storage'] * $bobotKriteria['Kapasitas Storage'];
      $row['kapasitas_storage'] = round($storage, 4);

      $baterai = $row['kapasitas_baterai'] * $bobotKriteria['Kapasitas Baterai'];
      $row['kapasitas_baterai'] = round($baterai, 4);

      $berat = $bobotKriteria['Berat Laptop'] * $row['berat'];
      $row['berat'] = round($berat, 4);
      return $row;
    },
    $data
  );
}

function nilaiPreferensi($data)
{
  $nilai =  array_map(function ($row) {
    // $newRow = [];
    // $newRow['id_laptop'] = $row['id_laptop'];
    // $newRow['model'] = $row['model'];
    // $newRow['harga'] = $row['harga'];
    // $newRow['nama_kategori'] = $row['nama_kategori'];
    $skor = $row['harga'] + $row['RAM'] + $row['kapasitas_storage'] + $row['kapasitas_baterai'] + $row['berat'];
    $row['skor'] = round($skor, 4);
    return $row;
  }, $data);

  usort($nilai, function ($a, $b) {
    return $b['skor'] <=> $a['skor'];
  });

  return $nilai;
}
