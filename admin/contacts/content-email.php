<?php
session_start();
define('TITLE', 'Customer Feedbacks');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// lấy thông tin của customer ra ngoài thông id trên đường dẫn
$id = isset($_GET['id']) ? $_GET['id'] : -1;
# get contacts table
$getContactsQuery = "select * from contacts where id = '$id'";
$contacts = queryExecute($getContactsQuery, true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <style>
        label.error {
            display: inline-block;
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
                            <h1 class="m-0 text-dark">Phản hồi khách hàng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="send-email-form" action="<?= ADMIN_URL . 'contacts/send-email.php' ?>" method="POST">
                        <div class="form-group" hidden>
                            <?php foreach ($contacts as $contact) : ?>
                                <input type="text" name="id" id="id" class="form-control" value="<?= $contact['id'] ?>">
                            <?php endforeach ?>
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" name="reply_by" class="form-control" value="<?= $_SESSION[AUTH]['id'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Trả lời cho khách hàng<span class="text-danger">*</span></label>
                                    <?php foreach ($contacts as $contact) : ?>
                                        <input type="text" name="recceiver" id="recceiver" class="form-control" value="<?= $contact['email'] ?>">
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" id="subject" class="form-control" name="subject">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung trả lời<span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'contacts' ?>" class="btn btn-danger">Hủy</a>
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
        $(document).ready(function() {
            $('#send-email-form').validate({
                rules: {
                    subject: {
                        required: true,
                        maxlength: 100
                    },
                    content: {
                        required: true
                    },
                },
                messages: {
                    subject: {
                        required: "Nhập chủ đề email phản hồi",
                        maxlength: "Số lượng ký tự tối đa bằng 100 ký tự"
                    },
                    content: {
                        required: "Nhập nội dung phản hồi khách hàng"
                    },
                }
            });
        });
    </script>
</body>

</html>
