
<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['passwprd'];

// menginput data ke database
mysqli_query($conn,"insert into user values('','$nama', '$username', '$password')");

// mengalihkan halaman kembali ke index.php
  echo
  "<script>
  alert('Data Berhasil Ditambah');
  document.location.href = '../tambah-user.php';
  </script>
  ";
?>