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

