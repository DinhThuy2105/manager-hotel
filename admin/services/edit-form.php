<?php
session_start();
define('TITLE', 'Services');
require_once '../../config/utils.php';
checkAdminLoggedIn();

// get id from url
$id = isset($_GET['id']) ? $_GET['id'] : -1;
// get services query
$getServicesQuery = "select * from services where id = '$id'";
$services = queryExecute($getServicesQuery, false);

// kiểm tra xem quyền để thực hiện edit
if ($_SESSION[AUTH]['role_id'] < 1) {
    header("location: " . ADMIN_URL . 'news?msg=Bạn không có quyền sửa thông tin bài viết này');
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <!-- Script single-use only -->
    <script src="https://cdn.tiny.cloud/1/09n2cu8687a01c6pb501sbldantk25a45y32kbe1uneb85j4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                            <h1 class="m-0 text-dark">Cập nhật thông tin dịch vụ</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="edit-service-form" action="<?= ADMIN_URL . 'services/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id" value="<?= $services['id'] ?>" hidden>
                                <div class="form-group">
                                    <label for="">Tên dịch vụ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nameService" name="name" value="<?= $services['name'] ?>">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Giới thiệu<span class="text-danger">*</span></label>
                                    <textarea name="introduce" class="form-control" id="" cols="30" rows="10"><?= $services['introduce'] ?></textarea>
                                    <?php if (isset($_GET['introduceerr'])) : ?>
                                        <label class=" error"><?= $_GET['introduceerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <img src="<?= BASE_URL . $services['feature_img'] ?>" id="preview-img" class="img-fluid" alt="Ảnh đại diện dịch vụ">
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <label for="">Ảnh đại diện<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="inputGroupFile01" name="feature_img" onchange="encodeImageFileAsURL(this)">
                                </div>
                                <div class="form-group">
                                    <label for="statusService">Trạng thái<span class="text-danger">*</span></label>
                                    <select id="statusService" class="form-control" name="status">
                                        <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                        <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                    </select>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'services' ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
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
        // Tinymce
        tinymce.init({
            selector: '#introduce',
            height: 350,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });

        var nameService = document.getElementById('nameService');
        var statusService = document.getElementById('statusService');
        var btnCancel = document.getElementById('btnCancel');

        nameService.onchange = () => {
            sessionStorage.setItem('nameService', nameService.value);
        };
        statusService.onchange = () => {
            sessionStorage.setItem('statusService', statusService.value);
        }
        btnCancel.onclick = () => {
            sessionStorage.clear();
        }

        if('nameService' in sessionStorage) {
            nameService.value = sessionStorage.getItem('nameService');
        }else {
            statusService.value = <?= $services['name']?>;
        }

        if ("statusService" in sessionStorage) {
            statusService.value = sessionStorage.getItem('statusService')
        } else {
            statusService.value = <?= $services['status']?>;
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

        $('#edit-service-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 191
                },
                introduce: {
                    require: true
                },
                status: {
                    required: true
                },
                feature_img: {
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
                introduce: {
                    require: "Hãy nhập lời giới thiệu"
                },
                status: {
                    required: "Chọn trạng thái"
                },
                feature_img: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>
