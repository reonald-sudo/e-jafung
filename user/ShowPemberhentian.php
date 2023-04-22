<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

<?php

session_start();
require_once('../App/functions/functions.php');

if (!isset($_SESSION['login'])) {
    header('Location:login.php');
} else {
    $nip = $_SESSION['nip'];
    $password = $_SESSION['password'];
    $hakAses = $_SESSION['hak_akses'];
}

$tablePemberhentian = showTablePemberhentian("SELECT * FROM tb_pemberhentian WHERE nip = '$nip'");

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
                    document.location.href = 'ShowPemberhentian.php';
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
                <!-- End of Topbar -->

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cek status pemberhentian jabatan fungsional</h1>
                    </div>

                    <div class="card shadow">
                        <div class="card-header" style="background-color: #fff;">
                            <a href="index.php" class="btn btn-primary btn-sm float-left">
                                <i class="fa fa-chevron-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Berkas</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Berkas</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tablePemberhentian as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['nip']; ?></td>
                                            <td><?= $row['tanggal_pengajuan']; ?></td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#Berkas<?= $row['id']; ?>">
                                                    <i class="fas fa-folder"></i> Detail
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Berkas<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kelengkapan Berkas <?= $row['nama']; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body modal-xl" id="modal-body">
                                                                <div>
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama Berkas</th>
                                                                                <th>Berkas</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Nama Berkas</th>
                                                                                <th>Berkas</th>
                                                                            </tr>
                                                                        </tfoot>

                                                                        <tbody>
                                                                            <tr>
                                                                                <!-- Surat Pengantar -->
                                                                                <td>Surat Pengantar</td>
                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#suratPengantar<?= $row['id']; ?>">
                                                                                        <i class="far fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="suratPengantar<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Surat pengantar <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['skpengantar']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <!-- SK PNS -->
                                                                                <td>Sk pns</td>
                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skPns<?= $row['id']; ?>">
                                                                                        <i class="far fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="skPns<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Sk pns <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['skpns']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <!-- SK CPNS -->
                                                                                <td>Sk cpns</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skCpns<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="skCpns<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Sk cpns <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['skcpns']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- Sk Jafung Terakhir -->
                                                                            <tr>
                                                                                <td>Sk Jabatan Fungsional Terakhir</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skJafungTerakhir<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="skJafungTerakhir<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Sk Jabatan Fungsional Terakhir <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['skjafungakhir']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- PAK TERAKHIR -->
                                                                            <tr>
                                                                                <td>Pak terakhir</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pakTerakhir<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="pakTerakhir<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Pak Terakhir <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['pakterakhir']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- SURAT SAKIT -->
                                                                            <tr>
                                                                                <td>Surat sakit / surat cuti / surat tugas belajar</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#suratSakit<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="suratSakit<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Surat sakit / surat cuti diluar tanggungan negara / surat tugas belajar <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['suratsakit']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- SURAT MELAKSANAKAN TUGAS DILUAR TUPOKSI -->
                                                                            <tr>
                                                                                <td>Surat melaksanakan tugas diluar tupoksi</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#suratDiluarTupoksi<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="suratDiluarTupoksi<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Surat melaksanakan tugas diluar tupoksi <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['surat_melaksanakan_tugas_diluar_tupoksi']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- SK PEMBERHENTIAN SEMENTARA PNS -->
                                                                            <tr>
                                                                                <td>Sk pemberhentian sementara pns</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skPemberhentianSpns<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="skPemberhentianSpns<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Sk pemberhentian sementara pns <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['sk_pemberhentian_sementara_pns']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <!-- SKPD -->
                                                                            <tr>
                                                                                <td>Surat SKPD</td>

                                                                                <td>
                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skpd<?= $row['id']; ?>">
                                                                                        <i class="fa fa-eye"></i> Lihat
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="skpd<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Surat SKPD <?= $row['nama']; ?></h5>
                                                                                                </div>
                                                                                                <div class="modal-body modal-xl" id="modal-body">
                                                                                                    <div>
                                                                                                        <iframe src="../document/pdf/<?= $row['surat_skpd']; ?>" frameborder="0" width="470" height="520"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>

                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <?php
                                            if (($row['status'] != 'Acc') && ($row['status'] != 'sedang proses')) {

                                            ?>
                                                <td><span class="badge bg-danger" style="color: #fff;"><i class="fas fa-exclamation-triangle"></i> <?= $row['status']; ?></span> <span class="badge bg-secondary" style="color: #fff;"><i class="fas fa-hourglass-half"></i> <?= $row['tanggal_verifikasi']; ?></span></td>
                                            <?php
                                            } elseif ($row['status'] == 'Acc') {
                                            ?>
                                                <td><span class="badge bg-success" style="color: #fff;"><i class="fas fa-check"></i> <?= $row['status']; ?></span> <span class="badge bg-secondary" style="color: #fff;"><i class="fas fa-hourglass-half"></i> <?= $row['tanggal_verifikasi']; ?></span></td>
                                            <?php
                                            } elseif ($row['status'] == 'sedang proses') {
                                            ?>
                                                <td><span class="badge bg-info" style="color: #fff;"><i class="far fa-clock"></i> <?= $row['status']; ?></span> <span class="badge bg-secondary" style="color: #fff;"><i class="fas fa-hourglass-half"></i> <?= $row['tanggal_verifikasi']; ?></span></td>
                                            <?php
                                            }
                                            ?>


                                            <td>
                                                <!-- edit -->
                                                <a href="editPemberhentian.php?id=<?= $row['id']; ?>" class="btn-sm btn-warning mr-2">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php
                                                if ($row['status'] == 'Acc') {
                                                ?>
                                                    <!-- cetak -->
                                                    <a href="cetakPemberhentian.php?id=<?= $row['id']; ?>" class="btn-sm btn-info mr-2">
                                                        <i class="fa fa-file "></i> Cetak
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                                <!-- hapus -->
                                                <a href="hapusPemberhentian.php?id=<?= $row['id']; ?>" class="btn-sm btn-danger" onclick="javascript: return confirm('Konfirmasi data akan dihapus');">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- / .container-fluid -->

                </div>

            </div>
            <!-- End of Main Content -->


            <!-- ISI NYA MODAL AJA -->

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
    <scri src="../vendor/jquery/jquery.min.js"></scri>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <!-- <script src="sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script> -->

    <?php require_once('../css/user_scriptsdatatables.php'); ?>
    <?php require_once('../css/user_cssdatatables.php'); ?>

    <script>
        $(function() {
            $('#mytable').DataTable()
        });
    </script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
    <script>
        PDFObject.embed("document/pdf/Pertemuan 2.pdf", "#modal-body");
    </script> -->

</body>

</html>