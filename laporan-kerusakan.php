
<?php
include 'koneksi.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Facility Care</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dashboard Facility Care</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="laporan-kerusakan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Laporan Kerusakan
                                
                            </a>
                        

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="tambah-user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Tambah User
                            </a>
                            <a class="nav-link" href="settings.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Settings Akun
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Laporan Kerusakan</h1>
                        

                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Daftar Laporan Kerusakan Fasilitas Dinas Perhubungan Aceh</h4>
                                    
                                </p>
                            </div> 
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daftar Laporan Kerusakan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lapor</th>
                                            <th>Fasilitas</th>
                                            <th>Pilihan Tempat</th>
                                            <th>Fasilitas Rusak</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th>Status Laporan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lapor</th>
                                            <th>Fasilitas</th>
                                            <th>Pilihan Tempat</th>
                                            <th>Fasilitas Rusak</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th>Status Laporan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
    
        $no = 1;
        $data = mysqli_query($conn,"select * from laporan");

        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['tgl_lapor']; ?></td>
                <td><?php echo $d['fasilitas']; ?></td>
                <td><?php echo $d['pilihan_tempat']; ?></td>
                <td><?php echo $d['fasilitas_rusak']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><img src="../depan/file/<?= $d['foto'] ?>" alt="" class="" style="width: 300px;"></td>
                <td><?php echo $d['keterangan']; ?></td>
                <td><?php echo $d['status_laporan']; ?></td>
                <td>
                    <a href="edit-laporan.php?id=<?php echo $d['id']; ?>">EDIT </a> ||
                    <a href="laporan_kerusakan/hapus_laporan.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SB-ADMIN Boostrap 5</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
