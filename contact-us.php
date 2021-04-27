<?php
session_start();
define('TITLE', 'Contact us');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
checkAdminLoggedIn();
$getRoleQuery = "select * from roles where status = 1";
$roles = queryExecute($getRoleQuery, true);

# get contacts table
$getContactsQuery = "select * from contacts";
$contacts = queryExecute($getContactsQuery, true);
// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="contact_us_page">

    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Contact Us</h2>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <div class="container">
                            <div class="special_offer_sub">
                                <img src="img/special-offer-yellow-main.png" alt="imf">
                            </div>
                        </div>
                    </div>
                    <!-- end offer start -->
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrunb -->

    <!-- start contact mail area -->
    <section class="contact_mail_area margin-bottom-90">
        <div class="container">
            <div class="row">
                <div class="contact_mail">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="send_mail">
                            <div class="section_title margin-bottom-40">
                                <h4>Gửi email phản hồi đến chúng tôi</h4>
                            </div>
                            <form action="<?= ADMIN_URL . 'contacts/save-add.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Người phản hồi *" name="name" required>
                                        <?php if (isset($_GET['nameerr'])) : ?>
                                            <label class="error"><?= $_GET['nameerr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Email *" required name="email">
                                        <?php if (isset($_GET['emailerr'])) : ?>
                                            <label class="error"><?= $_GET['emailerr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Chủ đề phản hồi *" required name="subject" />
                                        <?php if (isset($_GET['subjecterr'])) : ?>
                                            <label class="error"><?= $_GET['subjecterr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Số điện thoại *" required name="phone_number" />
                                        <?php if (isset($_GET['phone_numbererr'])) : ?>
                                            <label class="error"><?= $_GET['phone_numbererr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <textarea name="message" placeholder="Nội dung phản hồi" required></textarea>
                                        <?php if (isset($_GET['messageerr'])) : ?>
                                            <label class="error"><?= $_GET['messageerr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <!-- <a href="#" class="btn btn-warning btn-md"></a> -->
                                        <input class="btn btn-warning" type="submit" name="submit" value="Gửi đến chúng tôi" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="contact_info margin-top-65">
                            <div class="section_title margin-bottom-45">
                                <h4>Liên hệ trực tiếp</h4>
                            </div>
                            <ul class="clearul">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    Hải Phong, Hải Hậu, Nam Định
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    0914946200
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    contact@hotelbooking.com
                                </li>
                            </ul>
                            <div class="social_icons clearfix">
                                <ul class="clearul">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact mail area -->

    <!-- start other detect room section -->
    <div class="contact_google_map_area margin-bottom-75">
        <div class="container">
            <div class="contact_google_map">
                <div id="contactgoogleMap" style="width:100%;height:374px;"></div>
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

    <!-- Google maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAsZMj7uhrnSVWojcYHapHV9c05Bdb5dE"></script>
    <script>
        var myCenter = new google.maps.LatLng(20.147269, 106.222167);

        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 15,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("contactgoogleMap"), mapProp);

            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/google-pin-one.png'
            });

            var infowindow = new google.maps.InfoWindow({
                content: "united-states"
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        <?php if (isset($_GET['msg'])) : ?>
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: "<?= $_GET['msg']; ?>",
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>
    </script>

</body>

</html>
