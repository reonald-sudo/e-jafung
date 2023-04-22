<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

<?php

session_start();
require_once('../App/functions/functions.php');

// $nip = $_GET['nip'];

if (!isset($_SESSION['login'])) {
    header('Location:Abdi/login.php');
} else {
    $nip = $_SESSION['nip'];
    $password = $_SESSION['password'];
    $hakAses = $_SESSION['hak_akses'];
}

if (isset($_POST['gantiPasswordUser'])) {
    if (gantiPasswordUser($_POST) > 0) {
        echo "<script>
            $(document).ready(function(){

            Swal.fire({
                title: 'Password Berhasil Diubah !',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = 'index.php';
                }
            })
        });
        </script>
    ";
    } else {
        mysqli_error($conn);
    }
}

// Hitung Pending
$hitungSedangProses1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses6 = hitungBaris("SELECT * FROM tb_inpassing WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE status = 'sedang proses' AND nip = '$nip'");
$hitungSedangProses8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE status = 'sedang proses' AND nip = '$nip'");

$totalSedangProses = $hitungSedangProses1 + $hitungSedangProses2 + $hitungSedangProses3 + $hitungSedangProses4 + $hitungSedangProses5 + $hitungSedangProses6 + $hitungSedangProses7 + $hitungSedangProses8;

// Hitung Acc
$hitungAcc1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc6 = hitungBaris("SELECT * FROM tb_inpassing WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE status = 'Acc' AND nip = '$nip'");
$hitungAcc8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE status = 'Acc' AND nip = '$nip'");

$totalAcc = $hitungAcc1 + $hitungAcc2 + $hitungAcc3 + $hitungAcc4 + $hitungAcc5 + $hitungAcc6 + $hitungAcc7 + $hitungAcc8;

// hitung Ditolak
$hitungDitolak1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak6 = hitungBaris("SELECT * FROM tb_inpassing WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");
$hitungDitolak8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE status != 'Acc' AND status != 'sedang proses' AND nip = '$nip'");

$totalDitolak = $hitungDitolak1 + $hitungDitolak2 + $hitungDitolak3 + $hitungDitolak4 + $hitungDitolak5 + $hitungDitolak6 + $hitungDitolak7 + $hitungDitolak8;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Jafung</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../img/logo_ejafung.png" alt="" srcset="" style="width: 40px;" class="p-0 m-0">
                </div>
                <div class="sidebar-brand-text mx-3">E - Jafung</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                E - JAFUNG
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ejafung" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-folder"></i>
                    <span>E - Jafung</span>
                </a>
                <div id="ejafung" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="pengangkatanPertama.php">Pengangkatan Pertama</a>
                        <a class="collapse-item" href="pengangkatanKembali.php">Pengangkatan Kembali</a>
                        <a class="collapse-item" href="kenaikanJabatan.php">Kenaikan Jabatan</a>
                        <a class="collapse-item" href="pemberhentian.php">Pemberhentian</a>
                        <a class="collapse-item" href="perpindahan.php">Perpindahan</a>
                        <a class="collapse-item" href="inpassing.php">Inpassing</a>
                        <a class="collapse-item" href="perpindahanJabatanLain.php">Perpindahan Jabatan Lain</a>
                        <a class="collapse-item" href="perpindahanKelJafung.php">Perpindahan Kel Jafung</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cek Status
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CekEjafung" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-folder"></i>
                    <span>Cek Status</span>
                </a>
                <div id="CekEjafung" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ShowPengangkatanPertama.php">Pengangkatan Pertama</a>
                        <a class="collapse-item" href="ShowPengangkatanKembali.php">Pengangkatan Kembali</a>
                        <a class="collapse-item" href="ShowKenaikanJabatan.php">Kenaikan Jabatan</a>
                        <a class="collapse-item" href="ShowPemberhentian.php">Pemberhentian</a>
                        <a class="collapse-item" href="ShowPerpindahan.php">Perpindahan</a>
                        <a class="collapse-item" href="ShowInpassing.php">Inpassing</a>
                        <a class="collapse-item" href="showPerpindahanJabatanLain.php">Perpindahan Jabatan Lain</a>
                        <a class="collapse-item" href="showPerpindahanKelJafung.php">Perpindahan Kel Jafung</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nip; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <!-- triger modal ganti password -->
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#gantiPassword">
                                    <i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400"></i> Ganti Password
                                </button>

                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- Modal ganti password -->
                <div class="modal fade" id="gantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIP</label>
                                        <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label style="display: none;" for="exampleInputEmail1">Hak Akses</label>
                                        <input type="hidden" class="form-control" name="hakAkses" value="<?= $_SESSION['hak_akses']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password Baru</label>
                                        <input type="password" class="form-control" name="newPass">
                                        <small class="form-text text-muted">Masukkan password baru</small>
                                    </div>
                                    <button type="submit" name="gantiPasswordUser" class="btn btn-primary col-lg-12">Submit</button>
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sedang Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $totalSedangProses; ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Acc</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $totalAcc; ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Ditolak</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $totalDitolak; ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Abdi 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>