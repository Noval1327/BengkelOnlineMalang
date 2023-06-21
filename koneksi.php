<?php 
    $servername = 'localhost:3306';
    $username = 'root';
    $password = '';
    $database = 'bengkel_online';
    $koneksi = mysqli_connect($servername, $username, $password, $database);

    if(!$koneksi) {
        die('Connection Failed:' . mysqli_connect_error());
    } 
 ?>
