<?php
header("Access-Control-Allow-Origin: *");


$koneksi = mysqli_connect("localhost", "root", "", "origet_db");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    
    if (mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);
        echo json_encode(array("message" => "Login berhasil", "user" => $user));
    } else {
        
        echo json_encode(array("message" => "Login gagal. Periksa kembali username dan password Anda"));
    }
}


?>
