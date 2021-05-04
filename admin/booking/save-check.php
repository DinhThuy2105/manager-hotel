<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$status = trim($_POST['status']);
$reply_by = trim($_POST['reply_by']);
$checked_in = trim($_POST['checked_in']);
$start_time = trim($_POST['start_time']);
$reply_messages = trim($_POST['reply_messages']);
// $message = trim($_POST['message']);
if ($reply_messages) {
    $status = INACTIVE;
}
// validate bằng php
// $nameerr = "";
// $emailerr = "";
// $phone_numbererr = "";
// $subjecterr = "";
// $messageerr = "";
// // check name
// if (strlen($name) < 2 || strlen($name) > 191) {
//     $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
// }

// // check email
// if (strlen($email) == 0) {
//     $emailerr = "Yêu cầu nhập email!";
// }
// if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $emailerr = "Không đúng định dạng email";
// }

// // check phone_number
// if (strlen($phone_number) < 9 && strlen($phone_number) > 11) {
//     $phone_numbererr = "Yêu cầu nhập số điện thoại từ 9 đến 10 chữ số";
// }

// // check subject
// if (strlen($subject) < 2 || strlen($subject) > 191) {
//     $subjecterr = "Yêu cầu nhập chủ đề phản hồi nằm trong khoảng 2-191 ký tự";
// }

// // check message
// if (strlen($message) < 2) {
//     $messageerr = "Yêu cầu nhập nội dung phản hồi, không được để trống";
// }

// if ($nameerr . $emailerr . $phone_numbererr . $subjecterr . $messageerr != "") {
//     header('location: ' . ADMIN_URL . "booking/check-form.php?nameerr=$nameerr&emailerr=$emailerr&phone_number=$phone_numbererr&subject=$subjecterr&message=$messageerr");
//     die;
// }

// query upload to DB
$updateBookingQuery = "update booking set ";
if(!empty($status)){
    $updateBookingQuery .= "status = ".(int)$status;
}
if(!empty($reply_by)){
    $updateBookingQuery .= ",reply_by = $reply_by";
}
if(!empty($checked_in)){
    $updateBookingQuery .= ", checked_in = $checked_in";
}
if(!empty($start_time)){
    $updateBookingQuery .= ", checked_in_date = '".date('Y-m-d H:s', strtotime($start_time))."'";
}
if(!empty($reply_messages)){
    $updateBookingQuery .= ", reply_messages = '$reply_messages' ";
}
$updateBookingQuery .= " where id = $id";
$reply_now = 'Xin cảm ơn bạn đã phản hồi tới chúng tôi, bạn sẽ nhận được phản hồi của chúng tôi sớm nhất. Trân trọng cảm ơn';
queryExecute($updateBookingQuery, false);
// header("location: " . BASE_URL . "contact-us.php?reply_now=$reply_now");
header("location: " . BASE_URL . "admin/booking/index.php");
die;
