<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
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

// kiểm tra services có tồn tại hay không
$getServicesQuery = "select * from services where id = $id";
$services = queryExecute($getServicesQuery, false);

if(!$services){
    header("location: " . ADMIN_URL . 'services?msg=Services không tồn tại');die;
}

// upload file ảnh
$filename = $services['feature_img'];
if($feature_img['size'] > 0){
    $filename = uniqid() . 'service-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
// insert services query
$updateServicesQuery = "update services set
                          name = '$name',
                          feature_img = '$filename',
                          introduce = '$introduce',
                          status = '$status'
                        where id = '$id'";
// dd($updateServicesQuery);
queryExecute($updateServicesQuery, false);
header("location: " . ADMIN_URL . "services");
die;
