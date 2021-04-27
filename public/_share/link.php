<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= $title ?></title>
<link rel="shortcut icon" href="<?= PUBLIC_URL ?>/img/favicon.ico" type="image/x-icon">
<!-- fonts Roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="<?= PUBLIC_URL . 'fontawesome/css/all.min.css' ?>" />
<!-- bootstrap -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/bootstrap.min.css" />
<!-- uikit -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/uikit.min.css" />
<!-- animate -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/animate.css" />
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/datepicker.css" />
<!-- Owl carousel 2 css -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/owl.carousel.css">
<!-- rev slider -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/rev-slider/settings.css" />
<!-- lightslider -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/lightslider.css">
<!-- Theme -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css">
<!-- my custom css -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/main.css" />
<!-- responsive -->
<link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/responsive.css" />
<!-- Sweet alert -->
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<style>
    .mainmenu .nav.navbar-nav li.dropdown>a {
        background: url(<?= PUBLIC_URL . 'img/dropdown_bg.png' ?>) no-repeat scroll 100% 50%;
    }

    .hotel_facilities_area {
        background: url(<?= PUBLIC_URL . 'img/hotel-facilities-bg.jpg' ?>) no-repeat fixed 0 0;
    }

    div#customer_says_slider .customer_comment {
        background: rgba(0, 0, 0, 0) url(<?= PUBLIC_URL . 'img/customer-slider-bg.png' ?>) no-repeat scroll 0 0 / cover;
    }

    body#error_page .error_area {
        background-image: url(<?= PUBLIC_URL . 'img/error_bg.jpg' ?>);
    }

    body#error_page .error .section_title.nice_title>h3::after {
        background: rgba(0, 0, 0, 0) url(<?=PUBLIC_URL . 'img/nice-title-error.png'?>) no-repeat scroll 0 0;
    }
</style>
