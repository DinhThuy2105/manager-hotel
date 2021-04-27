<!-- start contact us area -->
<section class="contact_us_area content-left">
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
</section>
<!-- end contact us area -->

<!-- Start footer -->
<footer class="footer_area">
    <div class="container">
        <div class="footer">
            <div class="footer_top padding-top-80 clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#"><img src="<?=PUBLIC_URL?>img/footer-logo-one.png" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, conser adipiscing elit. In consectetur tincidunt dolor.</p>
                        <ul>
                            <li>
                                <P><i class="fa fa-map-marker"></i><?=$webSetting['address']?></P>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="row">
                        <div class="footer_widget clearfix">
                            <h5 class="padding-left-15">Quick Links</h5>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li><a href="#">Rooms</a></li>
                                    <li><a href="#">Food & Drinks</a></li>
                                    <li><a href="#">Beach Venues</a></li>
                                    <li><a href="#">Amenities</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 sol-sm-6">
                                <ul>
                                    <li><a href="#">Noordwijk</a></li>
                                    <li><a href="#">Wellness</a></li>
                                    <li><a href="#">Manifesto</a></li>
                                    <li><a href="#">Contact</a></li>
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
                        <p>© 2015 <a href="#">Hotelbooking</a>. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->
