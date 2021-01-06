<?php
    require ('../connect.php');
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

    $sql = "SELECT * FROM tb_mitra where email = '$email' and password='$password'";
    $query = mysqli_query($koneksi,$sql);
    if(mysqli_num_rows($query)==0){
        echo "<script>alert('Email atau Password anda salah');window.location='../sign-in'</script>";
    }else {
        $user = mysqli_fetch_array($query);
        $nama_mitra = $user['nama_mitra'];
        $email = $user['email'];
        $kontak = $user['kontak'];
        if($user['is_verified']==1){
                session_start();
                $_SESSION['nama_mitra'] = $nama_mitra;
                $_SESSION['email'] = $email;
                $_SESSION['kontak'] = $kontak;
                $_SESSION['kondisi'] = "login";
                echo "<script>alert('Selamat, anda berhasil login');window.location='../data_mitra/dashboard'</script>";
            }else {
                echo "<script>alert('Akun anda belum di verifikasi, silahkan verifikasi melalui email terlebih dahulu');window.location='../sign-in'</script>";
            }
        }
