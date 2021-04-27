<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveRoomTypesQuery = "select * from room_types where id = $id";
$removeRoomTypes = queryExecute($getRemoveRoomTypesQuery, false);
if(!$removeRoomTypes){
    header("location: " . ADMIN_URL . "room_types?msg=Dịch vụ này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "room_types?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeRoomTypesQuery = "delete from room_types where id = $id";
queryExecute($removeRoomTypesQuery, false);
header("location: " . ADMIN_URL . "room_types?msg=Xóa dịch vụ thành công");
die;
