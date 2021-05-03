<?php
session_start();
define('TITLE', 'About us');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="about_us_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Giới thiệu</h2>
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

    <!-- start our room facilities -->
    <section class="our_room_facilities_area">
        <div class="container">
            <div class="our_room_facilities margin-bottom-70">
                <div class="facilities_top_para">
                    <p>
                    Với chất lượng đạt chuẩn Quốc tế 4 sao,  Khách sạn Locania không chỉ đáp ứng hoàn hảo nhu cầu nghỉ ngơi của Quý khách mà còn mang đến những giây phút thư giãn giải trí tuyệt vời và để lại dư vị ấn tượng trong văn hóa ẩm thực nơi đây. Khách sạn là sự kết hợp hài hòa của phong cách mang màu sắc sang trọng, hiện đại và cổ kính bao gồm cả quần thể Nhà hàng, Bể Bơi, sân Tennis và các khu vui chơi giải trí khác được quy tụ trong một khuôn viên rộng lớn gần 15.000 m2 .
                    </p>
                </div>
                <div class="facilities_main_part">
                    <div class="section_title margin-top-80 margin-bottom-35">
                        <h5>Các tiện ích</h5>
                    </div>
                    <div class="row">
                        <div class="facilities_name clearfix margin-bottom-45">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <ul class="single_facilities_name clearul">
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-one.png" alt="">
                                        <p>Breakfast</p>
                                    </li>
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-four.png" alt="">
                                        <p>Room service</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <ul class="single_facilities_name clearul">
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-two.png" alt="">
                                        <p>Air conditioning</p>
                                    </li>
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-ten.png" alt="">
                                        <p>GYM fecility</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <ul class="single_facilities_name clearul">
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-eight.png" alt="">
                                        <p>Free Parking</p>
                                    </li>
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-five.png" alt="">
                                        <p>TV LCD</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <ul class="single_facilities_name clearul border-right-whitesmoke">
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-three.png" alt="">
                                        <p>Pet allowed</p>
                                    </li>
                                    <li>
                                        <img src="<?= PUBLIC_URL ?>img/home-facilities-icon-twelve.png" alt="">
                                        <p>Wi-fi service</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12">
                                <div class="single_facilities_name clearfix">
                                    <a href="<?=BASE_URL . 'accomodation.php'?>" class="btn btn-warning btn-md">Đặt phòng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="hotel_stuff">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="section_title margin-bottom-40">
                                    <h5>Đội ngũ nhân viên</h5>
                                </div>
                            </div>
                            <div class="section_content">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff margin-bottom-30">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-one.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Quản lý khách sạn</span>
                                                <p>
                                                   Là người sáng lập khách sạn Locania và phát triển nó thành chuỗi khách sạn nổi tiếng .
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff margin-bottom-30">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-two.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Martin Doe</h6>
                                                <span>Quản lý khách sạn</span>
                                                <p>
                                                Là người sáng lập khách sạn Locania và phát triển nó thành chuỗi khách sạn nổi tiếng.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff margin-bottom-30">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-three.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>John Doe</h6>
                                                <span>Quản lý khách sạn</span>
                                                <p>
                                                    Là người sáng lập khách sạn Locania và phát triển nó thành chuỗi khách sạn nổi tiếng.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff margin-bottom-30">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-four.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Lễ tân</span>
                                                <p>
                                                    Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan rna.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-five.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Tiếp viên</span>
                                                <p>
                                                    Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan rna.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-six.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Quản lý nhân sự</span>
                                                <p>
                                                    Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan rna.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-seven.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Hotel Manager</span>
                                                <p>
                                                    Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan rna.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="single_staff">
                                        <figure class="uk-overlay uk-overlay-hover">
                                            <img src="<?= PUBLIC_URL ?>img/about-us-staff-eight.jpg" alt="img">
                                            <div class="uk-overlay-panel uk-overlay-background single_staff_details">
                                                <h6>Dohn Doe</h6>
                                                <span>Hotel Manager</span>
                                                <p>
                                                    Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan rna.
                                                </p>
                                                <div class="social_icons clearfix">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end our room facilities -->

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->

</body>

</html>
