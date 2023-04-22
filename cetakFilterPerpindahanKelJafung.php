<script src="vendor/jquery/jquery.min.js"></script>
<script src="sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

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

$dariTanggal = $_GET['dari'];
$sampaiTanggal = $_GET['sampai'];

$cetakFilterPerpindahan = showCetakFilterPerpindahan("SELECT * FROM " . 'tb_perpindahan_kelompok_jafung' . " WHERE " . "tanggal_pengajuan >= " . "'" .  $dariTanggal . "'" . ' AND ' . 'tanggal_pengajuan <= ' . "'" . $sampaiTanggal . "'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .rangkaSurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            height: 500px;
            padding: 20px;
        }

        table {
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        .kiri {
            text-align: justify;
            line-height: 5px;
        }

        .kanan {
            text-align: right;
        }

        .hitam {
            color: #000;
        }
    </style>

</head>

<body onload="window.print()">

    <!-- KOP SURAT -->
    <table width="100%" style="border-bottom: 5px solid #000;" class="container hitam">
        <tr>
            <td><img src="img/kab_banjar.png" style="width: 120px;"></td>
            <td class="tengah ">
                <h2>PEMERINTAH KABUPATEN BANJAR</h2>
                <h2><b>BADAN KEPEGAWAIAN DAN</b></h2>
                <h2><b>PENGEMBANGAN SUMBER DAYA MANUSIA</b></h2>
                <h6>Jl. Menteri Empat RT.12/04 Kel.Sungai Paring Telp. (0511) 4720338 Fax. (0511) 47205272</h6>
                <h6>Kode Pos 70611 Kalimantan Selatan</h6>
                <h6>MARTAPURA</h6>
            </td>
        </tr>
    </table>

    <br>
    <h4 class="tengah hitam">CETAK DATA PENGAJUAN PERPINDAHAN ANTAR KELOMPOK JABATAN FUNGSIONAL</h4>
    <br>

    <table class="container table table-bordered table-hover hitam">
        <thead style="border: 1px solid black;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Golongan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($cetakFilterPerpindahan as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['golongan']; ?></td>
                    <td><?= $row['status']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>



</body>

</html>