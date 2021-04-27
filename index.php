<?php
session_start();
define('TITLE', 'Home');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
// get data from showcases
$getShowCaseQuery = "select * from showcases";
$showcases = queryExecute($getShowCaseQuery, true);
// get data from banner_slice
$getBannerSliceQuery = "select * from banner_slice where status = 1";
$banner = queryExecute($getBannerSliceQuery, true);
// get data from services
$getServicesQuery = "select * from services";
$services = queryExecute($getServicesQuery, true);
// get data from customer_feedbacks
$getCustomerFeedbacksQuery = "select * from customer_feedbacks where status = 1";
$feedbacks = queryExecute($getCustomerFeedbacksQuery, true);
// get data from news
$getNewsQuery = "select * from news LIMIT 3";
$news = queryExecute($getNewsQuery, true);
// get data from room_types
$getRoomTypesQuery = "select * from room_types order by id ASC limit 4";
$roomTypes = queryExecute($getRoomTypesQuery, true);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="home_one">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start main slider -->
    <div class="main_slider_area">
        <div class="main_slider" id="slider_rev">
            <!-- start hotel booking -->
            <div class="hotel_booking_area">
                <div class="container">
                    <div class="hotel_booking">

                        <form id="book-form" role="form" action="<?= BASE_URL . 'rooms.php' ?>" method="GET">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="room_book border-right-dark-1">
                                    <h6>Tìm</h6>
                                    <p>Phòng</p>
                                </div>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2">
                                <div class="input-group border-bottom-dark-2">
                                    <input class="date-picker" id="datepicker" placeholder="Arrival" name="arrival" type="text" />
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2">
                                <div class="input-group border-bottom-dark-2">
                                    <input class="date-picker" id="datepicker1" placeholder="Departure" name="departure" type="text" />
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
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
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
                                        <div class="input-group border-bottom-dark-2">
                                            <select class="form-control" name="children" id="child">
                                                <option value="" selected>Trẻ nhỏ</option>
                                                <option value="1">1 Người</option>
                                                <option value="2">2 Người</option>
                                                <option value="3">3 Người</option>
                                                <option value="4">4 Người</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <button type="submit" class="btn btn-primary floatright search-rooms">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- special offer start -->
                        <div class="special_offer_main">
                            <img src="<?= BASE_URL . $webSetting['offer'] ?>" alt="">
                        </div>
                        <!-- end offer start -->
                    </div>
                </div>
            </div>
            <!-- end hotel booking -->
            <div class="fullwidthbanner-container">
                <div class="fullwidth_home_banner">
                    <ul>
                        <?php foreach ($banner as $ba) : ?>
                            <li data-transition="random" data-slotamount="7" data-masterspeed="1000">
                                <img src="<?= BASE_URL . $ba['img_path'] ?>" alt="slide">
                                <div class="tp-caption large_black sfr" data-x="105" data-y="197" data-speed="1200" data-start="1100" data-easing="easeInOutBack" style="font-family: 'Playfair Display', serif; font-size: 48px;color: #fefefe; margin-bottom: 23px; text-transform: uppercase; line-height: 40px;">
                                    <?= $ba['firstContent'] ?>
                                </div>
                                <div class="tp-caption large_black sfr" data-x="105" data-y="255" data-speed="1500" data-start="1400" data-easing="easeInOutBack" style="font-family: 'Playfair Display', serif; font-size: 48px;color: #fefefe; margin-bottom: 23px; text-transform: uppercase; line-height: 40px;">
                                    <?= $ba['secondContent'] ?>
                                </div>
                                <div class="tp-caption lfb carousel-caption-inner" data-x="105" data-y="313" data-speed="1300" data-start="1700" data-easing="easeInOutBack" style="background: #f7c411; padding: 10px; cursor: pointer;">
                                    <a href="<?= $webSetting['explore_url'] ?>" class="" style="background: #f7c411; border-radius: 0; color: #313a45; display: inline-block;  font-size: 18px; padding: 8px 34px; text-transform: uppercase; border: 1px solid #9e811a;">Explore IT</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end main slider -->

    <!-- start welcome section -->
    <section class="welcome_area">
        <div class="container">
            <div class="welcome">
                <div class="section_title nice_title content-center">
                    <h3>Welcome To Hotel</h3>
                </div>
                <div class="section_description">
                    <p><?= $webSetting['introduce_welcome'] ?></p>
                </div>
                <div class="row">
                    <?php foreach ($roomTypes as $room) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single_room_wrapper clearfix">
                                <figure class="uk-overlay uk-overlay-hover">
                                    <div class="room_media">
                                        <a href="#"><img src="<?=$room['feature_image']?>" alt=""></a>
                                    </div>
                                    <div class="room_title border-bottom-whitesmoke clearfix">
                                        <div class="left_room_title floatleft">
                                            <h6><?=$room['name']?></h6>
                                            <p>$<?=$room['price']?>/ <span>night</span></p>
                                        </div>
                                        <div class="left_room_title floatright">
                                            <a href="<?=BASE_URL . 'room-details.php?id=' . $room['id']?>" class="btn">Book</a>
                                        </div>
                                    </div>
                                    <div class="uk-overlay-panel uk-overlay-background single_wrapper_details clearfix animated bounceInDown">
                                        <div class="border-dark-1 padding-22 clearfix single_wrapper_details_pad">
                                            <h5><?=$room['name']?></h5>
                                            <p>
                                                <?=$room['short_descript']?>
                                            </p>
                                            <div class="single_room_cost clearfix">
                                                <div class="floatleft">
                                                    <p>$<?=$room['price']?>/ <span>night</span></p>
                                                </div>
                                                <div class="floatright">
                                                    <a href="<?=BASE_URL . 'room-details.php?id=' . $room['id']?>" class="btn">Book</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end welcome section -->

    <!-- start Hotel Facilities section -->
    <section class="hotel_facilities_area margin-top-115 margin-bottom-100">
        <div class="container">
            <div class="hotel_facilities">
                <div class="section_title nice_title content-center">
                    <h3>Hotel services</h3>
                </div>
                <div class="hotel_facilities_content">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#sports-club" aria-controls="sports-club" role="tab" data-toggle="tab"><img src="./public/img/home-facilities-icon-seven.png" alt="sports-club"><span>sports-club</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#restaurant" aria-controls="restaurant" role="tab" data-toggle="tab"><img src="./public/img/home-facilities-icon-eleven.png" alt="restaurant"><span>restaurant</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#pick-up" aria-controls="pick-up" role="tab" data-toggle="tab"><img src="./public/img/home-facilities-icon-eight.png" alt="pick-up"><span>pick-up</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#bar" aria-controls="bar" role="tab" data-toggle="tab"><img src="./public/img/home-facilities-icon-nine.png" alt="bar"><span>bar</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#gym" aria-controls="gym" role="tab" data-toggle="tab"><img src="./public/img/home-facilities-icon-ten.png" alt="gym"><span>gym</span></a>
                            </li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php foreach ($services as $service) : ?>
                                <div role="tabpanel" class="tab-pane <?php if ($service['active'] == 1) : ?>active<?php endif; ?>" id="<?= $service['idName'] ?>">
                                    <div class="single-tab-content">
                                        <div class="row">
                                            <div class="co-lg-5 col-md-5 col-sm-6">
                                                <div class="single-tab-image">
                                                    <a href="#"><img src="<?= BASE_URL . $service['feature_img'] ?>" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="co-lg-7 col-md-7 col-sm-6">
                                                <div class="single-tab-details">
                                                    <?= $service['introduce'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Hotel Facilities section -->

    <!-- start About Us section -->
    <section class="about_us_area margin-bottom-128">
        <div class="container">
            <div class="about_us clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padding-left-0">
                    <div class="news">
                        <div class="section_title margin-bottom-50">
                            <h5>News</h5>
                        </div>
                        <div class="section_description">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($news as $new) : ?>
                                        <div class="single_content clearfix border-top-whitesmoke padding-top-10">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4 padding-left-0">
                                                <div class="post_media">
                                                    <a href="<?= BASE_URL . 'single-blog.php?id=' . $new['id'] ?>"><img src="<?= BASE_URL . $new['feature_image'] ?>" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 padding-left-10">
                                                <div class="post_title clearfix">
                                                    <h6><a href="<?= BASE_URL . 'single-blog.php?id=' . $new['id'] ?>"><?= $new['title'] ?></a></h6>
                                                </div>
                                                <div class="post_content  margin-bottom-35">
                                                    <p><?= $new['created_at'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="showcase">
                        <div class="section_title margin-bottom-50">
                            <h5>Hotel Showcase</h5>
                        </div>
                        <div class="section_description">
                            <div class="clearfix demo">
                                <ul id="vertical" class="gallery list-unstyled">
                                    <?php foreach ($showcases as $showcase) : ?>
                                        <li data-thumb="<?= PUBLIC_URL . $showcase['img_path'] ?>">
                                            <img alt="slider" src="<?= PUBLIC_URL . $showcase['img_path'] ?>" />
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="customer_says">
                        <div class="section_title margin-bottom-50">
                            <h5>Customer Says</h5>
                        </div>
                        <div class="section_description">
                            <div id="customer_says_slider" class="carousel slide" data-ride="carousel" data-pause="none">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php foreach ($feedbacks as $feedback) : ?>
                                        <div class="item <?php if ($feedback['active'] == 1) : ?> active <?php endif; ?>">
                                            <div class="single_says">
                                                <div class="customer_comment">
                                                    <?= $feedback['content'] ?>
                                                </div>
                                                <div class="customer_detail clearfix">
                                                    <div class="customer_pic alignleft-20">
                                                        <a href="#"><img src="<?= $feedback['avatar'] ?>" alt="" width="50"></a>
                                                    </div>
                                                    <div class="customer_identity floatleft">
                                                        <h6><?= $feedback['name'] ?></h6>
                                                        <p><?= $feedback['address'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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
            </div>
        </div>
    </section>
    <!-- end About Us section -->
    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->
    <script>
        $(document).ready(() => {
            <?php if (isset($_GET['msg'])) : ?>
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: "<?= $_GET['msg']; ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
            setTimeout(() => {
                sessionStorage.clear();
            }, 2500);
        });
    </script>
</body>
</html>
