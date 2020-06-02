database.php
> FILE INI BERISI KODE UNTUK KONEKSI KE DATABASE
```php
<?php 

// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$password = "ngopi";
$db = "hero_db";

$link = new mysqli($host, $user, $password, $db);

if ($link->error) {
  exit("Koneksi ke database gagal.".$link->error);
}
```

---

simpan.php
> FILE INI BERISI KODE UNTUK MENYIMPAN DATA KE DATABASE
```php
<?php 

require_once "database.php";

// AMBIL DATA -> SIMPAN
$nim = $_GET["nim"];
$nama = $_GET["nama"];
$divisi = $_GET["divisi"];
 
$sql = "INSERT INTO calon_member VALUES (NULL, '$nim', '$nama', '$divisi')";

$link->query($sql);

// TULIS DAN BACA FILE JSON
require_once "get.php";
```

---

get.php
> FILE INI BERISI KODE UNTUK MENULIS DAN MEMBACA DATA KE/DARI JSON YANG KEMUDIAN AKAN DITAMPILKAN MELALUI JAVASCRIPT
```php
<?php

require_once "database.php";

// AMBIL SEMUA DATA
$sql = "SELECT * FROM calon_member";
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
        <button class="btn btn-sm btn-outline-secondary" value="<?=$dataMember[$i]->id?>" onclick="editData(this.value)">Edit</button>
      </div>
    </td>
  </tr>  

  <?php
  
} // AKHIR FOR
```

---

hapus.php
> FILE INI BERISI KODE UNTUK MENGHAPUS DATA DARI DATABASE 
```php
<?php 

require_once "database.php";

if ( isset($_GET["id"]) ) {

  // AMBIL ID -> HAPUS
  $id = $_GET["id"];

  $sql = "DELETE FROM calon_member WHERE id = $id";
  
  $link->query($sql);
  
  // TULIS DAN BACA FILE JSON
  require_once "get.php";

} // AKHIR DARI ISSET
```

---

dataEdit.php
> FILE INI BERISI KODE UNTUK MENGAMBIL DATA DARI DATABASE UNTUK DITAMPILKAN KE FORM
```php
<?php 

require_once "database.php";

if ( isset($_GET["id"]) ) {

  // AMBIL ID -> KEMBALIKAN DATA DALAM BENTUK JSON AGAR DAPAT DITAMPILKAN
  $id = $_GET["id"];

  $sql = "SELECT * FROM calon_member WHERE id = $id";
  
  $result = $link->query($sql);
  $data = $result->fetch_assoc();

  $obj = json_encode($data);

  echo $obj;
  
} // AKHIR DARI ISSET
```

---

edit.php
> FILE INI BERISI KODE UNTUK MENGUPDATE DATA KE DATABASE
```php
<?php 

require_once "database.php";

$nim = $_GET["nim"];
$nama = $_GET["nama"];
$divisi = $_GET["divisi"];

$sql = "UPDATE calon_member SET nama='$nama', divisi='$divisi' WHERE nim='$nim'";

$link->query($sql);

// TULIS DAN BACA FILE JSON
require_once "get.php";
```