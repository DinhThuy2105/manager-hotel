<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveRoomGalleriesQuery = "select * from room_galleries where id = $id";
$removeRoomgalleries = queryExecute($getRemoveRoomGalleriesQuery, false);
if(!$removeRoomgalleries){
    header("location: " . ADMIN_URL . "room_galleries?msg=Ảnh phòng này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "room_galleries?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeRoomgalleriesQuery = "delete from room_galleries where id = $id";
queryExecute($removeRoomgalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries?msg=Xóa ảnh phòng thành công");
die;
