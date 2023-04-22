<script src="../vendor/jquery/jquery.min.js"></script>
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

$id = $_GET['id'];

$cetakPengangkatanPertama = editData("SELECT * FROM tb_pengangkatan_pertama WHERE id = '$id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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

        .newRoman {
            font-family: "Times New Roman", Times, serif;
        }

        .wordwrap {
            word-wrap: break-word;
        }
    </style>

</head>

<body onload="window.print()">

    <!-- KOP SURAT -->
    <table width="100%" class="container hitam newRoman mb-3">
        <tr>
            <td class="tengah ">
                <img src="../img/garuda.jpg" style="width: 240px;">
                <h3 style="padding-top: 15px;">KEPUTUSAN BUPATI BANJAR</h3>
                <h3>NOMOR: KP.13.00/030/PPK-PKM.3/BKPSDM</h3>
                <h3 style="padding-top: 15px; padding-bottom: 10px;">TENTANG</h3>
                <h3 style="padding-top: 5px; padding-bottom: 5px;"><b>PENGANGKATAN PERTAMA KALI DALAM JABATAN FUNGSIONAL</b></h3>
                <h3 style="padding-top: 5px; padding-bottom: 5px;"><b>BUPATI BANJAR</b></h3>
            </td>
        </tr>
    </table>

    <table style="width: 97%; margin-right: calc(3%);" class="container hitam newRoman">
        <tbody>
            <tr>
                <td style="width: 15.7487%;"><strong>
                        <h4>Menimbang</h4>
                    </strong></td>
                <td style="width: 5.6745%;"><strong>:</strong></td>
                <td style="width: 78.4907%;">
                    <h4> Bahwa sebagai pelaksanaan dari Peraturan Menteri Pendayagunaan Aparatur Negara Nomor 01/PER/M.PAN/1/2008 dipandang perlu untuk mengangkat saudara <?= $cetakPengangkatanPertama['nama']; ?>.</h4>
                </td>
            </tr>
            <tr>
                <td style="width: 15.7487%;"><strong>
                        <h4>Mengingat</h4>
                    </strong></td>
                <td style="width: 5.6745%;"><strong>:</strong></td>
                <td style="width: 78.4907%;">
                    <ol>
                        <h4>
                            <li>Undang-Undang Nomor 5 Tahun 2014;</li>
                            <li>Undang-Undang Nomor 23 Tahun 2014;</li>
                            <li>Peraturan Pemerintah Republik Indonesia Nomor 17 Tahun 2020 Tentang Perubahan Atas Peraturan Pemerintah Nomor 11 Tahun 2017;</li>
                            <li>Peraturan Menteri Negara Pendayagunaan Aparatur Negara Nomor 01/PER/M.PAN/1/2008;</li>
                            <li>Peraturan Bersama Menter Kesehatan dan Kepala Badan Kepegawaian Negara Nomor 1110/MENKES/PB/XII/2008 dan Nomor 25 Tahun 2008 tanggal 1 Desember 2008;</li>
                        </h4>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
    <h4 style="text-align: center;" class="hitam newRoman">MEMUTUSKAN</h4>
    <table style="width: 100%;" class="container hitam newRoman">
        <tbody>
            <tr>

                <td style="width: 15.4045%;">
                    <h4>Menetapkan</h4>
                </td>
                <td style="width: 5.5077%;">
                    <h4>:</h4>
                </td>
                <td style="width: 78.8296%;"><br></td>
            </tr>
            <tr>
                <td style="width: 15.4045%;"><br></td>
                <td style="width: 5.5077%;"><br></td>
                <td style="width: 78.8296%;"><br></td>
            </tr>
            <tr>
                <td style="width: 15.4045%;">
                    <h4>Pertama</h4>
                </td>
                <td style="width: 5.5077%;">:</td>
                <td style="width: 78.8296%;">
                    <h4>&nbsp;&nbsp;Terhitung Mulai <strong>Pelantikan</strong>Mengangkat Pegawai Negeri Sipil :</h4>
                    <h4>
                        <ol style="list-style-type: lower-alpha;">
                            <li>
                                <h4>Nama &nbsp; &nbsp; &nbsp; &nbsp;: <?= $cetakPengangkatanPertama['nama']; ?></h4>
                            </li>
                            <li>
                                <h4>NIP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= $cetakPengangkatanPertama['nip']; ?></h4>
                            </li>
                            <li>
                                <h4>Golongan : <?= $cetakPengangkatanPertama['golongan']; ?></h4>
                            </li>
                        </ol>
                    </h4>
                </td>
            </tr>
        </tbody>
    </table>
    <p><br></p>
    <table style="width: 100%;" class="container hitam newRoman">
        <tbody>
            <tr>
                <td style="width: 33.3333%;"><br></td>
                <td style="width: 22.749%;"><br></td>
                <td style="width: 43.6882%;">
                    <h4>Ditetapakan di MARTAPURA</h4>
                </td>
            </tr>
            <tr>
                <td style="width: 33.3333%;"><br></td>
                <td style="width: 22.749%;"><br></td>
                <td style="width: 43.6882%;">
                    <h4>Pada tanggal&nbsp;</h4><br><br><br>
                </td>
            </tr>
            <tr>
                <td style="width: 33.3333%;"><br></td>
                <td style="width: 22.749%;"><br></td>
                <td style="width: 43.6882%;">
                    <h4>BUPATI BANJAR<br><br><br><br></h4>
                </td>
            </tr>
            <tr>
                <td style="width: 33.3333%;"><br></td>
                <td style="width: 22.749%;"><br></td>
                <td style="width: 43.6882%;">
                    <h4>H. SAIDI MANSYUR, S.I.Kom</h4>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>