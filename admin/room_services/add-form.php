<?php
session_start();
define('TITLE', 'Room Services');
require_once '../../config/utils.php';
checkAdminLoggedIn();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
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
                            <h1 class="m-0 text-dark">Thêm dịch vụ phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-room-service-form" action="<?= ADMIN_URL . 'room_services/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên dịch vụ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="nameRoomService">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="statusRoomService">Trạng thái<span class="text-danger">*</span></label>
                                    <select id="statusRoomService" class="form-control" name="status">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                        <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 offset-md-3">
                                        <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <label for="">Icon<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="inputGroupFile01" name="icon" onchange="encodeImageFileAsURL(this)">
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'room_services' ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
                                </div>
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
        var nameRoomService = document.getElementById('nameRoomService');
        var statusRoomService = document.getElementById('statusRoomService');
        var btnCancel = document.getElementById('btnCancel');

        nameRoomService.onchange = () => {
            sessionStorage.setItem('nameRoomService', nameRoomService.value);
        };
        statusRoomService.onchange = () => {
            sessionStorage.setItem('statusRoomService', statusRoomService.value);
        }
        btnCancel.onclick = () => {
            sessionStorage.clear();
        }

        nameRoomService.value = sessionStorage.getItem('nameRoomService');
        if ("statusRoomService" in sessionStorage) {
            statusRoomService.value = sessionStorage.getItem('statusRoomService')
        } else {
            statusRoomService.value = ""
        }

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

        $('#add-room-service-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 191
                },
                status: {
                    required: true
                },
                icon: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
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
                icon: {
                    required: "Hãy nhập icon dịch vụ phòng",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>
