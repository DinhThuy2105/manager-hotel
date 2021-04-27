<?php
// bắt đầu sử dụng session
session_start();
define('TITLE', 'Resigter');
require_once "../config/utils.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= PUBLIC_URL . 'img/favicon.ico' ?>" type="image/x-icon">
    <title><?=$title?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL . 'css/main.css' ?>">
    <style>
        label.error {
            display: inline;
            color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-8 offset-2">
            <div class="login-logo d-flex justify-content-center m-5">
                <a href="<?= BASE_URL ?>">
                    <img src="<?= PUBLIC_URL . 'img/site-logo.png' ?>" alt="" class="img-logo">
                </a>
            </div>
            <form id="add-user-form" action="<?= LOGIN_URL . 'save-register.php'; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="email">Địa chỉ email</label>
                        <input type="email" class="form-control" id="emailUser" name="email" placeholder="Nhập Email" onchange="setData('emailUser', this.value);">
                        <?php if (isset($_GET['emailerr'])) : ?>
                            <label class="error"><?= $_GET['emailerr'] ?></label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" id="nameUser" name="name" placeholder="Nhập họ và tên" onchange="setData('nameUser', this.value);">
                        <?php if (isset($_GET['nameerr'])) : ?>
                            <label class="error"><?= $_GET['nameerr'] ?></label>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="main-password" name="password" autocomplete="off" placeholder="Nhập mật khẩu">
                        <?php if (isset($_GET['passworderr'])) : ?>
                            <label class="error"><?= $_GET['passworderr'] ?></label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-6">
                        <label for="cfpassword">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="cfpassword" autocomplete="off" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning">Xác nhận đăng ký</button>&nbsp;
                    <a href="<?php echo BASE_URL ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
    <script>
        var nameUser = document.getElementById('nameUser');
        nameUser.value = sessionStorage.getItem('nameUser');
        var emailUser = document.getElementById('emailUser');
        emailUser.value = sessionStorage.getItem('emailUser');

        function setData(nameSession, input) {
            sessionStorage.setItem(nameSession, input);
        }

        var cancel = document.getElementById('btnCancel');
        cancel.addEventListener('click', () => {
            sessionStorage.clear()
        });

        $('#add-user-form').validate({
            rules: {
                email: {
                    required: true,
                    maxlength: 191,
                    email: true,
                    remote: {
                        url: "<?= LOGIN_URL . 'verify-email-existed.php'?>",
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
                    minlength: 6,
                    maxlength: 16
                },
                cfpassword: {
                    required: true,
                    equalTo: "#main-password"
                },
                name: {
                    required: true,
                    maxlength: 191
                }
            },

            messages: {
                email: {
                    required: "Vui lòng nhập email",
                    email: 'Nhập đúng định dạng email <span class="font-italic">example@email.com</span>',
                    remote: "Email đã tồn tại, vui lòng sử dụng email khác"
                },
                password: {
                    required: "Hãy nhập mật khẩu",
                    minlength: "Số lượng ký tự tối thiểu là 6 ký tự",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                cfpassword: {
                    required: "Nhập lại mật khẩu",
                    equalTo: "Cần khớp với mật khẩu"
                },
                name: {
                    required: "Nhập tên bạn vào đây",
                    maxlength: "Độ dài tối đa là 191 ký tự"
                }
            }
        });
    </script>
</body>

</html>
