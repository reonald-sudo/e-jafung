<?php

$conn = mysqli_connect('localhost', 'root', '', 'e_jafung');

// MENAMPILKAN DATABASE DI DEPAN
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// ganti password index user
function gantiPasswordUser($data)
{
    global $conn;

    $nip = $data['nip'];
    $hakAkses = $data['hakAkses'];
    $newPass = $data['newPass'];

    $query = "UPDATE user SET hak_akses = '$hakAkses', password = '$newPass' WHERE nip = '$nip'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// ganti password index admin
function gantiPasswordAdmin($data)
{
    global $conn;

    $nip = $data['nip'];
    $hakAkses = $data['hakAkses'];
    $newPass = $data['newPass'];

    $query = "UPDATE user SET hak_akses = '$hakAkses', password = '$newPass' WHERE nip = '$nip'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// uploadfile
function uploadIjazah()
{
    $namaFile = $_FILES['fileIjazah']['name'];
    $tmpFile = $_FILES['fileIjazah']['tmp_name'];
    $errorFile = $_FILES['fileIjazah']['error'];
    $sizeFile = $_FILES['fileIjazah']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}
// uploadregistrasiTtdSk
function uploadSkppk()
{
    $namaFile = $_FILES['skPpk']['name'];
    $tmpFile = $_FILES['skPpk']['tmp_name'];
    $errorFile = $_FILES['skPpk']['error'];
    $sizeFile = $_FILES['skPpk']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, 'document/pdf/' . $namaFile);

    return $namaFile;
}


// uploadfile
function uploadskCpns()
{
    $namaFile = $_FILES['skCpns']['name'];
    $tmpFile = $_FILES['skCpns']['tmp_name'];
    $errorFile = $_FILES['skCpns']['error'];
    $sizeFile = $_FILES['skCpns']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPns()
{
    $namaFile = $_FILES['skPns']['name'];
    $tmpFile = $_FILES['skPns']['tmp_name'];
    $errorFile = $_FILES['skPns']['error'];
    $sizeFile = $_FILES['skPns']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadspmt()
{
    $namaFile = $_FILES['spmt']['name'];
    $tmpFile = $_FILES['spmt']['tmp_name'];
    $errorFile = $_FILES['spmt']['error'];
    $sizeFile = $_FILES['spmt']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadstr()
{
    $namaFile = $_FILES['str']['name'];
    $tmpFile = $_FILES['str']['tmp_name'];
    $errorFile = $_FILES['str']['error'];
    $sizeFile = $_FILES['str']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadsertiDiklat()
{
    $namaFile = $_FILES['sertiDiklat']['name'];
    $tmpFile = $_FILES['sertiDiklat']['tmp_name'];
    $errorFile = $_FILES['sertiDiklat']['error'];
    $sizeFile = $_FILES['sertiDiklat']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadujikom()
{
    $namaFile = $_FILES['ujikom']['name'];
    $tmpFile = $_FILES['ujikom']['tmp_name'];
    $errorFile = $_FILES['ujikom']['error'];
    $sizeFile = $_FILES['ujikom']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPengantar()
{
    $namaFile = $_FILES['skPengantar']['name'];
    $tmpFile = $_FILES['skPengantar']['tmp_name'];
    $errorFile = $_FILES['skPengantar']['error'];
    $sizeFile = $_FILES['skPengantar']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPembebasan()
{
    $namaFile = $_FILES['skPembebasan']['name'];
    $tmpFile = $_FILES['skPembebasan']['tmp_name'];
    $errorFile = $_FILES['skPembebasan']['error'];
    $sizeFile = $_FILES['skPembebasan']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadpakTerakhir()
{
    $namaFile = $_FILES['pakTerakhir']['name'];
    $tmpFile = $_FILES['pakTerakhir']['tmp_name'];
    $errorFile = $_FILES['pakTerakhir']['error'];
    $sizeFile = $_FILES['pakTerakhir']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPangkatTerakhir()
{
    $namaFile = $_FILES['skPangkatTerakhir']['name'];
    $tmpFile = $_FILES['skPangkatTerakhir']['tmp_name'];
    $errorFile = $_FILES['skPangkatTerakhir']['error'];
    $sizeFile = $_FILES['skPangkatTerakhir']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskMutasi()
{
    $namaFile = $_FILES['skMutasi']['name'];
    $tmpFile = $_FILES['skMutasi']['tmp_name'];
    $errorFile = $_FILES['skMutasi']['error'];
    $sizeFile = $_FILES['skMutasi']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPemberhentianTubel()
{
    $namaFile = $_FILES['skPemberhentianTubel']['name'];
    $tmpFile = $_FILES['skPemberhentianTubel']['tmp_name'];
    $errorFile = $_FILES['skPemberhentianTubel']['error'];
    $sizeFile = $_FILES['skPemberhentianTubel']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskpSetahun()
{
    $namaFile = $_FILES['skpSetahun']['name'];
    $tmpFile = $_FILES['skpSetahun']['tmp_name'];
    $errorFile = $_FILES['skpSetahun']['error'];
    $sizeFile = $_FILES['skpSetahun']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskJabatanFungsionalTerakhir()
{
    $namaFile = $_FILES['skJabatanFungsionalTerakhir']['name'];
    $tmpFile = $_FILES['skJabatanFungsionalTerakhir']['tmp_name'];
    $errorFile = $_FILES['skJabatanFungsionalTerakhir']['error'];
    $sizeFile = $_FILES['skJabatanFungsionalTerakhir']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskTugasDiluarTupoksi()
{
    $namaFile = $_FILES['skTugasDiluarTupoksi']['name'];
    $tmpFile = $_FILES['skTugasDiluarTupoksi']['tmp_name'];
    $errorFile = $_FILES['skTugasDiluarTupoksi']['error'];
    $sizeFile = $_FILES['skTugasDiluarTupoksi']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPemberhentianSementaraPns()
{
    $namaFile = $_FILES['skPemberhentianSementaraPns']['name'];
    $tmpFile = $_FILES['skPemberhentianSementaraPns']['tmp_name'];
    $errorFile = $_FILES['skPemberhentianSementaraPns']['error'];
    $sizeFile = $_FILES['skPemberhentianSementaraPns']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskpdAngkaKredit()
{
    $namaFile = $_FILES['skpdAngkaKredit']['name'];
    $tmpFile = $_FILES['skpdAngkaKredit']['tmp_name'];
    $errorFile = $_FILES['skpdAngkaKredit']['error'];
    $sizeFile = $_FILES['skpdAngkaKredit']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPerpindahan()
{
    $namaFile = $_FILES['skPerpindahan']['name'];
    $tmpFile = $_FILES['skPerpindahan']['tmp_name'];
    $errorFile = $_FILES['skPerpindahan']['error'];
    $sizeFile = $_FILES['skPerpindahan']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskPengantarInpassing()
{
    $namaFile = $_FILES['skPengantarInpassing']['name'];
    $tmpFile = $_FILES['skPengantarInpassing']['tmp_name'];
    $errorFile = $_FILES['skPengantarInpassing']['error'];
    $sizeFile = $_FILES['skPengantarInpassing']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadskJafungAkhir()
{
    $namaFile = $_FILES['skJafungAkhir']['name'];
    $tmpFile = $_FILES['skJafungAkhir']['tmp_name'];
    $errorFile = $_FILES['skJafungAkhir']['error'];
    $sizeFile = $_FILES['skJafungAkhir']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

// uploadfile
function uploadsuratSakit()
{
    $namaFile = $_FILES['suratSakit']['name'];
    $tmpFile = $_FILES['suratSakit']['tmp_name'];
    $errorFile = $_FILES['suratSakit']['error'];
    $sizeFile = $_FILES['suratSakit']['size'];

    // cek apakah file di up
    if ($errorFile === 4) {
        $fileDefault = 'Tidak diupload';
        return $fileDefault;
    }

    // cek apakah file yg di up pdf atau bukan
    $extensionsFile = ['pdf', 'docx'];
    $extensionsFileUp = explode('.', $namaFile);
    $extensionsFileUp = strtolower(end($extensionsFile));

    if (!in_array($extensionsFileUp, $extensionsFile)) {
        echo "<script>
                alert ('File yang anda unggah bukan PDF!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($sizeFile >= 6500000000000) {
        echo "<script>
                alert ('File Yang Anda Unggah Terlalu Besar');
        </script>";
        return false;
    }

    // gambar siap di upload
    move_uploaded_file($tmpFile, '../document/pdf/' . $namaFile);

    return $namaFile;
}

//  autofillNIP
function autoFillNip($detail)
{
    global $conn;

    $result = mysqli_query($conn, $detail);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

// tambah pegawai
function tambahPegawai($data)
{
    global $conn;

    $nip = $data['nip'];
    $nama = $data['nama'];
    $golongan = $data['golongan'];

    $query = "INSERT INTO tb_pegawai VALUE('$nip', '$nama', '$golongan')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// tambah registrasi ttd sk
function tambahRegistrasiTtdSk($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];
    $skPpk = uploadSkppk();
    $status = $data['status'];
    $tanggalDiUpload = $data['tanggalDiUpload'];

    $query = "INSERT INTO tb_registrasi_ttd_sk VALUE ('', '$nama', '$nip', '$golongan', '$skPpk', '$status', '$tanggalDiUpload')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// tambah registrasi sk masuk
function tambahRegistrasiSkMasuk($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $status = $data['status'];
    $tanggalMasuk = $data['tanggalMasuk'];

    $query = "INSERT INTO tb_sk_masuk VALUE ('', '$nama', '$nip', '$status', '$tanggalMasuk')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// tambah registrasi sk keluar
function tambahRegistrasiSkKeluar($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $status = $data['status'];
    $tanggalKeluar = $data['tanggalKeluar'];

    $query = "INSERT INTO tb_sk_keluar VALUE ('', '$nama', '$nip', '$status', '$tanggalKeluar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// tambah data pengangkatan pertama
function tambahPengangkatanPertama($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];
    $noIjazah = $data['noIjazah'];


    $fileIjazah = uploadIjazah();
    $sPengantar = uploadskPengantar();
    $skpSetahun = uploadskpSetahun();
    $skCpns = uploadskCpns();
    $skPns = uploadskPns();
    $spmt = uploadspmt();
    $str = uploadstr();
    $sertiDiklat = uploadsertiDiklat();
    $ujikom = uploadujikom();
    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_pengangkatan_pertama VALUE ('', '$nama', '$nip', '$golongan', '$noIjazah', '$fileIjazah', '$sPengantar', '$skpSetahun', '$skCpns', '$skPns', '$spmt', '$str', '$sertiDiklat', '$ujikom', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// tambah pengankatan kembali
function tambahPengangkatanKembali($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPns = uploadskPns();
    $skCpns = uploadskCpns();
    $skpSetahun = uploadskpSetahun();
    $skPengantar = uploadskPengantar();
    $skPembebasan = uploadskPembebasan();
    $pakTerakhir = uploadpakTerakhir();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $spmt = uploadspmt();
    $skMutasi = uploadskMutasi();
    $skPemberhentianTubel = uploadskPemberhentianTubel();
    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_pengangkatan_kembali VALUE ('', '$nama', '$nip', '$golongan', '$skPns', '$skCpns', '$skpSetahun', '$skPengantar', '$skPembebasan', '$pakTerakhir', '$skPangkatTerakhir', '$spmt', '$skMutasi', '$skPemberhentianTubel', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// tambah kenaikan jabatan

function tambahKenaikanJabatan($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];


    $skPengantar = uploadskPengantar();
    $skJabatanFungsionalTerakhir = uploadskJabatanFungsionalTerakhir();
    $pakTerakhir = uploadpakTerakhir();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $skpSetahun = uploadskpSetahun();
    $skPns = uploadskPns();
    $skCpns = uploadskCpns();

    $noIjazah = $data['noIjazah'];
    $fileIjazah = uploadIjazah();
    $str = uploadstr();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_kenaikan_jabatan VALUE ('', '$nama', '$nip', '$golongan', '$skPengantar', '$skJabatanFungsionalTerakhir', '$pakTerakhir', '$skPangkatTerakhir', '$skpSetahun', '$skPns', '$skCpns','$noIjazah', '$fileIjazah', '$str', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahPemberhentian($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPengantar = uploadskPengantar();
    $skPns = uploadskPns();
    $skCpns = uploadskCpns();
    $skJafungAkhir = uploadskJafungAkhir();
    $pakTerakhir = uploadpakTerakhir();
    $suratSakit = uploadsuratSakit();

    $skTugasDiluarTupoksi = uploadskTugasDiluarTupoksi();
    $skPemberhentianSementaraPns = uploadskPemberhentianSementaraPns();
    $skpdAngkaKredit = uploadskpdAngkaKredit();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_pemberhentian VALUE ('', '$nama', '$nip', '$golongan', '$skPengantar', '$skPns', '$skCpns', '$skJafungAkhir', '$pakTerakhir', '$suratSakit', '$skTugasDiluarTupoksi', '$skPemberhentianSementaraPns', '$skpdAngkaKredit', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahPerpindahan($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skPangkatTerakhir = uploadskPangkatTerakhir();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_perpindahan VALUE ('', '$nama', '$nip', '$golongan', '$skPerpindahan', '$skPangkatTerakhir', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahPerpindahanJabatanLain($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skpns = uploadskPns();
    $skcpns = uploadskCpns();
    $ujikom = uploadujikom();
    $no_ijazah = $data['noIjazah'];

    $fileIjazah = uploadIjazah();
    $skpSetahun = uploadskpSetahun();
    $pakTerakhir = uploadpakTerakhir();

    $status = $data['status'];
    $tanggal_pengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_perpindahan_jabatan_lain VALUE ('', '$nama', '$nip', '$golongan', '$skPerpindahan', '$skpns', '$skcpns', '$ujikom', '$no_ijazah', '$fileIjazah', '$skpSetahun', '$pakTerakhir', '$status', '$tanggal_pengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahPerpindahanKelJafung($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skpns = uploadskPns();
    $skcpns = uploadskCpns();
    $skJabatanFungsionalTerakhir  = uploadskJabatanFungsionalTerakhir();


    $no_ijazah = $data['noIjazah'];
    $fileIjazah = uploadIjazah();

    $pakTerakhir = uploadpakTerakhir();
    $skpSetahun = uploadskpSetahun();
    $ujikom = uploadujikom();

    $status = $data['status'];
    $tanggal_pengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_perpindahan_kelompok_jafung VALUE ('', '$nama', '$nip', '$golongan', '$skPerpindahan', '$skpns', '$skcpns', '$skJabatanFungsionalTerakhir', '$no_ijazah', '$fileIjazah', '$pakTerakhir', '$skpSetahun', '$ujikom', '$status', '$tanggal_pengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahInpassing($data)
{
    global $conn;

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPengantarInpassing = uploadskPengantarInpassing();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $spmt = uploadspmt();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "INSERT INTO tb_inpassing VALUE ('', '$nama', '$nip', '$golongan', '$skPengantarInpassing', '$skPangkatTerakhir', '$spmt', '$status', '$tanggalPengajuan', '$tanggalVerifikasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahPengguna($data)
{
    global $conn;

    $nip = $data['nip'];
    $hakAkses = $data['hakAkses'];
    $password = $data['password'];

    $query = "INSERT INTO user VALUE ('' ,'$nip', '$hakAkses', '$password')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ISI NYA SHOW TABLES SEMUA YA GAES
// 1
function showTablePengangkatanPertama($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 2
function showTablePengangkatanKembali($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 3
function showTableKenaikanJabatan($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 4
function showTablePemberhentian($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 5
function showTablePerpindahan($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 6
function showTableInpassing($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// INI ISINYA UNTUK MERUBAH VERIFIKASI YA GAES
// 1
function verifikasiPengangkatanPertama($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = ("UPDATE tb_pengangkatan_pertama SET status = '$status', tanggal_verifikasi = '$tanggalVerifikasi' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 2
function verifikasiPengangkatanKembali($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_pengangkatan_kembali SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 3
function verifikasiKenaikanJabatan($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_kenaikan_jabatan SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 4
function verifikasiPemberhentian($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_pemberhentian SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 5
function verifikasiPerpindahan($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_perpindahan SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 6
function verifikasiInpassing($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_inpassing SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// 6
function verifikasiPerpindahanJabatanLain($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_perpindahan_jabatan_lain SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// 7
function verifikasiPerpindahanKelJafung($data)
{
    global $conn;

    $id = $data['id'];
    $status = $data['status'];

    $query = ("UPDATE tb_perpindahan_kelompok_jafung SET status = '$status' WHERE id = '$id'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// INI ISINYA UNTUK MENCETAK FILTER YA GAES
// 1
function showCetakFilterPengangkatanPertama($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 2
function showCetakFilterPengangkatanKembali($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 3
function showCetakFilterKenaikanJabatan($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 4
function showCetakFilterPemberhentian($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 5
function showCetakFilterPerpindahan($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// 6
function showCetakFilterInpassing($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// INI UNTUK NGEDIT YA GAES
function editData($detail)
{
    global $conn;
    $result = mysqli_query($conn, $detail);
    $row = mysqli_fetch_assoc($result);

    return $row;
}
// -2
function editRegistrasiSkKeluar($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $status = $data['status'];
    $tanggalKeluar = $data['tanggalKeluar'];

    $query = "UPDATE tb_sk_keluar SET nama = '$nama', nip = '$nip', status = '$status', tanggal_keluar = '$tanggalKeluar' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// -1
function editRegistrasiSkMasuk($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $status = $data['status'];
    $tanggalMasuk = $data['tanggalMasuk'];

    $query = "UPDATE tb_sk_masuk SET nama = '$nama', nip = '$nip', status = '$status', tanggal_masuk = '$tanggalMasuk' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 0
function editRegistrasiTtdSk($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];
    $skPpk = uploadSkppk();
    $status = $data['status'];
    $tanggalDiUpload = $data['tanggalDiUpload'];

    $query = "UPDATE tb_registrasi_ttd_sk SET nama = '$nama', nip = '$nip', golongan = '$golongan', registrasi_sk = '$skPpk', status = '$status', tanggal_pengajuan = '$tanggalDiUpload' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// INI NGIRIM QUERY EDITNYA YA GAES
// 1
function editPengangkatanPertama($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];
    $noIjazah = $data['noIjazah'];

    $fileIjazah = uploadIjazah();
    $skPengantar = uploadskPengantar();
    $skpSetahun = uploadskpSetahun();
    $skCpns = uploadskCpns();
    $skPns = uploadskPns();
    $spmt = uploadspmt();
    $str = uploadstr();
    $sertiDiklat = uploadsertiDiklat();
    $ujikom = uploadujikom();
    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_pengangkatan_pertama SET nama = '$nama', nip = '$nip', golongan = '$golongan', no_ijazah = '$noIjazah', ijazah = '$fileIjazah', skpengantar = '$skPengantar', skpsetahun = '$skpSetahun', sk_cpns = '$skCpns', sk_pns = '$skPns', spmt = '$spmt', str = '$str', sertifikat_diklat = '$sertiDiklat', ujikom = '$ujikom', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 2
function editPengangkatanKembali($data)
{
    global $conn;

    $id = $data['id'];

    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPns = uploadskPns();
    $skCpns = uploadskCpns();
    $skpSetahun = uploadskpSetahun();
    $skPengantar = uploadskPengantar();
    $skPembebasan = uploadskPembebasan();
    $pakTerakhir = uploadpakTerakhir();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $spmt = uploadspmt();
    $skMutasi = uploadskMutasi();
    $skPemberhentianTubel = uploadskPemberhentianTubel();
    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_pengangkatan_kembali SET nama = '$nama', nip = '$nip', golongan = '$golongan', skpns = '$skPns', skcpns = '$skCpns', skpsetahun = '$skpSetahun', sk_pengantar = '$skPengantar', sk_pembebasan = '$skPembebasan', pak_terakhir = '$pakTerakhir', sk_pangkat_terakhir = '$skPangkatTerakhir', spmt = '$spmt', sk_mutasi = '$skMutasi', sk_pemberhentian_tubel = '$skPemberhentianTubel', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 3
function editKenaikanJabatan($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPengantar = uploadskPengantar();
    $skJabatanFungsionalTerakhir = uploadskJabatanFungsionalTerakhir();
    $pakTerakhir = uploadpakTerakhir();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $skpSetahun = uploadskpSetahun();
    $skPns = uploadskPns();
    $skCpns = uploadskCpns();


    $noIjazah = $data['noIjazah'];
    $fileIjazah = uploadIjazah();
    $str = uploadstr();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_kenaikan_jabatan SET nama = '$nama', nip = '$nip', golongan = '$golongan', surat_pengantar = '$skPengantar', sk_jabatan_fungsional_terakhir = '$skJabatanFungsionalTerakhir', pak_terakhir = '$pakTerakhir', sk_pangkat_terakhir = '$skPangkatTerakhir', skpsetahun = '$skpSetahun', skpns = '$skPns', skcpns = '$skCpns', no_ijazah = '$noIjazah', ijazah = '$fileIjazah', str = '$str', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 4
function editPemberhentian($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPengantar = uploadskPengantar();
    $skPns = uploadskPns();
    $skCpns = uploadskCpns();
    $skJafungAkhir = uploadskJafungAkhir();
    $pakTerakhir = uploadpakTerakhir();
    $suratSakit = uploadsuratSakit();

    $skTugasDiluarTupoksi = uploadskTugasDiluarTupoksi();
    $skPemberhentianSementaraPns = uploadskPemberhentianSementaraPns();
    $skpdAngkaKredit = uploadskpdAngkaKredit();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];


    $query = "UPDATE tb_pemberhentian SET nama = '$nama', nip = '$nip', golongan = '$golongan', skpengantar = '$skPengantar', skpns = '$skPns', skcpns = '$skCpns', skjafungakhir = '$skJafungAkhir', pakterakhir = '$pakTerakhir', suratsakit = '$suratSakit',surat_melaksanakan_tugas_diluar_tupoksi = '$skTugasDiluarTupoksi', sk_pemberhentian_sementara_pns = '$skPemberhentianSementaraPns', surat_skpd = '$skpdAngkaKredit', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 5
function editPerpindahan($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skPangkatTerakhir = uploadskPangkatTerakhir();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_perpindahan SET nama = '$nama', nip = '$nip', golongan = '$golongan', surat_pengantar = '$skPerpindahan', sk_pangkat = '$skPangkatTerakhir', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 6
function editInpassing($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPengantarInpassing = uploadskPengantarInpassing();
    $skPangkatTerakhir = uploadskPangkatTerakhir();
    $spmt = uploadspmt();

    $status = $data['status'];
    $tanggalPengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_inpassing SET nama = '$nama', nip = '$nip', golongan = '$golongan', surat_pengantar = '$skPengantarInpassing', sk_pangkat_terakhir = '$skPangkatTerakhir', spmt = '$spmt', status = '$status', tanggal_pengajuan = '$tanggalPengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 7
function editPengguna($data)
{
    global $conn;

    $id = $data['id'];
    $nip = $data['nip'];
    $hakAkses = $data['hakAkses'];
    $passwordBaru = $data['password'];

    $query = "UPDATE user SET nip = '$nip', hak_akses = '$hakAkses', password = '$passwordBaru' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// 8 
function editPegawai($data)
{
    global $conn;

    $nip = $data['nip'];
    $nama = $data['nama'];
    $golongan = $data['golongan'];

    $query = "UPDATE tb_pegawai SET nama = '$nama', golongan = '$golongan' WHERE nip = '$nip'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 9
function editPerpindahanJabatanLain($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skpns = uploadskPns();
    $skcpns = uploadskCpns();
    $ujikom = uploadujikom();
    $no_ijazah = $data['noIjazah'];

    $fileIjazah = uploadIjazah();
    $skpSetahun = uploadskpSetahun();
    $pakTerakhir = uploadpakTerakhir();

    $status = $data['status'];
    $tanggal_pengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_perpindahan_jabatan_lain SET nama = '$nama', nip = '$nip', golongan = '$golongan', surat_pengantar = '$skPerpindahan', skpns = '$skpns', skcpns = '$skcpns', sertifikat_ukom = '$ujikom', no_ijazah = '$no_ijazah', ijazah = '$fileIjazah', skp_setahun = '$skpSetahun', pak_akhir = '$pakTerakhir', status = '$status', tanggal_pengajuan = '$tanggal_pengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// 10
function editPerpindahanKelJafung($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $nip = $data['nip'];
    $golongan = $data['golongan'];

    $skPerpindahan = uploadskPerpindahan();
    $skpns = uploadskPns();
    $skcpns = uploadskCpns();
    $skJabatanFungsionalTerakhir  = uploadskJabatanFungsionalTerakhir();


    $no_ijazah = $data['noIjazah'];
    $fileIjazah = uploadIjazah();

    $pakTerakhir = uploadpakTerakhir();
    $skpSetahun = uploadskpSetahun();
    $ujikom = uploadujikom();

    $status = $data['status'];
    $tanggal_pengajuan = $data['tanggalPengajuan'];
    $tanggalVerifikasi = $data['tanggalVerifikasi'];

    $query = "UPDATE tb_perpindahan_kelompok_jafung SET nama = '$nama', nip = '$nip', golongan = '$golongan', surat_pengantar = '$skPerpindahan', skpns = '$skpns', skcpns = '$skcpns', sk_jabatan_fungsional_akhir = '$skJabatanFungsionalTerakhir', no_ijazah = '$no_ijazah', ijazah = '$fileIjazah', pak_akhir = '$pakTerakhir', skp_setahun = '$skpSetahun', sertifikat_ukom = '$ujikom', status = '$status', tanggal_pengajuan = '$tanggal_pengajuan', tanggal_verifikasi = '$tanggalVerifikasi & sudah revisi' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// INI UNTUK HAPUS DATA YAA GAES
// 1
function hapusPengangkatanPertama($data)
{
    global $conn;

    $query = "DELETE FROM tb_pengangkatan_pertama WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 2
function hapusPengangkatanKembali($data)
{
    global $conn;

    $query = "DELETE FROM tb_pengangkatan_kembali WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 3
function hapusKenaikanJabatan($data)
{
    global $conn;

    $query = "DELETE FROM tb_kenaikan_jabatan WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 4
function hapusPemberhentian($data)
{
    global $conn;

    $query = "DELETE FROM tb_pemberhentian WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 5
function hapusPerpindahan($data)
{
    global $conn;

    $query = "DELETE FROM tb_perpindahan WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 6
function hapusPerpindahanJabatanLain($data)
{
    global $conn;

    $query = "DELETE FROM tb_perpindahan_jabatan_lain WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// 6
function hapusPerpindahanKelJafung($data)
{
    global $conn;

    $query = "DELETE FROM tb_perpindahan_kelompok_jafung WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 6
function hapusInpassing($data)
{
    global $conn;

    $query = "DELETE FROM tb_inpassing WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 7
function hapusPengguna($data)
{
    global $conn;

    $query = "DELETE FROM user WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 8
function hapusRegistrasiTtdSk($data)
{
    global $conn;

    $query = "DELETE FROM tb_registrasi_ttd_sk WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 9
function hapusRegistrasiSkMasuk($data)
{
    global $conn;

    $query = "DELETE FROM tb_sk_masuk WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 10
function hapusRegistrasiSkKeluar($data)
{
    global $conn;

    $query = "DELETE FROM tb_sk_keluar WHERE id = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// 11
function hapusPegawai($data)
{
    global $conn;

    $query = "DELETE FROM tb_pegawai WHERE nip = '$data'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// hitung query
function hitungBaris($query)
{
    global $conn;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
