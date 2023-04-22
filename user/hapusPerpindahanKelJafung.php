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

$id = $_GET['id'];

if (hapusPerpindahanKelJafung($id) > 0) {
    echo "
    <script>
    $(document).ready(function(){

        Swal.fire({
            title: 'Data Telah Terhapus',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = 'ShowPerpindahanKelJafung.php';
            }
        })
        
    });
    </script>
    ";
} else {
    mysqli_error($conn);
}
