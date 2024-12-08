
<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];

// menginput data ke database
$query = mysqli_query($conn,"insert into user(nama, username, password, hak_akses) values('$nama', '$username', '$password', '$hak_akses')");


// mengalihkan halaman kembali
if($query){
  echo
  "<script>
  alert('Data Berhasil Ditambah');
  document.location.href = '../tambah-user.php';
  </script>
  ";
}
?>