<?php
session_start();
define('TITLE', 'Web setting');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// lấy thông tin của người dùng ra ngoài thông id trên đường dẫn
$id = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra web_settings có tồn tại hay không
$getWebSettingsQuery = "select * from web_settings where id = $id";
$webSettings = queryExecute($getWebSettingsQuery, false);
if (!$webSettings) {
    header("location: " . ADMIN_URL . 'web_settings?msg=Cài đặt này không tồn tại');
    die;
}

// kiểm tra xem có quyền để thực hiện edit hay không
if ($_SESSION[AUTH]['role_id'] < 2) {
    header("location: " . ADMIN_URL . 'web_settings?msg=Bạn không có quyền sửa setting này');
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <script>
        function encodeImageFileAsURL1(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#logo').attr('src', "<?= BASE_URL . $webSettings['logo_url'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#logo').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }

        function encodeImageFileAsURL2(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#offer').attr('src', "<?= BASE_URL . $webSettings['offer_url'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#offer').attr('src', reader.result)
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
                            <h1 class="m-0 text-dark">Cập nhật thông tin web setting</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="edit-web-setting-form" action="<?= ADMIN_URL . 'web_settings/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $webSettings['id'] ?>">
                        <div class="row">
                            <!-- First column -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Tên web setting<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $webSettings['name'] ?>">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email web setting<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $webSettings['email'] ?>">
                                    <?php if (isset($_GET['emailerr'])) : ?>
                                        <label class="error"><?= $_GET['emailerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $webSettings['phone_number'] ?>">
                                    <?php if (isset($_GET['phone_numbererr'])) : ?>
                                        <label class="error"><?= $_GET['phone_numbererr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $webSettings['address'] ?>">
                                    <?php if (isset($_GET['addresserr'])) : ?>
                                        <label class="error"><?= $_GET['addresserr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Second column -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Địa chỉ bản đồ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="map_url" id="" value="<?= $webSettings['map_url'] ?>">
                                    <?php if (isset($_GET['map_urlerr'])) : ?>
                                        <label class="error"><?= $_GET['map_urlerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ Youtube<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="youtube_url" id="" value="<?= $webSettings['youtube_url'] ?>">
                                    <?php if (isset($_GET['youtube_urlerr'])) : ?>
                                        <label class="error"><?= $_GET['youtube_urlerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ Facebook<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="facebook_url" id="" value="<?= $webSettings['facebook_url'] ?>">
                                    <?php if (isset($_GET['facebook_urlerr'])) : ?>
                                        <label class="error"><?= $_GET['facebook_urlerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ instagram<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="instagram_url" id="" value="<?= $webSettings['instagram_url'] ?>">
                                    <?php if (isset($_GET['instagram_urlerr'])) : ?>
                                        <label class="error"><?= $_GET['instagram_urlerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ explore<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="explore_url" id="" value="<?= $webSettings['explore_url'] ?>">
                                    <?php if (isset($_GET['explore_urlerr'])) : ?>
                                        <label class="error"><?= $_GET['explore_urlerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Last column -->
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-6 form-group border-right">
                                        <label for="">Logo<span class="text-danger">*</span></label><br>
                                        <div class="d-flex justify-content-center">
                                            <img src="<?= BASE_URL . $webSettings['logo'] ?>" width="100" id="logo">
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="">Special offer<span class="text-danger">*</span></label><br>
                                        <div class="d-flex justify-content-center">
                                            <img src="<?= BASE_URL . $webSettings['offer'] ?>" width="100" id="offer">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="">Chọn logo<span class="text-danger">*</span></label>
                                        <input type="file" name="logo_url" id="logoInput" class="form-control-file" onchange="encodeImageFileAsURL1(this);">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="">Chọn offer<span class="text-danger">*</span></label>
                                        <input type="file" name="offer" id="" class="form-control-file" onchange="encodeImageFileAsURL2(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Introduce Welcome</label>
                                    <textarea name="introduce_welcome" id="" class="form-control" rows="6"><?= $webSettings['introduce_welcome'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'web_settings' ?>" class="btn btn-danger">Hủy</a>
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
            var statusSetting = document.getElementById('statusSetting');
            statusSetting.value = <?= $webSettings['status'] ?>;

            $('#edit-web-setting-form').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 191
                    },
                    status: {
                        required: true
                    },
                    email: {
                        required: true,
                        maxlength: 191,
                        email: true
                    },
                    phone_number: {
                        number: true,
                        maxlength: 10,
                        minlength: 10
                    },
                    address: {
                        required: true
                    },
                    map_url: {
                        required: true,
                        maxlength: 191
                    },
                    youtube_url: {
                        required: true,
                        maxlength: 191
                    },
                    facebook_url: {
                        required: true,
                        maxlength: 191
                    },
                    instagram_url: {
                        required: true,
                        maxlength: 191
                    },
                    explore_url: {
                        required: true,
                        maxlength: 191
                    },
                    logo: {
                        extension: "png|jpg|jpeg|gif"
                    },
                    offer: {
                        extension: "png|jpg|jpeg|gif"
                    },
                    introduce_welcome: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Nhập tên của web setting",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    status: {
                        required: "Chọn trạng thái"
                    },
                    email: {
                        required: "Nhập email hotel",
                        maxlength: "Độ dài tối đa là 191 ký tự",
                        email: "Nhập đúng định dạng email"
                    },
                    phone_number: {
                        number: "Nhập số điện thoại hotel",
                        maxlength: "Số điện thoại gồm 10 chữ số",
                        minlength: "Số điện thoại gồm 10 chữ số"
                    },
                    address: {
                        required: "Nhập địa chỉ hotel"
                    },
                    map_url: {
                        required: "Nhập đường dẫn bản đồ của hotel",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    youtube_url: {
                        required: "Nhập đường dẫn youtube",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    facebook_url: {
                        required: "Nhập đường dẫn facebook",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    instagram_url: {
                        required: "Nhập đường dẫn github",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    explore_url: {
                        required: "Nhập tên trang khám phá",
                        maxlength: "Độ dài tối đa là 191 ký tự"
                    },
                    introduce_welcome: {
                        required: "Nhập nội dung giới thiệu"
                    },
                    logo: {
                        extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                    },
                    offer: {
                        extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                    }
                }
            });
        })
    </script>
</body>

</html>
