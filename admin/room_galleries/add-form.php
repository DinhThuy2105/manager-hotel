<?php
session_start();
define('TITLE', 'Room Galleries');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get data from room types
$getRoomTypesQuery = "select * from room_types";
$roomTypes = queryExecute($getRoomTypesQuery, true);
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
                            <h1 class="m-0 text-dark">Thêm ảnh phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-room-galleries-form" action="<?= ADMIN_URL . 'room_galleries/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="statusRG">Loại phòng<span class="text-danger">*</span></label>
                                    <select id="statusRG" class="form-control" name="room_id">
                                        <option value="">Chọn loại phòng</option>
                                        <?php foreach($roomTypes as $roomType) :?>
                                            <option value="<?=$roomType['id']?>"><?=$roomType['name']?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-5 offset-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <label for="">Ảnh loại phòng<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="inputGroupFile01" name="img_url" onchange="encodeImageFileAsURL(this)">
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                <a href="<?= ADMIN_URL . 'room_galleries' ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
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
        var statusRG = document.getElementById('statusRG');
        var btnCancel = document.getElementById('btnCancel');

        statusRG.onchange = () => {
            sessionStorage.setItem('statusRG', statusRG.value);
        };
        btnCancel.onclick = () => {
            sessionStorage.clear();
        };

        statusRG.value = ("statusRG" in sessionStorage) ? sessionStorage.getItem('statusRG') : "";

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

        $('#add-room-galleries-form').validate({
            rules: {
                status: {
                    required: true
                },
                img_url: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                status: {
                    required: "Chọn trạng thái"
                },
                img_url: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>
