<?php
session_start();
define('TITLE', 'Accomadation');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
// get data from room_types special rooms
$getSpecialRooms = "select * from room_types order by price DESC";
$specialRooms = queryExecute($getSpecialRooms, false);

// get data from room_types other rooms
$getOtherRooms = "select * from room_types";
$total_records = count(queryExecute($getOtherRooms, true));

$limit = 6;
// tổng số trang
$total_page = ceil($total_records / $limit);

// Tìm Start
$start = 1 + ($current_page - 1) * $limit;

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// get data from room_types other rooms
$getOtherRooms .= " order by price DESC LIMIT $start, $limit";
$otherRooms = queryExecute($getOtherRooms, true);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="accomodation_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Accomodation</h2>
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


    <!-- start Hotel Facilities section -->
    <section class="select_room_area padding-top-5 margin-bottom-90">
        <div class="container">
            <div class="row">
                <div class="select_room clearfix">
                    <div class="section_title nice_title text-center">
                        <h3>Special Rooms</h3>
                    </div>
                    <div class="select_room_content special-room">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="room_thumb">
                                <a href="<?= BASE_URL . 'room-details.php?id=' . $specialRooms['id'] ?>"><img src="<?= BASE_URL . $specialRooms['feature_image'] ?>" alt=""></a>
                                <div class="room_details">
                                    <div class="about_room floatleft">
                                        <div class="room_quality floatleft">
                                            <h5><?= $specialRooms['name'] ?></h5>
                                        </div>
                                        <div class="room_rent floatleft">
                                            <p>$<?= $specialRooms['price'] ?><span> / night</span></p>
                                        </div>
                                    </div>
                                    <div class="room_block floatright">
                                        <a href="<?= BASE_URL . 'room-details.php?id=' . $specialRooms['id'] ?>" class="btn btn-black">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12">
                            <div class="room_thumb small_room_thumb margin-bottom-35">
                                <a href="#"><img src="<?php echo PUBLIC_URL . 'img/room-thumb-two.jpg' ?>" alt=""></a>
                                <div class="room_details">
                                    <div class="about_room floatleft">
                                        <div class="room_quality floatleft">
                                            <h5>Deluxe Room</h5>
                                        </div>
                                        <div class="room_rent floatleft">
                                            <p>$180<span> / night</span></p>
                                        </div>
                                    </div>
                                    <div class="room_block floatright">
                                        <a href="#" class="btn btn-black">Book</a>
                                    </div>
                                </div>
                            </div>
                            <div class="room_thumb small_room_thumb">
                                <a href="#"><img src="<?php echo PUBLIC_URL . 'img/room-thumb-three.jpg' ?>" alt=""></a>
                                <div class="room_details">
                                    <div class="about_room floatleft">
                                        <div class="room_quality floatleft">
                                            <h5>Deluxe Room</h5>
                                        </div>
                                        <div class="room_rent floatleft">
                                            <p>$180<span> / night</span></p>
                                        </div>
                                    </div>
                                    <div class="room_block floatright">
                                        <a href="#" class="btn btn-black">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Hotel Facilities section -->


    <!-- start other detect room section -->
    <section class="other_room_area">
        <div class="container">
            <div class="row">
                <div class="other_room">
                    <div class="section_title nice_title content-center">
                        <h3>Other Decent room</h3>
                    </div>
                    <div class="section_content">
                        <!-- start single room details -->
                        <div class="accomodation_single_room">
                            <div class="container">
                                <div class="row">
                                    <?php foreach ($otherRooms as $room) : ?>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="single_room_wrapper clearfix padding-bottom-30 padding-left-50">
                                                <figure class="uk-overlay uk-overlay-hover">
                                                    <div class="room_media">
                                                        <a href="<?= BASE_URL . 'room-details.php?id=' . $room['id'] ?>"><img src="<?= BASE_URL . $room['feature_image'] ?>" alt=""></a>
                                                    </div>
                                                    <div class="room_title border-bottom-whitesmoke clearfix">
                                                        <div class="left_room_title floatleft">
                                                            <h6><?= $room['name'] ?></h6>
                                                            <p>$<?= $room['price'] ?>/ <span>night</span></p>
                                                        </div>
                                                        <div class="left_room_title floatright">
                                                            <a href="<?= BASE_URL . 'room-details.php?id=' . $room['id'] ?>" class="btn">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="uk-overlay-panel uk-overlay-background single_wrapper_details clearfix animated bounceInDown">
                                                        <div class="border-dark-1 padding-22 clearfix single_wrapper_details_pad">
                                                            <h5><?= $room['name'] ?></h5>
                                                            <?= $room['short_descript'] ?>
                                                            <div class="single_room_cost clearfix">
                                                                <div class="floatleft">
                                                                    <p>$<?= $room['price'] ?>/ <span>night</span></p>
                                                                </div>
                                                                <div class="floatright">
                                                                    <a href="<?= BASE_URL . 'room-details.php?id=' . $room['id'] ?>" class="btn">Book</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-center">
                                    <ul class="pagination">
                                        <?php
                                        // PHẦN HIỂN THỊ PHÂN TRANG
                                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if ($current_page > 1 && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="./accomodation.php?page=' . ($current_page - 1) . '">Previous</a></li>';
                                        }

                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++) {
                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                            // ngược lại hiển thị thẻ a
                                            if ($i == $current_page) {
                                                echo '<li class="page-item active"><a class="page-link" href="./accomodation.php?page=' . $i . '">' . $i . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="./accomodation.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }

                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="./accomodation.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end single room details -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end other detect room section -->

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->
    <!-- my js -->
    <script src="js/main.js"></script>

</body>

</html>
