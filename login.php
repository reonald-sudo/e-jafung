<?php
session_start();

require_once('App/functions/functions.php');

if (isset($_SESSION['login'])) {
    header('Location:index.php');
    exit;
}

if (isset($_POST['login'])) {
    $nip = $_POST['nip'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$nip'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        // variabel
        $_SESSION['nip'] = $row['nip'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['hak_akses'] = $row['hak_akses'];

        if ($password == $row['password']) {

            // set session
            $_SESSION['login'] = true;

            // cek hak akses
            if ($row['hak_akses'] === 'admin') {
                echo "
                <script>
                document.location.href = 'index.php';
                </script>
                ";
            } else if ($row['hak_akses'] != 'admin') {
                echo "
                <script>
                document.location.href = 'user/index.php';
                </script>
                ";
            }
        }
        exit;
    }
}

$error = true;
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E - Jafung - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    .background {
        background-image: url(img/2.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }
</style>

<body class="bg-gradient-primary background">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5 mt-1 pt-1">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <img src="img/kab_banjar.png" class="mb-3" style="width: 80px; margin-left: 80px;" alt="" srcset="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img src="img/logo_ejafung.png" class="mb-3" style="width: 107px; margin-left: 1px;" alt="" srcset="">
                                        </div>
                                    </div>
                                    <hr class="">
                                    <div class="text-center">
                                        <p class="h4 text-gray-900 mb-4"><i class="fas fa-unlock"></i> Izin mengakses eJafung</p>
                                    </div>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <label for="" class="form-label">NIP</label>
                                            <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="nip">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword" name="password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login"><i class="fas fa-key"></i> <em>Login</em></button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>