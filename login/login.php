<?php
// bắt đầu sử dụng session
session_start();
define('TITLE', 'Login');
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
		.hidden {
			display: <?php echo $_GET['style'] ?>
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="col-4 offset-4">
			<div class="login-logo d-flex justify-content-center m-5">
				<a href="<?php echo BASE_URL ?>">
					<img src="<?php echo PUBLIC_URL . 'img/site-logo.png' ?>" alt="" class="img-logo">
				</a>
			</div>
			<form action="<?= LOGIN_URL . 'post-login.php' ?>" method="post" autocomplete="on">
				<div class="d-flex justify-content-center">
					<?php if (isset($_GET['msg'])) : ?>
						<span class="text-danger"><?php echo $_GET['msg'] ?></span>
					<?php endif; ?>
				</div>
				<div class="d-flex justify-content-center">
					<?php if (isset($_GET['messages'])) : ?>
						<span class="text-danger"><?php echo $_GET['messages'] ?></span>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" autofocus>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" autocomplete="off" required placeholder="Nhập mật khẩu">
				</div>
				<div class="form-group">
					<a href="<?= LOGIN_URL . 'register.php' ?>" class="text-danger hidden"><ins>Chưa có tài khoản, đi tới đăng ký</ins></a>&nbsp;
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-primary">Đăng nhập</button>&nbsp;
					<a href="<?php echo BASE_URL ?>" id="btnCancel" class="btn btn-danger">Hủy</a>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script>
		var emailLogin = document.getElementById('email');
		var btnCancel = document.getElementById('btnCancel');

		emailLogin.addEventListener('change', () => {
			sessionStorage.setItem('emailLogin', emailLogin.value);
		});

		btnCancel.addEventListener('click', () => {
			sessionStorage.clear('emailLogin');
		});

		emailLogin.value = sessionStorage.getItem('emailLogin');
	</script>
</body>

</html>
