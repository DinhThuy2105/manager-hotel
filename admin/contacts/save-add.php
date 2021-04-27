<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone_number = trim($_POST['phone_number']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);
if ($name && $email && $phone_number && $subject && $message) {
    $status = INACTIVE;
}
// validate bằng php
$nameerr = "";
$emailerr = "";
$phone_numbererr = "";
$subjecterr = "";
$messageerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email
if (strlen($email) == 0) {
    $emailerr = "Yêu cầu nhập email!";
}
if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "Không đúng định dạng email";
}

// check phone_number
if (strlen($phone_number) < 9 && strlen($phone_number) > 11) {
    $phone_numbererr = "Yêu cầu nhập số điện thoại từ 9 đến 10 chữ số";
}

// check subject
if (strlen($subject) < 2 || strlen($subject) > 191) {
    $subjecterr = "Yêu cầu nhập chủ đề phản hồi nằm trong khoảng 2-191 ký tự";
}

// check message
if (strlen($message) < 2) {
    $messageerr = "Yêu cầu nhập nội dung phản hồi, không được để trống";
}

if ($nameerr . $emailerr . $phone_numbererr . $subjecterr . $messageerr != "") {
    header('location: ' . ADMIN_URL . "contacts/add-form.php?nameerr=$nameerr&emailerr=$emailerr&phone_number=$phone_numbererr&subject=$subjecterr&message=$messageerr");
    die;
}

// query upload to DB
$insertContactQuery = "insert into contacts
                          (name, phone_number, email, subject, messages, status)
                    values
                          ('$name', '$phone_number', '$email', '$subject', '$message', '$status')";

$reply_now = 'Xin cảm ơn bạn đã phản hồi tới chúng tôi, bạn sẽ nhận được phản hồi của chúng tôi sớm nhất. Trân trọng cảm ơn!';
queryExecute($insertContactQuery, false);
header("location: " . BASE_URL . "contact-us.php?msg=$reply_now");
die;
