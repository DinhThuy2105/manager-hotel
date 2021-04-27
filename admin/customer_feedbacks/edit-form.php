<?php
session_start();
define('TITLE', 'Customer Feedbacks');
require_once '../../config/utils.php';
checkAdminLoggedIn();

// get id from url
$id = isset($_GET['id']) ? $_GET['id'] : -1;
/// get customer feedbacks query
$getFeedbacksQuery = "select * from customer_feedbacks where id = '$id'";
$feedback = queryExecute($getFeedbacksQuery, false);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <style>
        label.error {
            display: inline;
            color: #ff0000;
        }
    </style>
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
                            <h1 class="m-0 text-dark">Cập nhật phản hồi của khách hàng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-feedbacks-form" action="<?= ADMIN_URL . 'customer_feedbacks/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
                                <div class="form-group">
                                    <label for="">Tên người dùng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?= $feedback['name'] ?>">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" value="<?= $feedback['address'] ?>">
                                    <?php if (isset($_GET['addresserr'])) : ?>
                                        <label class="error"><?= $_GET['addresserr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung<span class="text-danger">*</span></label>
                                    <textarea name="content" class="form-control" rows="5" id="content-feedback"><?= $feedback['content'] ?></textarea>
                                    <?php if (isset($_GET['contenterr'])) : ?>
                                        <label class="error"><?= $_GET['contenterr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <img src="<?= BASE_URL . $feedback['avatar'] ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <div class="form-group">
                                        <label for="">Ảnh đại diện<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file" name="avatar" onchange="encodeImageFileAsURL(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mySelect1">Trạng thái<span class="text-danger">*</span></label>
                                    <select id="mySelect1" class="form-control" name="status">
                                        <?php
                                        if ($feedback['status'] == 1) { ?>
                                            <option value="<?= ACTIVE?>" selected>Họat động</option>
                                            <option value="<?= INACTIVE?>">Ngừng hoạt động</option>
                                        <?php    } else if ($feedback['status'] == 0) { ?>
                                            <option value="<?= ACTIVE?>">Họat động</option>
                                            <option value="<?= INACTIVE?>" selected>Ngừng hoạt động</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'customer_feedbacks' ?>" class="btn btn-danger">Hủy</a>
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
        $('#add-feedbacks-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 191
                },
                address: {
                    required: true
                },
                content: {
                    required: true,
                    minlength: 2
                },
                avatar: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                },
                status: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên người dùng",
                    minlength: "Số lượng ký tự tối thiểu bằng 2",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                address: {
                    required: "Hãy nhập địa chỉ người dùng"
                },
                content: {
                    required: "Hãy nhập nội dùng phản hồi",
                    minlength: "Không thể nhập nội dung dưới 2 ký tự"
                },
                avatar: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                },
                status: {
                    required: "Chọn trạng thái hoạt động"
                }
            }
        });
    </script>
</body>

</html>
