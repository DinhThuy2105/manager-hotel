<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$introduce = trim($_POST['introduce']);
$status = trim($_POST['status']);
$feature_img = $_FILES['feature_img'];
// validate bằng php
$nameerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}

// upload file ảnh
$filename = "";
if($feature_img['size'] > 0){
    $filename = uniqid() . 'service-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
// insert services query
$insertServicesQuery = "insert into services
                          (name, feature_img, introduce, status)
                    values
                          ('$name', '$filename', '$introduce', '$status')";
queryExecute($insertServicesQuery, false);
header("location: " . ADMIN_URL . "services");
die;
