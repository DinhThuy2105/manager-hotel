<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$email = trim($_POST['email']);
$phone_number = trim($_POST['phone_number']);
$address = trim($_POST['address']);
$map_url = trim($_POST['map_url']);
$youtube_url = trim($_POST['youtube_url']);
$facebook_url = trim($_POST['facebook_url']);
$instagram_url = trim($_POST['instagram_url']);
$explore_url = trim($_POST['explore_url']);
$introduce_welcome = trim($_POST['introduce_welcome']);
$logo = $_FILES['logo'];
$offer = $_FILES['offer'];

// validate bằng php
$nameerr = "";
$phone_numbererr= "";
$emailerr = "";
$addresserr = "";
$map_urlerr = "";
$youtube_urlerr = "";
$instagram_urlerr = "";
$explore_urlerr = "";
$instroduce_welcomeerr = "";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

if (strlen($phone_number) !== 10) {
    $phone_numbererr = "Số điện thoại gồm 10 chữ số";
}

// check email
if(strlen($email) == 0){
    $emailerr = "Yêu cầu nhập email!";
}
if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "Không đúng định dạng email";
}


if($nameerr. $phone_numbererr . $emailerr != "" ){
    header('location: ' . ADMIN_URL . "web_settings/edit-form.php?id=$id&nameerr=$nameerr&phone_numbererr=$phone_numbererr&emailerr=$emailerr");
    die;
}
// get data from web setting
$getWebSettingQuery = "select * from web_settings where id = '$id'";
$webSetting = queryExecute($getWebSettingQuery, false);
// upload logo file
$filenameLogo = $webSetting['logo'];
if($logo['size'] > 0){
    $filenameLogo = uniqid() . 'logo-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], "../../public/img/" . $filenameLogo);
    $filenameLogo = "public/img/" . $filenameLogo;
}

// upload offer file
$filenameOffer = $webSetting['offer'];
if($offer['size'] > 0){
    $filenameOffer = uniqid() . 'logo-' . $offer['name'];
    move_uploaded_file($offer['tmp_name'], "../../public/img/" . $filenameOffer);
    $filenameOffer = "public/img/" . $filenameOffer;
}

$updateSettingQuery = "update web_settings
                    set
                          name = '$name',
                          status = '$status',
                          email = '$email',
                          phone_number = '$phone_number',
                          address = '$address',
                          map_url = '$map_url',
                          youtube_url = '$youtube_url',
                          facebook_url = '$facebook_url',
                          instagram_url = '$instagram_url',
                          explore_url = '$explore_url',
                          logo = '$filenameLogo',
                          offer = '$filenameOffer',
                          introduce_welcome = '$introduce_welcome'
                    where id = $id";
queryExecute($updateSettingQuery, false);
header("location: " . ADMIN_URL . "web_settings");
die;
