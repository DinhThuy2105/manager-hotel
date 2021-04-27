<?php
session_start();
define('TITLE', 'Booking');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

// get data from room detail
$room = trim($_POST['room']);
$bed = trim($_POST['bed']);

if(isset($_SESSION[BOOK])) {
    $_SESSION[BOOK]['room'] = $room;
    $_SESSION[BOOK]['bed'] = $bed;

    $roomId = isset($_SESSION[BOOK]['id']) ? $_SESSION[BOOK]['id'] : "";
    $adult = isset($_SESSION[BOOK]['adult']) ? $_SESSION[BOOK]['adult'] : "";
    $children = isset($_SESSION[BOOK]['children']) ? $_SESSION[BOOK]['children'] : "";
    $arrival = isset($_SESSION[BOOK]['arrival']) ? $_SESSION[BOOK]['arrival'] : "";
    $departure = isset($_SESSION[BOOK]['departure']) ? $_SESSION[BOOK]['departure'] : "";
}else {
    header("Location: " . BASE_URL) . "?msg=Chọn phòng loại phòng trước khi thanh toán";
    die;
}

// get data from room types
$getRoomTypesQuery = "select *from room_types where id ='$roomId' and status = 1";
$roomTypes = queryExecute($getRoomTypesQuery, false);

if ($roomTypes == "") {
    header('location: ' . BASE_URL . 'rooms.php?msg=Bạn cần chọn phòng trước khi đặt, HÃY CHỌN PHÒNG!');
    die;
}

$getServiceQuery = "select s.id, s.name, s.icon
                        from room_service_xref sxr
                        join room_services s
                        on sxr.services_id = s.id
                    where sxr.room_id = " . $roomTypes['id'];
$services = queryExecute($getServiceQuery, true);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="booking_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Đặt phòng</h2>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <div class="container">
                            <div class="special_offer_sub">
                                <img src="<?= $webSetting['offer'] ?>" alt="imf">
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
    <section class="booking_area">
        <div class="container">
            <div class="booking">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="booking_info" class="active">
                            <a href="#booking_info" aria-controls="booking_info" role="tab" data-toggle="tab"><i>1</i><span>booking info</span></a>
                        </li>
                        <li role="personal_info">
                            <a href="#personal_info" aria-controls="personal_info" role="tab" data-toggle="tab"><i>2</i><span>personal info</span></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="booking_info">
                            <div class="booking_info_area">
                                <div class="facilities_name clearfix margin-bottom-150 margin-top-70">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-5">
                                            <img src="<?= PUBLIC_URL ?>img/booking-step-one.jpg" alt="">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-7">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="section_title clearfix margin-bottom-5">
                                                        <h5 class="floatleft"><?= $roomTypes['name'] ?><span class="price floatright margin-left-15">($180 <sup class="day">/night</sup>)</span></h5>
                                                    </div>
                                                </div>
                                                <div class="list-services col-lg-12 col-md-12">
                                                    <?php foreach ($services as $rSer) : ?>
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
                                        <div class="about_booking_room clearfix margin-top-30">
                                            <div class="col-lg-7 col-md-7 col-sm-6">
                                                <div class="booking_room_details">
                                                    <h5>Booking room detail</h5>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil atque modi velit molestiae, repellendus iure sint possimus cumque, provident, dolorum unde laboriosam ut eius ex maiores quod repudiandae aut asperiores?
                                                    </p>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil atque modi velit molestiae, repellendus iure sint possimus cumque, provident, dolorum unde laboriosam ut eius ex maiores quod repudiandae aut asperiores?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-6">
                                                <div class="room_cost">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <tr class="room_table">
                                                                        <td class=""><span class="imp_table_text"><?=$room?> phòng</span> <br><?=$adult?> người lớn & <?=$children?> trẻ em</td>
                                                                        <td class=""><span class="imp_table_text"><?=$roomTypes['price']?>$</span> <br> rate</td>
                                                                        <td class=""><?php echo $night = (strtotime($departure) - strtotime($arrival)) / 86400;?><br>night</td>
                                                                        <td class=""><span class="imp_table_text"><?php echo $firstBill = $night * $roomTypes['price'] ?>$</span></td>
                                                                    </tr>
                                                                    <tr class="tax_table">
                                                                        <td class=""><span class="imp_table_text">Thuế</span> <br> 10% trên giá trị hóa đơn</td>
                                                                        <!-- <td class=""></td>
                                                                        <td class=""></td> -->
                                                                        <td class="" colspan="3"><span class="imp_table_text"><?php echo $tax = $firstBill * 10 / 100?>$</span></td>
                                                                    </tr>
                                                                    <tr class="total_table">
                                                                        <td class=""><span class="imp_table_text">Tổng giá trị</span></td>
                                                                        <!-- <td class=""></td>
                                                                        <td class=""></td> -->
                                                                        <td class="" colspan="3"><span class="imp_table_text"><?php echo $totalBill = $firstBill + $tax?>$</span></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="booking_next_btn padding-top-30 margin-top-20 clearfix border-top-whitesmoke">
                                                <a href="#personal_info" aria-controls="personal_info" role="tab" data-toggle="tab" id="next-tab" class="next-tab btn btn-warning btn-sm floatright">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="personal_info">
                            <div class="personal_info_area">
                                <div class="hotel_booking_area">
                                    <div class="hotel_booking margin-top-70 margin-bottom-125">
                                        <form role="form" action="<?=BASE_URL . 'save-booking.php'?>" method="POST">
                                            <div class="row">
                                                <input type="hidden" name="arrival" value="<?=$arrival?>">
                                                <input type="hidden" name="departure" value="<?=$departure?>">
                                                <input type="hidden" name="children" value="<?=$children?>">
                                                <input type="hidden" name="adult" value="<?=$adult?>">
                                                <input type="hidden" name="beds" value="<?=$bed?>">
                                                <input type="hidden" name="rooms" value="<?=$room?>">
                                                <input type="hidden" name="room_types" value="<?=$roomTypes['id']?>">
                                                <input type="hidden" name="price" value="<?=$totalBill?>">
                                                <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="customer_name" placeholder="Họ và tên">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="phone_number" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" name="messages" id="comment" placeholder="Lời nhắn"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="booking_next_btn padding-top-30 margin-top-50 clearfix border-top-whitesmoke">
                                                        <a href="#" class="btn btn-warning btn-sm btn-info">back</a>
                                                        <button type="submit" class="btn btn-warning floatright">Xác Nhận Đặt Phòng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script>
        var adult = document.getElementById('adult');
        var test = '';
        if(test !== '<?= $adult ?>') {
            adult.value = '<?= $adult ?>';
        }
        var children = document.getElementById('children');
        if(test !== '<?= $children ?>') {
            children.value = '<?= $children ?>';
        }
        var bed = document.getElementById('bed');
        if(test !== '<?= $bed ?>' && bed) {
            bed.value = <?=$bed?>;
        }
        var room = document.getElementById('room');
        if(test !== '<?= $room ?>' && room) {
            room.value = '<?=$room?>';
        }

        setTimeout(() => {
            sessionStorage.clear();
        }, 2500);

        console.log('aaaaaaaaaaaaa')
        $(document).ready(function(){
            $('#next-tab').click(function(e){
                if($('.nav-tabs > .active').next('li').hasClass('next-tab')){
                    $('.nav-tabs > li').first('li').find('a').trigger('click');
                }else{
                    $('.nav-tabs > .active').next('li').find('a').trigger('click');
                }
                e.preventDefault();
            });
        });
    </script>
</body>

<!-- Mirrored from premiumlayers.net/demo/html/hotelbooking/booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 11:52:09 GMT -->

</html>
