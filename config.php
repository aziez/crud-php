<?php

$dbHost = "localhost";
$usname = "root";
$passwd = "";
$dbname = "crud-base-php";

$conn = mysqli_connect($dbHost, $usname, $passwd, $dbname);

    if(!$conn){
        echo "gagal Terhubung ke database !";
    }else{
        // echo ("<script>alert('Koneksi Ke Database BERHASIL')</script>");
    }
?>