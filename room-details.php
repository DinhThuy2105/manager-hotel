<?php
session_start();
define('TITLE', 'Room detail');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

// get data from url
$roomId = isset($_GET['id']) ? $_GET['id'] : "";
$arrival = isset($_GET['arrival']) ? $_GET['arrival'] : "";
$departure = isset($_GET['departure']) ? $_GET['departure'] : "";
$adult = isset($_GET['adult']) ? $_GET['adult'] : "";
$children = isset($_GET['children']) ? $_GET['children'] : "";

// get data from room types
$getRoomTypesQuery = "select *from room_types where id ='$roomId' and status = 1";
$roomTypes = queryExecute($getRoomTypesQuery, false);

$_SESSION[BOOK] = $roomTypes;
// save data to session
$_SESSION[BOOK]['arrival'] = $arrival;
$_SESSION[BOOK]['departure'] = $departure;
$_SESSION[BOOK]['adult'] = $adult;
$_SESSION[BOOK]['children'] = $children;

$getServiceQuery = "select s.id, s.name, s.icon
                        from room_service_xref sxr
                        join room_services s
                        on sxr.services_id = s.id
                    where sxr.room_id = " . $roomTypes['id'];
$services = queryExecute($getServiceQuery, true);
$room['room_sv'] = $services;
// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
//get data from room galleries
$getRoomGalleriesQuery = "select * from room_galleries where room_id = '$roomId'";
$roomGalleries = queryExecute($getRoomGalleriesQuery, true);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="room_detail_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2><?= $roomTypes['name'] ?></h2>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <div class="container">
                            <div class="special_offer_sub">
                                <img src="<?= BASE_URL . $webSetting['offer'] ?>" alt="imf">
                            </div>
                        </div>
                    </div>
                    <!-- end offer start -->
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrunb -->

    <div class="room_detail_main margin-bottom-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="deluxe_room_detail">
                        <div class="section_title content-left margin-bottom-5">
                            <h5><?= $roomTypes['name'] ?> Detail <span class="price floatright">$ <?= $roomTypes['price'] ?></span> <br> <span class="day floatright">/ night</span></h5>
                        </div>
                        <div class="section_content">
                            <p>Checkout the latest deal</p>
                            <div class="showcase">
                                <div class="section_description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="clearfix">
                                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                                    <?php foreach ($roomGalleries as $roomGallerie) : ?>
                                                        <li data-thumb="<?= BASE_URL . $roomGallerie['img_url'] ?>">
                                                            <img alt="slider" src="<?= BASE_URL . $roomGallerie['img_url'] ?>" />
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="facilities_name clearfix margin-bottom-40 margin-top-65">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="section_title margin-bottom-35 padding-bottom-25 border-bottom-whitesmoke">
                                                    <h5>Dịch vụ phòng</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-35">
                                                <div class="list-services">
                                                    <?php foreach ($room['room_sv'] as $rSer) : ?>
                                                        <div class="row">
                                                            <img src="<?= BASE_URL . $rSer['icon'] ?>" class="col-3" alt="">
                                                            <span class="col-6 font-weight-bold"><?= $rSer['name'] ?></span>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="section_title padding-bottom-25">
                                                <h5>Mô tả</h5>
                                            </div>
                                            <div class="room_facilities_des padding-top-50 padding-bottom-50 border-bottom-whitesmoke border-top-whitesmoke">
                                                <?= $roomTypes['short_descript'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- start welcome section -->
                                        <section class="welcome_area">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="welcome">
                                                    <div class="section_title content-left margin-top-50 margin-bottom-30">
                                                        <h5>You may Also like</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                            <div class="single_room_wrapper clearfix">
                                                                <div class="room_wrapper">
                                                                    <div class="room_media">
                                                                        <a href="#"><img src="<?= PUBLIC_URL ?>img/room-image-ten.jpg" alt=""></a>
                                                                    </div>
                                                                    <div class="room_title clearfix">
                                                                        <div class="left_room_title floatleft">
                                                                            <h6>Deluxe Room</h6>
                                                                            <p>$180/ <span>night</span></p>
                                                                        </div>
                                                                        <div class="left_room_title floatright">
                                                                            <a href="#" class="btn">Book</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                            <div class="single_room_wrapper clearfix">
                                                                <div class="room_wrapper">
                                                                    <div class="room_media">
                                                                        <a href="#"><img src="<?= PUBLIC_URL ?>img/room-image-twelve.jpg" alt=""></a>
                                                                    </div>
                                                                    <div class="room_title clearfix">
                                                                        <div class="left_room_title floatleft">
                                                                            <h6>Deluxe Room</h6>
                                                                            <p>$180/ <span>night</span></p>
                                                                        </div>
                                                                        <div class="left_room_title floatright">
                                                                            <a href="#" class="btn">Book</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                            <div class="single_room_wrapper clearfix">
                                                                <div class="room_wrapper">
                                                                    <div class="room_media">
                                                                        <a href="#"><img src="<?= PUBLIC_URL ?>img/room-image-thirteen.jpg" alt=""></a>
                                                                    </div>
                                                                    <div class="room_title clearfix">
                                                                        <div class="left_room_title floatleft">
                                                                            <h6>Deluxe Room</h6>
                                                                            <p>$180/ <span>night</span></p>
                                                                        </div>
                                                                        <div class="left_room_title floatright">
                                                                            <a href="#" class="btn">Book</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- end welcome section -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                    <!-- start hotel booking -->
                    <div class="col-lg-12 col-md-12 col-sm-4">
                        <div class="hotel_booking_area clearfix">
                            <div class="hotel_booking">

                                <form id="form1" role="form" action="<?= BASE_URL . 'booking.php' ?>" method="POST">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="hidden" name="roomId" value="<?= $roomTypes['id'] ?>">
                                        <div class="room_book">
                                            <p>Đặt phòng ngay</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="input-group border-bottom-dark-2">
                                            <input class="date-picker" id="datepicker" type="text" name="arrival" value="<?= $arrival ?>" />
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="input-group border-bottom-dark-2">
                                            <input class="date-picker" id="datepicker1" type="text" name="departure" value="<?= $departure ?>" />
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-6 icon_arrow">
                                                <div class="input-group border-bottom-dark-2">
                                                    <select class="form-control" name="room" id="room">
                                                        <option selected="selected" disabled="disabled">Số phòng</option>
                                                        <option value="1">1 phòng</option>
                                                        <option value="2">2 phòng</option>
                                                        <option value="3">3 phòng</option>
                                                        <option value="4">4 phòng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 icon_arrow">
                                                <div class="input-group border-bottom-dark-2">
                                                    <select class="form-control" name="bed" id="bed">
                                                        <option selected="selected" disabled="disabled">Số giường</option>
                                                        <option value="1">1 giường</option>
                                                        <option value="2">2 giường</option>
                                                        <option value="3">3 giường</option>
                                                        <option value="4">4 giường</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 icon_arrow">
                                                <div class="input-group border-bottom-dark-2">
                                                    <select class="form-control" name="adult" id="adult">
                                                        <option value="" selected>Người lớn</option>
                                                        <option value="1">1 Người</option>
                                                        <option value="2">2 Người</option>
                                                        <option value="3">3 Người</option>
                                                        <option value="4">4 Người</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 icon_arrow">
                                                <div class="input-group border-bottom-dark-2">
                                                    <select class="form-control" name="children" id="children">
                                                        <option value="" selected>Trẻ nhỏ</option>
                                                        <option value="1">1 Trẻ</option>
                                                        <option value="2">2 Trẻ</option>
                                                        <option value="3">3 Trẻ</option>
                                                        <option value="4">4 Trẻ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-warning btn-md">Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end hotel booking -->
                    <!-- start client says slider -->
                    <div class="col-lg-12 col-md-12 col-sm-4">
                        <div class="customer_says margin-top-65">
                            <div class="section_title margin-bottom-30">
                                <h5>Customer Review</h5>
                            </div>
                            <div class="section_description">
                                <div id="customer_says_slider" class="carousel slide" data-ride="carousel" data-pause="none">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <div class="single_says">
                                                <div class="customer_comment">
                                                    <p>
                                                        Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.
                                                    </p>
                                                    <p>
                                                        Nam sed placerat libero, non eleifend dolor.
                                                    </p>
                                                </div>
                                                <div class="customer_detail clearfix">
                                                    <div class="customer_pic alignright-20">
                                                        <a href="#"><img src="img/customer-says-one.png" alt=""></a>
                                                    </div>
                                                    <div class="customer_identity floatright">
                                                        <h6>John Doe</h6>
                                                        <p>www.john.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="single_says">
                                                <div class="customer_comment">
                                                    <p>
                                                        Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.
                                                    </p>
                                                    <p>
                                                        Nam sed placerat libero, non eleifend dolor.
                                                    </p>
                                                </div>
                                                <div class="customer_detail clearfix">
                                                    <div class="customer_pic alignright-20">
                                                        <a href="#"><img src="img/customer-says-one.png" alt=""></a>
                                                    </div>
                                                    <div class="customer_identity floatright">
                                                        <h6>John Doe</h6>
                                                        <p>www.john.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="slider_says left" href="#customer_says_slider" role="button" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="slider_says right" href="#customer_says_slider" role="button" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end client says slider -->
                </div>
            </div>
        </div>
    </div>

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->
    <script>
        var adult = document.getElementById('adult');
        adult.value = <?= $adult ?>;
        var children = document.getElementById('children');
        children.value = <?= $children ?>;

        setTimeout(() => {
            sessionStorage.clear();
        }, 2500);
    </script>
</body>

</html>
