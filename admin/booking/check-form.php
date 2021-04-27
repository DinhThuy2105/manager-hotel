<?php
session_start();
define('TITLE', 'Check Form');
require_once '../../config/utils.php';
checkAdminLoggedIn();

// get id from url
$id = isset($_GET['id']) ? $_GET['id'] : -1;
// get data from booking
$getBookingQuery = "select * from booking where id = '$id'";
$booking = queryExecute($getBookingQuery, false);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
    <style>
        .error {
            color: #ff0000;
            display: inline;
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
                            <h1 class="m-0 text-dark">Kiểm tra đơn đặt phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="check-booking" action="<?= ADMIN_URL . 'booking/save-check.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Trạng thái trả lời<span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="<?= ACTIVE ?>">Đã xác nhận</option>
                                        <option value="<?= INACTIVE ?>">Chưa xác nhận</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nhân viên trả lời<span class="text-danger">*</span></label>
                                    <input type="hidden" name="reply_by" value="<?= $_SESSION[AUTH]['id'] ?>">
                                    <input type="text" class="form-control" value="<?= $_SESSION[AUTH]['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Khách hàng đã tới chưa?<span class="text-danger">*</span></label>
                                    <select name="checked_in" id="checked_in" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="<?= ACTIVE ?>">Đã tới</option>
                                        <option value="<?= INACTIVE ?>">Chưa tới</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize font-weight-bold">Thời điểm tới thực tế<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="start_time" />
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lời nhắn của khách hàng<span class="text-danger">*</span></label>
                                    <textarea name="messages" rows="3" class="form-control"><?=$booking['messages']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Trả lời khách hàng<span class="text-danger">*</span></label>
                                    <textarea name="reply_messages" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                <a href="<?= ADMIN_URL . 'users' ?>" id="btnRemove" class="btn btn-danger">Hủy</a>
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
            var status = document.getElementById('status');
            status.value = <?= $booking['status'] ?>;
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
