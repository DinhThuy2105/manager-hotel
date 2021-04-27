<?php
session_start();
define('TITLE', 'Users');
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getRoleQuery = "select * from roles where status = 1";
$roles = queryExecute($getRoleQuery, true);

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
                            <h1 class="m-0 text-dark">Tạo tài khoản</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-user-form" action="<?= ADMIN_URL . 'users/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên người dùng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email">
                                    <?php if (isset($_GET['emailerr'])) : ?>
                                        <label class="error"><?= $_GET['emailerr'] ?></label>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Mật khẩu<span class="text-danger">*</span></label>
                                    <input type="password" id="main-password" class="form-control" name="password">
                                    <?php if (isset($_GET['passworderr'])) : ?>
                                        <label class="error"><?= $_GET['passworderr'] ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="cfpassword">
                                </div>

                                <div class="form-group">
                                    <label for="">Quyền</label>
                                    <select name="role_id" class="form-control">
                                        <?php foreach ($roles as $ro) : ?>
                                            <option value="<?= $ro['id'] ?>"><?= $ro['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Ảnh đại diện<span class="text-danger">*</span></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="avatar" onchange="encodeImageFileAsURL(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number">
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'users' ?>" id="btnRemove" class="btn btn-danger">Hủy</a>
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
        $().ready(() => {
            var name = document.getElementById('name');
            name.value = sessionStorage.getItem('name');

            var email = document.getElementById('email');
            email.value = sessionStorage.getItem('email');

            var phone_number = document.getElementById('phone_number');
            phone_number.value = sessionStorage.getItem('phone_number');

            name.addEventListener('change', function() {
                sessionStorage.setItem('name', name.value);
            });
            email.addEventListener('change', function() {
                sessionStorage.setItem('email', email.value);
            });
            phone_number.addEventListener('change', function() {
                sessionStorage.setItem('phone_number', phone_number.value);
            });

            var btnRemove = document.getElementById('btnRemove');
            btnRemove.addEventListener('click', function() {
                sessionStorage.clear();
            });

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
