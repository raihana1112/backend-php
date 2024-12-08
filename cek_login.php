<?php

include 'koneksi.php';

// Fungsi untuk login
function login($username, $password) {
  global $conn;

  // Sanitasi input
  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  // Query untuk mendapatkan data user
  $query = "SELECT * FROM user WHERE username='$username'";
  $result = mysqli_query($conn, $query);
// Cek apakah user ditemukan
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
      // Set session
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['hak_akses'] = $row['hak_akses']; // Kolom hak_akses di tabel users
      return true;
    }
  }

  return false;
}

// Cek apakah user sudah login
if (isset($_SESSION['id'])) {
  // Redirect ke dashboard berdasarkan hak_akses
  if ($_SESSION['hak_akses'] == 'admin') {
    header("Location: admin_dashboard.php");
  } elseif ($_SESSION['hak_akses'] == 'pegawai') {
    header("Location: pegawai_dashboard.php");
  }
  exit();
}

  ?>
  