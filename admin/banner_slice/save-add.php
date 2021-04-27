<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$firstContent = trim($_POST['firstContent']);
$secondContent = trim($_POST['secondContent']);
$status = trim($_POST['status']);
$img_path = $_FILES['img_path'];

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
$filename = "";
if($img_path['size'] > 0){
    $filename = uniqid() . '-' . $img_path['name'];
    move_uploaded_file($img_path['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}

$insertBannerQuery = "insert into banner_slice
                          (firstContent, secondContent, img_path, status)
                    values
                          ('$firstContent', '$secondContent', '$filename', '$status')";
queryExecute($insertBannerQuery, false);
header("location: " . ADMIN_URL . "banner_slice");
die;
