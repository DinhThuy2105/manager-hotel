<!-- start contact us area -->
<!-- <section class="contact_us_area content-left">
    <div class="container">
        <div class="contact_us clearfix">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="call clearfix">
                    <h6>Gọi Cho Chúng Tôi</h6>
                    <p><?= $webSetting['phone_number'] ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="email_us clearfix">
                    <h6>Email khách sạn</h6>
                    <p><?= $webSetting['email'] ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="news_letter clearfix">
                    <input type="text" placeholder="Nhập email nhận thêm thông tin">
                    <a href="#" class="btn btn-blue">Go</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="social_icons clearfix">
                    <ul>
                        <li><a href="<?= $webSetting['facebook_url'] ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="<?= $webSetting['instagram_url'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="<?= $webSetting['youtube_url'] ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- end contact us area -->

<!-- Start footer -->
<footer class="footer_area">
    <div class="container">
        <div class="footer">
            <div class="footer_top padding-top-80 clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget">
                        <div class="footer_logo text-center">
                            <a href="#"><img src="<?=PUBLIC_URL?>img/footer-logo-one.png" style="width: 150px" alt=""></a>
                        </div>
                        <p>Khách sạn Locania không chỉ đáp ứng hoàn hảo nhu cầu nghỉ ngơi của Quý khách mà còn mang đến những giây phút thư giãn giải trí tuyệt vời</p>
                        <div >
                            <div class="row" style="    color: #d5d2c5;">
                                <div class="footer_widget clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul>
                                            <li><i class="fa fa-map-marker mr-2" style="padding-right: 5px"></i><?=$webSetting['address']?></li>
                                            <li><i class="fa fa-envelope mr-2" style="padding-right: 5px"></i><?=$webSetting['email']?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 sol-sm-6">
                                        <ul>
                                            <li><i class="fa fa-phone mr-2" style="padding-right: 5px"></i><?= $webSetting['phone_number'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="row">
                        <div class="footer_widget clearfix">
                            <h5 class="padding-left-15">Quan tâm</h5>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li><a href="#">Đặt phòng</a></li>
                                    <li><a href="#">Không gian</a></li>
                                    <li><a href="#">Vị trí</a></li>
                                    <li><a href="#">Đồ ăn</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 sol-sm-6">
                                <ul>
                                    <li><a href="#">Hình ảnh</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget">
                        <h5>We Are Global</h5>
                        <div class="footer_map">
                            <a href="#"><img src="./public/img/footer-map-two.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="footer_copyright margin-tb-50 content-center">
                        <p>© 2021 <a href="#">Hotelbooking</a>. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->
