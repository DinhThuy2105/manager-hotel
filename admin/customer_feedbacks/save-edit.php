<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();

$id = trim($_POST['id']);
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$content = trim($_POST['content']);
$status = trim($_POST['status']);
$avatar = $_FILES['avatar'];
// validate bằng php
$nameerr = "";
$addresserr = "";
$contenterr = "";

// kiểm tra feedbacks có tồn tại hay không
$getFeedbacksQuery = "select * from customer_feedbacks where id = $id";
$feedbacks = queryExecute($getFeedbacksQuery, false);

if(!$feedbacks){
    header("location: " . ADMIN_URL . 'customer_feedbacks?msg=Phản hồi không tồn tại');die;
}

// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

if(strlen($content) < 2) {
    $contenterr = "Không thể nhập nội dung dưới 2 ký tự";
}

if ($nameerr . $addresserr . $contenterr != "") {
    header('location: ' . ADMIN_URL . "customer_feedbacks/add-form.php?nameerr=$nameerr&addresserr=$addresserr&contenterr=$contenterr");
    die;
}

// upload file ảnh
$filename = $feedbacks['avatar'];
if($avatar['size'] > 0){
    $filename = uniqid() . 'feedback-' . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
// update query
$updateFeedbacksQuery = "update customer_feedbacks set
                          name = '$name',
                          address = '$address',
                          avatar = '$filename',
                          content = '$content',
                          status = '$status'
                    where id = '$id'";
// dd($updateFeedbacksQuery);
queryExecute($updateFeedbacksQuery, false);
header("location: " . ADMIN_URL . "customer_feedbacks");
die;
