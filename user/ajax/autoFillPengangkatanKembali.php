<?php
// require_once('../../App/functions/functions.php');
require_once('../../App/functions/functions.php');

$nip = $_GET['nip'];

$autoFillNip = autoFillNip("SELECT * FROM tb_pegawai WHERE nip = '$nip'");

$data = array(
    'nama' => $autoFillNip['nama'],
    'golongan' => $autoFillNip['golongan']
);

echo json_encode($data);
