
<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from laporan where id='$id'");


 
// mengalihkan halaman kembali ke index.php
  echo
  "<script>
  alert('Data Berhasil Terhapus');
  document.location.href = '../laporan-kerusakan.php';
  </script>
  ";
 

?>
