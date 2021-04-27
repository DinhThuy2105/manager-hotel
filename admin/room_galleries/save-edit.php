<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$room_id = trim($_POST['room_id']);
$img_url = $_FILES['img_url'];

// kiểm tra sự tồn tại
$getRoomGalleriesQuery = "select * from room_galleries where id = $id";
$roomGalleries = queryExecute($getRoomGalleriesQuery, false);

if (!$roomGalleries) {
    header("location: " . ADMIN_URL . 'room_galleries?msg=Ảnh phòng không tồn tại');
    die;
}

// upload file ảnh
$filename = $roomGalleries['img_url'];
if ($img_url['size'] > 0) {
    $filename = uniqid() . '-' . $img_url['name'];
    move_uploaded_file($img_url['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}

// insert services query
$updateRoomGalleriesQuery = "update room_galleries set
                          room_id = '$room_id',
                          img_url = '$filename'
                        where id = '$id'";
dd($updateRoomGalleriesQuery);
queryExecute($updateRoomGalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;
