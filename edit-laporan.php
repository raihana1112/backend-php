
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
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update Status Laporan</li>
                        </ol>
                        <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn,"select * from laporan where id='$id'");
    while($d = mysqli_fetch_array($data)){
        ?>

                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <h4>Update Status Laporan Kerusakan Fasilitas</h4>
                                </p>

                                <form action="laporan_kerusakan/edit_laporan.php" method="GET" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Nama</label>
                                        <input class="form-control form-control-solid" name="nama" type="text" value="<?php echo $d['nama']; ?>" required>
                                    </div>
                                                                
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Fasilitas</label>
                                        <input class="form-control form-control-solid" name="fasilitas" type="text" value="<?php echo $d['fasilitas']; ?>" required>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Pilihan Tempat</label>
                                        <input class="form-control form-control-solid" name="pilihan_tempat" type="text" value="<?php echo $d['pilihan_tempat']; ?>" required>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Fasilitas Rusak</label>
                                        <input class="form-control form-control-solid" name="fasilitas_rusak" type="text" value="<?php echo $d['fasilitas_rusak']; ?>" required>
                                    </div>
                                                                
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Alamat</label>
                                        <input class="form-control form-control-solid" name="alamat" type="text" value="<?php echo $d['alamat']; ?>" required>
                                    </div>

                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Foto</label>
                                    <input class="form-control form-control-solid" type="file" name="foto" value="<?php echo $d['foto']; ?>">
                                            <img src="../depan/file/<?= $d['foto'] ?>" alt="" class="img-fluid my-2">
                                            <input type="hidden" name="old_file" value="<?php echo $d['foto']; ?>">
                                    </div>

                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Keterangan</label>
                                        <input class="form-control form-control-solid" name="keterangan" type="text" value="<?php echo $d['keterangan']; ?>" required>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0"><label for="">Status Laporan</label>
                                    <select class="form-select" name="status_laporan">
                                            <option selected>Pilih Status</option>
                                            <option value="Belum Diperiksa">Belum Diperiksa</option>
                                            <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                                            <option value="Sudah Diperiksa">Sudah Diperiksa</option>
                                        </select>
                                    </div>
                                
                                    <br>

                                    <input type="submit" value="Update Data" class="btn btn-success" style="float: left;">
                                </form>
                                <?php 
    }
    ?>  

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
