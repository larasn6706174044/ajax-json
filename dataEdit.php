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