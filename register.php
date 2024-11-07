<?php


$koneksi = mysqli_connect("localhost", "root", "", "origet_db");


// Menangkap data yang dikirimkan oleh aplikasi Flutter
$username = $_POST['username'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
$register = $_POST['register'];

// Query untuk memeriksa apakah email sudah terdaftar
$checkQuery = "SELECT * FROM users WHERE email = '$username'";
$checkResult = mysqli_query($con, $checkQuery);

// Menghitung jumlah baris hasil query
$count = mysqli_num_rows($checkResult);

// Jika email sudah terdaftar, kirimkan respons 'Email sudah terdaftar'
if ($count > 0) {
    $response = [
        'status' => false,
        'message' => 'Email sudah terdaftar'
    ];
    echo json_encode($response);
} else {
    // Jika email belum terdaftar, lakukan proses registrasi
    $insertQuery = "INSERT INTO users (email, phone_number, password) VALUES ('$username', '$no_hp', '$password')";
    if (mysqli_query($con, $insertQuery)) {
        $response = [
            'status' => true,
            'message' => 'Registrasi berhasil'
        ];
        echo json_encode($response);
    } else {
        $response = [
            'status' => false,
            'message' => 'Gagal melakukan registrasi'
        ];
        echo json_encode($response);
    }
}

// Menutup koneksi database
mysqli_close($con);


?>
