<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$icon = $_FILES['icon'];
// validate bằng php
$nameerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}

// kiểm tra services có tồn tại hay không
$getRoomServicesQuery = "select * from room_services where id = $id";
$services = queryExecute($getRoomServicesQuery, false);

if(!$services){
    header("location: " . ADMIN_URL . 'room_services?msg=Dịch vụ phòng không tồn tại');die;
}


if ($nameerr != "") {
    header('location: ' . ADMIN_URL . "room_services/add-form.php?nameerr=$nameerr");
    die;
}

// upload file ảnh
$filename = $services['icon'];
if($icon['size'] > 0){
    $filename = uniqid() . '-' . $icon['name'];
    move_uploaded_file($icon['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
// insert services query
$updateServicesQuery = "update room_services set
                          name = '$name',
                          icon = '$filename',
                          status = '$status'
                        where id = '$id'";
// dd($updateServicesQuery);
queryExecute($updateServicesQuery, false);
header("location: " . ADMIN_URL . "room_services");
die;
