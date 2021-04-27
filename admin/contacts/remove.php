<?php
/**
 * 1. lấy id xuống
 * 2. kiểm tra xem có quyền để xóa tài khoản với id đc nhận hay không
 * 4. thực hiện câu lệnh xóa với csdl
 * 5. điều hướng về danh sách
 *
 */
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveContactQuery = "select * from contacts where id = $id";
$removeContact = queryExecute($getRemoveContactQuery, false);
if(!$removeContact){
    header("location: " . ADMIN_URL . "contacts?msg=Liên hệ không tồn tại");
    die;
}

$removeContact = "delete from contacts where id = $id";
queryExecute($removeContact, false);
header("location: " . ADMIN_URL . "contacts?msg=Xóa liên hệ thành công");
die;