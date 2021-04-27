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

$getFeedbacksQuery = "select * from customer_feedbacks where id = $id";
$feedbacks = queryExecute($getFeedbacksQuery, false);
if(!$feedbacks){
    header("location: " . ADMIN_URL . "customer_feedbacks?msg=Feedbacks này không tồn tại");
    die;
}

if($_SESSION[AUTH]['role_id'] < 2){
    header("location: " . ADMIN_URL . "customer_feedbacks?msg=Không đủ quyền hạn thực hiện hành động này");
    die;
}

$removeFeedbacksQuery = "delete from customer_feedbacks where id = $id";
queryExecute($removeFeedbacksQuery, false);
header("location: " . ADMIN_URL . "customer_feedbacks?msg=Xóa phản hồi thành công");
die;