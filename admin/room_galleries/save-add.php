<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$room_id = trim($_POST['room_id']);
$img_url = $_FILES['img_url'];

// upload file ảnh
$filename = "";
if($img_url['size'] > 0){
    $filename = uniqid() . '-' . $img_url['name'];
    move_uploaded_file($img_url['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}

$insertRoomGalleriesQuery = "insert into room_galleries
                          (room_id, img_url)
                    values
                          ('$room_id', '$filename')";
queryExecute($insertRoomGalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;
