<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$icon = $_FILES['icon'];
// validate bằng php
$nameerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}

if ($nameerr != "") {
    header('location: ' . ADMIN_URL . "room_services/add-form.php?nameerr=$nameerr");
    die;
}

// upload file ảnh
$filename = "";
if($icon['size'] > 0){
    $filename = uniqid() . '-' . $icon['name'];
    move_uploaded_file($icon['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
// insert services query
$insertServicesQuery = "insert into room_services
                          (name, icon, status)
                    values
                          ('$name', '$filename', '$status')";
queryExecute($insertServicesQuery, false);
header("location: " . ADMIN_URL . "room_services");
die;
