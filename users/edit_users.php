
<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];
$nama = $_GET['nama'];
$username = $_GET['username'];
$password = $_GET['password'];


// update data ke database
mysqli_query($conn,"update user set nama='$nama',username='$username', password='$password' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
  echo
  "<script>
  alert('Data Berhasil Terupdate');
  document.location.href = '../tambah-user.php';
  </script>
  ";
 
?>