<?php 

require_once "database.php";

$nim = $_GET["nim"];
$nama = $_GET["nama"];
$divisi = $_GET["divisi"];

$sql = "UPDATE calon_member SET nama='$nama', divisi='$divisi' WHERE nim='$nim'";

$link->query($sql);

// TULIS DAN BACA FILE JSON
require_once "get.php";
