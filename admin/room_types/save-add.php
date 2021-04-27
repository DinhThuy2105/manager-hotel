<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$quantity = trim($_POST['quantity']);
$price = trim($_POST['price']);
$adult= trim($_POST['adult']);
$children = trim($_POST['children']);
$service = $_POST['service'];
$feature_img = $_FILES['feature_img'];
$short_descript = trim($_POST['short_descript']);
// validate bằng php
$nameerr = "";
$quantityerr = "";
$priceerr = "";
$adulterr = "";
$childrenerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}
if (strlen($quantity) < 1) {
    $quantityerr = "Không thể nhập số lượng phòng nhỏ hơn một";
}

if (strlen($quantity) > 50) {
    $quantityerr = "Không thể nhập số lượng phòng lớn hơn năm mươi";
}

if (strlen($price) < 0) {
    $priceerr = "Không thể nhập giá phòng nhỏ hơn 0";
}

if(strlen($children) < 0) {
    $childrenerr = "Không thể nhập số người nhỏ hơn 0";
}

if(strlen($adult) < 0) {
    $adulterr = "Không thể nhập số người nhỏ hơn 0";
}

if ($nameerr . $quantityerr . $priceerr . $childrenerr . $adulterr != "") {
    header('location: ' . ADMIN_URL . "room_types/add-form.php?nameerr=$nameerr&quantityerr=$quantityerr&priceerr=$priceerr&children=$childrenerr&adult=$adulterr");
    die;
}

// upload file ảnh
$filename = "";
if ($feature_img['size'] > 0) {
    $filename = uniqid() . '-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/img/" . $filename);
    $filename = "public/img/" . $filename;
}

$insertRoomTypeQuery = "insert into room_types
                          (name, status, price, quantity, adult, children, short_descript, feature_image)
                    values
                          ('$name', '$status', '$price', '$quantity', '$adult', '$children', '$short_descript', '$filename')";
queryExecute($insertRoomTypeQuery, false);

$roomTypesId = "select id from room_types where name = '$name'";
$idArr = queryExecute($roomTypesId, false);
$id = $idArr[0];

for ($i = 0; $i < count($service); $i++) {
    $insertRoomSerXref = "insert into room_service_xref
                (room_id, services_id)
            values
                ('$id','$service[$i]')";
    queryExecute($insertRoomSerXref, false);
};

header("location: " . ADMIN_URL . "room_types");
die;
