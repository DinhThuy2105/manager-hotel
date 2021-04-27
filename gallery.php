<?php
session_start();
define('TITLE', 'Galleries');
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

<body id="gallery_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Gallery</h2>
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

    <!-- start other detect room section -->
    <div class="other_room_area">
        <div class="container">
            <div class="row">
                <div class="other_room">
                    <div role="tabpanel">
                        <!-- <div class="section_title content-center"> -->

                        <!-- Nav tabs -->
                        <div class="container">
                            <div class="section_title">
                                <ul class="nav nav-tabs margin-bottom-60" role="tablist">
                                    <li role="presentation"><a href="#deluxe_room" aria-controls="deluxe_room" role="tab" data-toggle="tab">deluxe room</a></li>
                                    <li role="presentation"><a href="#single_bedroom" aria-controls="single_bedroom" role="tab" data-toggle="tab">single bedroom</a></li>
                                    <li role="presentation"><a href="#double_bedroom" aria-controls="double_bedroom" role="tab" data-toggle="tab">double bedroom</a></li>
                                    <li role="presentation"><a href="#classic_room" aria-controls="classic_room" role="tab" data-toggle="tab">classic room</a></li>
                                    <li role="presentation"><a href="#exe_room" aria-controls="exe_room" role="tab" data-toggle="tab">exe room</a></li>
                                    <li role="presentation"><a href="#royal_room" aria-controls="royal_room" role="tab" data-toggle="tab">royal room</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="deluxe_room">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="col-lg-8 col-md-8 col-sm-12 margin-bottom-30">
                                                        <div class="clearfix demo">
                                                            <div class="slider">
                                                                <div id="deluxe_gallery" class="carousel slide" data-ride="carousel">

                                                                    <!-- Wrapper for slides -->
                                                                    <div class="carousel-inner" role="listbox">
                                                                        <div class="item active">
                                                                            <div class="single_item">
                                                                                <img src="<?= PUBLIC_URL . 'img/lightslider-img/cS-54.jpg' ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="item">
                                                                            <div class="single_item">
                                                                                <img src="<?= PUBLIC_URL . 'img/lightslider-img/cS-55.jpg' ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Controls -->
                                                                    <a class="slider_ctrl left" href="#deluxe_gallery" role="button" data-slide="prev">
                                                                        <i class="fa fa-angle-left"></i>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="slider_ctrl right" href="#deluxe_gallery" role="button" data-slide="next">
                                                                        <i class="fa fa-angle-right"></i>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 margin-bottom-30">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-6 margin-bottom-30">
                                                                <div class="single_room_wrapper clearfix">
                                                                    <div class="room_wrapper">
                                                                        <div class="dif_room_media">
                                                                            <a href="img/gallery-four.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/gallery-four.jpg' ?>">
                                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-6">
                                                                <div class="single_room_wrapper clearfix">
                                                                    <div class="room_wrapper">
                                                                        <div class="dif_room_media">
                                                                            <a href="img/gallery-four.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/gallery-five.jpg' ?>">
                                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-eight.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-eight.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-seventeen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-seventeen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-sixteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-sixteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fifteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fifteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fourteen.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fourteen.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-seven.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-seven.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-twelve.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-twelve.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-ten.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-ten.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="single_bedroom">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-eight.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-eight.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-nine.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-nine.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-ten.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-ten.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-eleven.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-eleven.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end single room details -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="double_bedroom">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-twelve.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-twelve.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-thirteen.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-thirteen.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fourteen.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fourteen.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fifteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fifteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end single room details -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="classic_room">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-sixteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-sixteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-seventeen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-seventeen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-eighteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-eighteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-nine.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-nine.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end single room details -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="exe_room">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-ten.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-ten.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-eleven.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-eleven.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-twelve.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-twelve.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-thirteen.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-thirteen.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end single room details -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="royal_room">
                                <!-- start single room details -->
                                <div class="accomodation_single_room">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fourteen.jpg" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fourteen.jpg' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-fifteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-fifteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-sixteen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-sixteen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix">
                                                    <div class="room_wrapper">
                                                        <div class="room_media">
                                                            <a href="img/room-image-seventeen.png" data-uk-lightbox="{group:'group1'}" title="Gallery">
                                                                <figure class="uk-overlay uk-overlay-hover">
                                                                    <img alt="img" src="<?= PUBLIC_URL . 'img/room-image-seventeen.png' ?>">
                                                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end single room details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end other detect room section -->

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->

</body>

</html>
