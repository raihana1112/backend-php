<?php
include '../koneksi.php';
$id = $_GET['id'];
echo
"<script> var id = " . $id . "; </script>";

$nama = $_POST['nama'];
$fasilitas = $_POST['fasilitas'];
$pilihan_tempat = $_POST['pilihan_tempat'];
$fasilitas_rusak = $_POST['fasilitas_rusak'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan'];
$status_laporan = $_POST['status_laporan'];
$ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
$nama_file = $_FILES['file']['name'];
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

if ($nama_file != '') {
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 5044070) {
      move_uploaded_file($file_tmp, '../depan/file/' . $nama_file);
      $query = mysqli_query($conn, "UPDATE laporan set nama='$nama', fasilitas='$fasilitas',
    pilihan_tempat='$pilihan_tempat', fasilitas_rusak='$fasilitas_rusak', alamat='$alamat', foto='$nama_file',
    keterangan='$keterangan', status_laporan='$status_laporan' where id='$id'");
      if ($query) {

        echo
        "<script>      
            alert('Data Berhasil di Update');
            document.location.href = `../laporan-kerusakan.php`;
            </script>
            ";
      } else {
        echo
        "<script>      
            alert('Data Gagal di Update');
            document.location.href = `../laporan-kerusakan.php`;
            </script>
            ";
      }
    } else {
      echo
      "<script>    
            alert('Ukuran File terlalu besar');
            document.location.href = `../laporan-kerusakan.php`;
            </script>
            ";
    }
  } else {
    echo
    "<script>  
            alert('Ekstensi file yang diupload tidak diperbolehkan');
            document.location.href = `../laporan-kerusakan.php`;
            </script>
            ";
  }
} else {
  $query = mysqli_query($conn, "UPDATE laporan set nama='$nama', fasilitas='$fasilitas',
    pilihan_tempat='$pilihan_tempat', fasilitas_rusak='$fasilitas_rusak', alamat='$alamat',
    keterangan='$keterangan', status_laporan='$status_laporan' where id='$id'");
  if ($query) {

    echo
    "<script>      
            alert('Data Berhasil di Update');
            document.location.href = `../laporan-kerusakan.php`;
            </script>
            ";
  }
}

