<?php
date_default_timezone_set('Asia/Jakarta');
$koneksi = mysqli_connect("localhost", "root", "", "db_ajmart");

// apabila koneksi gagal 
if (mysqli_connect_errno()) {
    echo "<script>alert('Koneksi database gagal, silahkan kontak admin');</script>";
}
