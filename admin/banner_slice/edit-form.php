<?php
session_start();
define('TITLE', 'Galleries');
require_once '../../config/utils.php';
// get id from url
$id = isset($_GET['id']) ? $_GET['id'] : -1;
checkAdminLoggedIn();
// get banner_slice data
$getBannerQuery = "select * from banner_slice where id = $id";
$banner = queryExecute($getBannerQuery, false);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#preview-img').attr('src', "<?= BASE_URL . $banner['img_path'] ?>");
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
                            <h1 class="m-0 text-dark">Tạo ảnh banner</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="edit-banner-form" action="<?= ADMIN_URL . 'banner_slice/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="<?= $banner['id'] ?>" />
                                <div class="form-group">
                                    <label for="">Mô tả thứ nhất<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstContent" value="<?= $banner['firstContent'] ?>">
                                    <?php if (isset($_GET['firstContenterr'])) : ?>
                                        <label class="error"><?= $_GET['firstContenterr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả thứ hai<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="secondContent" value="<?= $banner['secondContent'] ?>">
                                    <?php if (isset($_GET['secondContenterr'])) : ?>
                                        <label class="error"><?= $_GET['secondContenterr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="statusBanner">Trạng thái<span class="text-danger">*</span></label>
                                    <select id="statusBanner" class="form-control" name="status">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                        <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5 offset-md-3">
                                        <img src="<?= BASE_URL . $banner['img_path'] ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh đại diện<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" name="img_path" onchange="encodeImageFileAsURL(this)">
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'banner_slice' ?>" class="btn btn-danger">Hủy</a>
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
        $(document).ready(() => {
            var status = document.getElementById('statusBanner');
            status.value = <?= $banner['status'] ?>;

            $('#add-user-form').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 191
                    },
                    email: {
                        required: true,
                        maxlength: 191,
                        email: true,
                        remote: {
                            url: "<?= ADMIN_URL . 'users/verify-email-existed.php' ?>",
                            type: "post",
                            data: {
                                email: function() {
                                    return $("input[name='email']").val();
                                }
                            }
                        }
                    },
                    password: {
                        required: true,
                        maxlength: 191
                    },
                    cfpassword: {
                        required: true,
                        equalTo: "#main-password"
                    },
                    phone_number: {
                        number: true
                    },
                    house_no: {
                        maxlength: 191
                    },
                    avatar: {
                        required: true,
                        extension: "png|jpg|jpeg|gif"
                    }
                },
                messages: {
                    name: {
                        required: "Hãy nhập tên người dùng",
                        maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                    },
                    email: {
                        required: "Hãy nhập email",
                        maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                        email: "Không đúng định dạng email",
                        remote: "Email đã tồn tại, vui lòng sử dụng email khác"
                    },
                    password: {
                        required: "Hãy nhập mật khẩu",
                        maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                    },
                    cfpassword: {
                        required: "Nhập lại mật khẩu",
                        equalTo: "Cần khớp với mật khẩu"
                    },
                    phone_number: {
                        min: "Bắt buộc là số có 10 chữ số",
                        max: "Bắt buộc là số có 10 chữ số",
                        number: "Nhập định dạng số"
                    },
                    house_no: {
                        maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                    },
                    avatar: {
                        required: "Hãy nhập ảnh đại diện",
                        extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                    }
                }
            });
        })
    </script>
</body>

</html>
