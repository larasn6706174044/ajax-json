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