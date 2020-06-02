<?php

require_once "database.php";

// AMBIL SEMUA DATA
$sql = "SELECT * FROM calon_member";

// TULIS QUERY INI SETELAH FUNGSI SEARCH
if ( isset($_GET["keyword"]) ) {
  $keyword = $_GET["keyword"];
  $sql = "SELECT * FROM calon_member WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR divisi LIKE '%$keyword%' ";
}

$result = $link->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

// TULIS FILE JSON
$obj = json_encode($data);

$fileProcess = fopen("calon_member.json", "w");
fwrite($fileProcess, $obj);
fclose($fileProcess);


// BACA FILE JSON
$json = file_get_contents("calon_member.json");

$dataMember = json_decode($json);

for ($i = 0; $i < count($dataMember); $i++) {

  ?>

  <tr>
    <td><?=$dataMember[$i]->id?></td>
    <td><?=$dataMember[$i]->nim?></td>
    <td><?=$dataMember[$i]->nama?></td>
    <td><?=$dataMember[$i]->divisi?></td>
    <td>
      <div class="btn-group">
        <button class="btn btn-sm btn-outline-danger" value="<?=$dataMember[$i]->id?>" onclick="hapusData(this.value)">Hapus</button>
        <button class="btn btn-sm btn-outline-secondary" value="<?=$dataMember[$i]->id?>" onclick="getEditData(this.value)">Edit</button>
      </div>
    </td>
  </tr>  

  <?php
  
} // AKHIR FOR
  