<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getBookingQuery = "select * from booking where id = $id";
$booking = queryExecute($getBookingQuery, false);
if(!$booking){
    header("location: " . ADMIN_URL . "booking?msg=Lượt đặt phòng này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "booking?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeBookingQuery = "delete from booking where id = $id";
queryExecute($removeBookingQuery, false);
header("location: " . ADMIN_URL . "booking?msg=Xóa lượt đặt phòng thành công");
die;
