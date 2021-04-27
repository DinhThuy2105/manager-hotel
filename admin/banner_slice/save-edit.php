<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();

$id = trim($_POST['id']);
$firstContent = trim($_POST['firstContent']);
$secondContent = trim($_POST['secondContent']);
$status = trim($_POST['status']);
$img_path = $_FILES['img_path'];

// kiem tra su ton tai cua banner
$getBannerSliceQuery = "select * from banner_slice where id = '$id'";
$banner = queryExecute($getBannerSliceQuery, false);

// validate bằng php
$firstContenterr = "";
$secondContenterr = "";

// check content input
if (strlen($firstContent) < 0) {
    $firstContenterr = "Không được để trống";
}
if (strlen($secondContent) < 0) {
    $secondContenterr = "Không được để trống";
}

if ($firstContenterr . $secondContenterr != "") {
    header('location: ' . ADMIN_URL . "banner_slice/add-form.php?firstContent=$firstContenterr&secondContent=$secondContenterr");
    die;
}

// upload file ảnh
$filename = $banner['img_path'];
if($img_path['size'] > 0){
    $filename = uniqid() . '-' . $img_path['name'];
    move_uploaded_file($img_path['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}
$updateBannerQuery = "update banner_slice
                    set
                          firstContent = '$firstContent',
                          secondContent = '$secondContent',
                          status = '$status',
                          img_path = '$filename'
                    where id = $id";
queryExecute($updateBannerQuery, false);
header("location: " . ADMIN_URL . "banner_slice");
die;
