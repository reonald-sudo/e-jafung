<script src="vendor/jquery/jquery.min.js"></script>
<script src="sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

session_start();
require_once('App/functions/functions.php');

if (!isset($_SESSION['login'])) {
    header('Location:login.php');
} else {
    $nip = $_SESSION['nip'];
    $password = $_SESSION['password'];
    $hakAses = $_SESSION['hak_akses'];
}

// Hitung Pending
$hitungSedangProses1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE status = 'sedang proses'");
$hitungSedangProses2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE status = 'sedang proses'");
$hitungSedangProses3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE status = 'sedang proses'");
$hitungSedangProses4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE status = 'sedang proses'");
$hitungSedangProses5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE status = 'sedang proses'");
$hitungSedangProses6 = hitungBaris("SELECT * FROM tb_inpassing WHERE status = 'sedang proses'");
$hitungSedangProses7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE status = 'pending'");
$hitungSedangProses8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE status = 'pending'");

$totalSedangProses = $hitungSedangProses1 + $hitungSedangProses2 + $hitungSedangProses3 + $hitungSedangProses4 + $hitungSedangProses5 + $hitungSedangProses6 + $hitungSedangProses7 + $hitungSedangProses8;


// Hitung baris pending tiap bulan januari
$hitungJanuari1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 1");
$hitungJanuari8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 1");

$totalJanuari = $hitungJanuari1 + $hitungJanuari2 + $hitungJanuari3 + $hitungJanuari4 + $hitungJanuari5 + $hitungJanuari6 + $hitungJanuari7 + $hitungJanuari8;

// Hitung baris pending tiap bulan februari
$hitungFebruari1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 2");
$hitungFebruari8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 2");

$totalFebruari = $hitungFebruari1 + $hitungFebruari2 + $hitungFebruari3 + $hitungFebruari4 + $hitungFebruari5 + $hitungFebruari6 + $hitungFebruari7 + $hitungFebruari8;

// Hitung baris pending tiap bulan Maret
$hitungMaret1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 3");
$hitungMaret8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 3");

$totalMaret = $hitungMaret1 + $hitungMaret2 + $hitungMaret3 + $hitungMaret4 + $hitungMaret5 + $hitungMaret6 + $hitungMaret7 + $hitungMaret8;

// Hitung baris pending tiap bulan April
$hitungApril1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 4");
$hitungApril8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 4");

$totalApril = $hitungApril1 + $hitungApril2 + $hitungApril3 + $hitungApril4 + $hitungApril5 + $hitungApril6 + $hitungApril7 + $hitungApril8;

// Hitung baris pending tiap bulan Mei
$hitungMei1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 5");
$hitungMei8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 5");

$totalMei = $hitungMei1 + $hitungMei2 + $hitungMei3 + $hitungMei4 + $hitungMei5 + $hitungMei6 + $hitungMei7 + $hitungMei8;

// Hitung baris pending tiap bulan Juni
$hitungJuni1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 6");
$hitungJuni8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 6");

$totalJuni = $hitungJuni1 + $hitungJuni2 + $hitungJuni3 + $hitungJuni4 + $hitungJuni5 + $hitungJuni6 + $hitungJuni7 + $hitungJuni8;

// Hitung baris pending tiap bulan Juli
$hitungJuli1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 7");
$hitungJuli8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 7");

$totalJuli = $hitungJuli1 + $hitungJuli2 + $hitungJuli3 + $hitungJuli4 + $hitungJuli5 + $hitungJuli6 + $hitungJuli7 + $hitungJuli8;

// Hitung baris pending tiap bulan Agustus
$hitungAgustus1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 8");
$hitungAgustus8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 8");

$totalAgustus = $hitungAgustus1 + $hitungAgustus2 + $hitungAgustus3 + $hitungAgustus4 + $hitungAgustus5 + $hitungAgustus6 + $hitungAgustus7 + $hitungAgustus8;

// Hitung baris pending tiap bulan September
$hitungSeptember1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 9");
$hitungSeptember8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 9");

$totalSeptember = $hitungSeptember1 + $hitungSeptember2 + $hitungSeptember3 + $hitungSeptember4 + $hitungSeptember5 + $hitungSeptember6 + $hitungSeptember7 + $hitungSeptember8;

// Hitung baris pending tiap bulan Oktober
$hitungOktober1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 10");
$hitungOktober8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 10");

$totalOktober = $hitungOktober1 + $hitungOktober2 + $hitungOktober3 + $hitungOktober4 + $hitungOktober5 + $hitungOktober6 + $hitungOktober7 + $hitungOktober8;

// Hitung baris pending tiap bulan November
$hitungNovember1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 11");
$hitungNovember8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 11");

$totalNovember = $hitungNovember1 + $hitungNovember2 + $hitungNovember3 + $hitungNovember4 + $hitungNovember5 + $hitungNovember6 + $hitungNovember7 + $hitungNovember8;

// Hitung baris pending tiap bulan Desember
$hitungDesember1 = hitungBaris("SELECT * FROM tb_pengangkatan_pertama WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember2 = hitungBaris("SELECT * FROM tb_pengangkatan_kembali WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember3 = hitungBaris("SELECT * FROM tb_pemberhentian WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember4 = hitungBaris("SELECT * FROM tb_perpindahan WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember5 = hitungBaris("SELECT * FROM tb_kenaikan_jabatan WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember6 = hitungBaris("SELECT * FROM tb_inpassing WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember7 = hitungBaris("SELECT * FROM tb_perpindahan_jabatan_lain WHERE MONTH (tanggal_pengajuan) = 12");
$hitungDesember8 = hitungBaris("SELECT * FROM tb_perpindahan_kelompok_jafung WHERE MONTH (tanggal_pengajuan) = 12");

$totalDesember = $hitungDesember1 + $hitungDesember2 + $hitungDesember3 + $hitungDesember4 + $hitungDesember5 + $hitungDesember6 + $hitungDesember7 + $hitungDesember8;

$hitungPegawai = hitungBaris("SELECT * FROM tb_pegawai");

$hitungRegistrasiSK = hitungBaris("SELECT * FROM tb_registrasi_ttd_sk");

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo_ejafung.png" alt="" srcset="" style="width: 40px;" class="p-0 m-0">
                </div>
                <div class="sidebar-brand-text mx-3">E - Jafung</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                VERIFIKASI
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder fa-cog"></i>
                    <span>Verifikasi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="verifikasiJabatanFungsional.php">Jabatan Fungsional</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                REGISTRASI
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-folder"></i>
                    <span>Registrasi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tableRegistrasiTtdSk.php">Registrasi TTD SK</a>
                        <a class="collapse-item" href="tableRegistrasiSkMasuk.php">Registrasi SK Masuk</a>
                        <a class="collapse-item" href="tableRegistrasiSkKeluar.php">Registrasi SK Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                PENGGUNA
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa fa-user"></i>
                    <span>Pengguna</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tablePengguna.php">Pengguna</a>
                        <div class="collapse-divider"></div>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <!-- triger modal ganti password -->
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#gantiPassword">
                                    <i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400"></i> Ganti Password
                                </button>

                                <a class="dropdown-item" href="logout.php">
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pending Verifikasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <h3><?= $totalPending; ?> </h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-clock fa-2x text-gray-300"></i>
                                    </div>
                                    <a class="small stretched-link badge bg-primary" href="verifikasiJabatanFungsional.php" style="color: white;"> Details <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-row">

                        <div class="col-md-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart data pengajuan bulanan ejafung</h6>
                                    <div class="dropdown no-arrow">
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        <canvas id="ChartBulanan"></canvas>
                                    </div>
                                </div>

                                <script>
                                    const ctx = document.getElementById('ChartBulanan');

                                    new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                            datasets: [{
                                                label: '# Data pengajuan',
                                                data: [<?= $totalJanuari; ?>, <?= $totalFebruari; ?>, <?= $totalMaret; ?>, <?= $totalApril; ?>, <?= $totalMei; ?>, <?= $totalJuni; ?>, <?= $totalJuli; ?>, <?= $totalAgustus; ?>, <?= $totalSeptember; ?>, <?= $totalOktober; ?>, <?= $totalNovember; ?>, <?= $totalDesember; ?>],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="card shadow mb-4 col-md-5">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Mengenai Ejafung</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3" style="width: 17rem;" src="img/11070.jpg" alt="...">
                                </div>
                                <br>
                                <p style="text-align: justify;">E-JAFUNG adalah Sistem Informasi Pelaporan Angka Kredit bagi Pejabat Fungsional di Bidang Perbendaharaan (PK-APBN, APK-APBN, PTPN dan APN) Wilayah kabupaten Banjar.</p>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sedang Proses Verifikasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $totalSedangProses; ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"><a class="small stretched-link badge bg-primary" href="verifikasiJabatanFungsional.php" style="color: white;"> Details <i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Pegawai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $hitungPegawai; ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"><a class="small stretched-link badge bg-primary" href="tablePegawai.php" style="color: white;"> Details <i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Registrasi Ttd Sk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h3><?= $hitungRegistrasiSK; ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"><a class="small stretched-link badge bg-primary" href="tableRegistrasiTtdSk.php" style="color: white;"> Details <i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- / .container-fluid -->

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
    </a <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>