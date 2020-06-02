<?php 

// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$password = "";
$db = "calon_member";

$link = new mysqli($host, $user, $password, $db);

if ($link->error) {
  exit("Koneksi ke database gagal.".$link->error);
}