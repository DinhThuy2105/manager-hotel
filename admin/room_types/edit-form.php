<?php
session_start();
define('TITLE', 'Room Types');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get id from url
$id = isset($_GET['id']) ? $_GET['id'] : -1;
// get data from roomTypes
$getRoomTypesQuery = "select * from room_types where id = '$id'";
$roomTypes = queryExecute($getRoomTypesQuery, false);
// get data from room_services and room_service_xref
$getServiceQuery = "select s.id, s.name
                        from room_service_xref sxr join room_services s
                        on sxr.services_id = s.id
                    where sxr.room_id = " . $roomTypes['id'];
$services = queryExecute($getServiceQuery, true);
$roomTypes['room_sv'] = $services;

$getServices = "select * from room_services where status = 1";
$allServices = queryExecute($getServices, true);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../_share/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../_share/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Cập nhật thông tin loại phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="edit-room-types-form" action="<?= ADMIN_URL . 'room_types/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $roomTypes['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên loại phòng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="nameRTypes" value="<?= $roomTypes['name'] ?>">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="statusRTypes">Trạng thái<span class="text-danger">*</span></label>
                                    <select id="statusRTypes" class="form-control" name="status">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                        <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Giá loại phòng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" id="priceRTypes" value="<?= $roomTypes['price'] ?>">
                                    <?php if (isset($_GET['priceerr'])) : ?>
                                        <label class="error"><?= $_GET['priceerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Số lượng phòng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="quantity" id="quantityRTypes" value="<?= $roomTypes['quantity'] ?>">
                                    <?php if (isset($_GET['quantityerr'])) : ?>
                                        <label class="error"><?= $_GET['quantityerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="">Số người lớn<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="adult" id="adult" value="<?=$roomTypes['adult']?>">
                                        <?php if (isset($_GET['adulterr'])) : ?>
                                            <label class="error"><?= $_GET['adulterr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="">Số trẻ nhỏ<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="children" id="children" value="<?=$roomTypes['children']?>">
                                        <?php if (isset($_GET['childrenerr'])) : ?>
                                            <label class="error"><?= $_GET['childrenerr'] ?></label>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Dịch vụ phòng</label>
                                    <select name="service[]" class="form-control select2" multiple="multiple" data-placeholder="Chọn dịch vụ phòng">
                                        <?php foreach ($room['room_sv'] as $ser) : ?>
                                            <option value="<?= $ser['id'] ?>" selected><?= $ser['name'] ?></option>
                                        <?php endforeach ?>
                                        <?php foreach ($allServices as $sers) : ?>
                                            <option value="<?= $sers['id'] ?>"><?= $sers['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row m-2">
                                    <div class="col-6 col-md-5">
                                        <img src="<?= BASE_URL .  $roomTypes['feature_image'] ?>" id="preview-img" class="img-fluid">
                                    </div>
                                    <div class="col-6 form-group mt-3 mb-4">
                                        <label for="">Ảnh loại phòng<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file" id="inputGroupFile01" name="feature_image" onchange="encodeImageFileAsURL(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả ngắn<span class="text-danger">*</span></label>
                                    <textarea name="short_descript" id="short_descript" class="form-control" rows="5"><?= $roomTypes['short_descript'] ?></textarea>
                                    <?php if (isset($_GET['short_descripterr'])) : ?>
                                        <label class="error"><?= $_GET['short_descripterr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                <a href="<?= ADMIN_URL . 'services' ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
                            </div>
                        </div>
                    </form>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php'; ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php'; ?>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        statusRTypes.value = <?= $roomTypes['status'] ?>;

        $('#edit-room-types-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 191
                },
                status: {
                    required: true
                },
                quantity: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 50
                },
                price: {
                    required: true,
                    number: true,
                    min: 0,
                },
                feature_image: {
                    extension: "png|jpg|jpeg|gif"
                },
                short_descript: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên dịch vụ",
                    minlength: "Số lượng ký tự tối thiểu bằng 2 ký tự",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                status: {
                    required: "Chọn trạng thái"
                },
                feature_image: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                },
                quantity: {
                    required: "Nhập số lượng phòng",
                    number: "Số lượng phòng phải nhập bằng số",
                    min: "Không thể nhập số phòng nhỏ hơn 1",
                    max: "Không thể nhập số phòng lớn hơn 50"
                },
                price: {
                    required: "Nhập vào giá phòng",
                    number: "Giá phòng phải nhập bằng số",
                    min: "Không thể nhập giá phòng nhỏ hơn 0",
                },
                short_descript: {
                    required: "Nhập mô tả loại phòng"
                }
            }
        });
    </script>
</body>

</html>
