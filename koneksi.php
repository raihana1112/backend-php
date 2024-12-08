<?php

session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "facility_care");

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

?>
