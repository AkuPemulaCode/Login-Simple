<?php
 
$hostname = "127.0.0.1:3307";
$username = "root";
$password = ""; // dikosongkan jika tidak ada password
$database_name = "shop_data"; // GANTI jika perlu

$koneksi = mysqli_connect($hostname, $username, $password, $database_name);

if($koneksi->connect_error){
    echo "Koneksi Database Rusak";
    die("error!");

}

?>