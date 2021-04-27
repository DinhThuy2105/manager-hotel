<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveServicesQuery = "select * from services where id = $id";
$removeServices = queryExecute($getRemoveServicesQuery, false);
if(!$removeServices){
    header("location: " . ADMIN_URL . "services?msg=Dịch vụ này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "services?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeServicesQuery = "delete from services where id = $id";
queryExecute($removeServicesQuery, false);
header("location: " . ADMIN_URL . "services?msg=Xóa dịch vụ thành công");
die;