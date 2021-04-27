<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveRoomServicesQuery = "select * from room_services where id = $id";
$removeRoomServices = queryExecute($getRemoveRoomServicesQuery, false);
if(!$removeRoomServices){
    header("location: " . ADMIN_URL . "room_services?msg=Dịch vụ này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "room_services?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeRoomServicesQuery = "delete from room_services where id = $id";
queryExecute($removeRoomServicesQuery, false);
header("location: " . ADMIN_URL . "room_services?msg=Xóa dịch vụ thành công");
die;
