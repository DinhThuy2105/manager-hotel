<?php
session_start();
define('TITLE', 'News');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get news
$getNewsQuery = "select * from news";
$news = queryExecute($getNewsQuery, true);

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
                            <h1 class="m-0 text-dark">Thêm tin tức</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-user-form" action="<?= ADMIN_URL . 'news/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="author_id" value="<?= $_SESSION[AUTH]['id'] ?>">
                        <div class="row p-4">
                            <div class="form-group col-md-6 col-12">
                                <div class="col-md-6 offset-md-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ảnh bài viết<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="inputGroupFile01" name="feature_image" onchange="encodeImageFileAsURL(this)">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu đề bài viết<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title">
                                    <?php if (isset($_GET['titleerr'])) : ?>
                                        <label class="error"><?= $_GET['titleerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <textarea class="news_content" id="" cols="30" rows="10" name="news_content"></textarea>
                        <div class="col d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'news' ?>" class="btn btn-danger">Hủy</a>
                        </div>
                    </form>
                </div>
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
            selector: '.news_content',
            height: 400,
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
        $('#add-user-form').validate({
            rules: {
                news_content: {
                    required: true
                },
                feature_image: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                news_content: {
                    required: "Hãy nhập nội dung bài viết"
                },
                feature_image: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>
