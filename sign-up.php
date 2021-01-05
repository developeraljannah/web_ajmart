<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AJ Mart Registration System</title>

  <!-- Custom fonts for this template-->
  <link href="data_mitra/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="data_mitra/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Daftar Mitra AJ Mart</h1>
                  </div>
                  <form class="user" action="security/sign-up-process" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nama_mitra" placeholder="Masukkan Nama Mitra" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="kontak" placeholder="Masukkan Kontak" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-user btn-block" name="daftar" value="Daftar Mitra">
                    <hr>
                    <a href="sign-in" class="btn btn-primary btn-user btn-block">Login Mitra</a>
                    <a href="index" class="btn btn-secondary btn-user btn-block">Kembali Ke Beranda</a>
                </div>
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
  <script src="data_mitra/vendor/jquery/jquery.min.js"></script>
  <script src="data_mitra/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="data_mitra/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="data_mitra/js/sb-admin-2.min.js"></script>

</body>

</html>