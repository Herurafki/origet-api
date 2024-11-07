<?php

$table = "products";
$list_xiaomi = all_data(
    $table,
    $where = "WHERE id_category='1'",
    $order = "ORDER BY RAND()",
    $limit = "LIMIT 4"
);

$response['success'] = 1;
$response['message'] = "Data Ditemukan";
foreach($list_xiaomi as $value){

    //Untuk menampilkan seller dari table user//
    $seller = one_data("users", "id_user='".$value['id_user']. "'");

    $response['list_xiaomi']=[
        "image" => PATH . "images/" . $value['image_default'],
        'nama' => $value["nama"],
        'deskripsi' => $value["deskripsi"],
        'harga' => $value["harga"],
        'seller' => $seller[1],
        'rating' => $value["rating"],
        'terjual' => $value["terjual"],
        'lokasi' => $seller[9]
    ];
}
echo json_encode($response);
close_koneksi();
?>