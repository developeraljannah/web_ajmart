<?php
    require('../connect.php');

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM tb_mitra where verif_code = '$code'";
        $query = mysqli_query($koneksi,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id_mitra'];
            $sql =  "UPDATE tb_mitra set is_verified=1 where id_mitra=$id";
            $query = mysqli_query($koneksi,$sql);
            if($query){
                echo "<script>alert('Verifikasi berhasil, silahkan login');window.location='../sign-in'</script>";
            }else{
                echo "<script>alert('Verifikasi gagal, silahkan hubungi admin');window.location='../sign-up'</script>";
            }
        }else {
            echo "<script>alert('Code Token Verifikasi tidak ditemukan');window.location='../sign-up'</script>";
        }
    }else {
        echo "<script>alert('Ada kendala teknis, silahkan hubungi admin');window.location='../sign-up'</script>";
    }
?>