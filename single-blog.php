<?php
session_start();
define('TITLE', 'Bài viết');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$id = isset($_GET['id']) ? $_GET['id'] : false;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
// get data from news
$getNewsQuery = "select * from news where id = $id";
$news = queryExecute($getNewsQuery, false);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="single_blog_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>Chi tiết tin tức</h2>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <div class="container">
                            <div class="special_offer_sub">
                                <img src="<?=BASE_URL . $webSetting['offer']?>" alt="imf">
                            </div>
                        </div>
                    </div>
                    <!-- end offer start -->
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrunb -->

    <!-- start single blog section -->
    <section class="single_blog_area margin-bottom-150">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single_blog_post_area">
                        <div class="sing_blog_photo">
                            <img src="<?=PUBLIC_URL?>img/sing_blog_photo_1.jpg" alt="">
                            <i class="fa fa-heart top"></i>
                            <i class="fa fa-picture-o bottom"></i>
                        </div>
                        <div class="sing_blog_content">
                            <div class="sing_blog_heading">
                                <h2 class="text-capitalize"><?=$news['title']?></h2>
                                <ul>
                                    <li>By Admin</li>
                                    <li>3 Jan 2015</li>
                                    <li>3 Comment</li>
                                </ul>
                            </div>
                            <div class="sing_blog_post_cont">
                                <p><?=$news['news_content']?></p>
                            </div>
                            <div class="related_post">
                                <h2>Related Post</h2>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="sing_related_post">
                                            <h3><a href="#">Heading title here</a></h3>
                                            <p>In <span>"loremipsum"</span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="sing_related_post">
                                            <h3><a href="#">Heading title here</a></h3>
                                            <p>In <span>"loremipsum"</span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="sing_related_post">
                                            <h3><a href="#">Heading title here</a></h3>
                                            <p>In <span>"loremipsum"</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sing_blog_post_nav">
                                <a href="#" class="">Previous post</a>
                                <a href="#" class="floatright">Next post</a>
                            </div>
                            <div class="single_post_author_area">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="author_photo">
                                            <img alt="" src="<?=PUBLIC_URL?>img/author_photo.jpg">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="author_details">
                                            <h2>John Deo</h2>
                                            <h3>Author</h3>
                                            <p>Sed et sapien elit. Aliquam laoreet odio nunc, id imperdiet mauris auctor in. Ut eu norem tristique nibh, sit amet euismod felis. Quisq
                                                ue aliquet nulla justomauris auctor in. </p>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_post_comment_area">
                                <h2>(4) Comments</h2>
                                <ul class="coments">
                                    <li>
                                        <div class="col-md-2 padding-0 col-sm-2">
                                            <div class="com_author_photo">
                                                <img src="<?=PUBLIC_URL?>img/comment_photo_1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="comment_details">
                                                <h3>Nishant Deo <span class="comm_time">12 April ,2015 2 days ago </span></h3>
                                                <p>Vivamus quis luctus urna. Donec elementum tempor rhoncus. Fusce iaculis tempor felis eget dictum Sed eget fringilla lacus. In tristiqueelementum tempor pharetra.</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-2 padding-0 col-sm-2">
                                            <div class="com_author_photo">
                                                <img src="<?=PUBLIC_URL?>img/comment_photo_2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="comment_details">
                                                <h3>Abhay Mishra<span class="comm_time">12 April ,2015 2 days ago </span></h3>
                                                <p>Vivamus quis luctus urna. Donec elementum tempor rhoncus. Fusce iaculis tempor felis eget dictum Sed eget fringilla lacus. In tristiqueelementum tempor pharetra.</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="col-md-2 padding-0 col-sm-2">
                                                    <div class="com_author_photo">
                                                        <img src="<?=PUBLIC_URL?>img/comment_photo_3.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="comment_details">
                                                        <h3>Nishi Dhavan<span class="comm_time">12 April ,2015 2 days ago </span></h3>
                                                        <p>Vivamus quis luctus urna. Donec elementum tempor rhoncus. Fusce iaculis tempor felis eget dictum Sed stiqueelementum tempor.</p>
                                                        <a href="#" class="reply">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="col-md-2 padding-0 col-sm-2">
                                            <div class="com_author_photo">
                                                <img src="<?=PUBLIC_URL?>img/comment_photo_4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="comment_details">
                                                <h3>Vikram Nob<span class="comm_time">12 April ,2015 2 days ago </span></h3>
                                                <p>Vivamus quis luctus urna. Donec elementum tempor rhoncus. Fusce iaculis tempor felis eget dictum Sed eget fringilla lacus. In tristiqueelementum tempor pharetra.</p>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="comment_form">
                                    <h2>Leave A Reply</h2>
                                    <form action="https://premiumlayers.net/demo/html/hotelbooking/single-post.html">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Email</label>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Subject</label>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Message</label>
                                                <textarea name="" cols="30" rows="10"></textarea>
                                                <input type="submit" value="Reply">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <aside>
                        <div class="row">
                            <div class="right_sidebar_area">
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="input_search margin-bottom-30">
                                        <input type="text" placeholder="search">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="blog_category margin-bottom-30">
                                        <ul class="clearul">
                                            <li><a href="#"><i class="fa fa-circle-thin"></i>Lorem ipsum dolor sit</a></li>
                                            <li><a href="#"><i class="fa fa-circle-thin"></i>Misetol mollis crass</a></li>
                                            <li><a href="#"><i class="fa fa-circle-thin"></i>Proin congue ut</a></li>
                                            <li><a href="#"><i class="fa fa-circle-thin"></i>Porttitor anteon</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="blog_recent_post margin-bottom-30">
                                        <div class="single_recent_post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-xs-4">
                                                    <div class="recent_thumb">
                                                        <img src="<?=PUBLIC_URL?>img/recent_blog_post-2.png" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                    <div class="recent_post_details">
                                                        <h6>Lorem ispum dolor sit amet non ultrice</h6>
                                                        <p>April 12, 2015</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_recent_post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-xs-4">
                                                    <div class="recent_thumb">
                                                        <img src="<?=PUBLIC_URL?>img/recent_blog_post-1.png" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                    <div class="recent_post_details">
                                                        <h6>Vietnamese Style Grilled Five Spice Chicken</h6>
                                                        <p>April 12, 2015</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_recent_post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-xs-4">
                                                    <div class="recent_thumb">
                                                        <img src="<?=PUBLIC_URL?>img/recent_blog_post-3.png" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                    <div class="recent_post_details">
                                                        <h6>lorem goat cheese and chorizo Rolls</h6>
                                                        <p>April 12, 2015</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_recent_post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-xs-4">
                                                    <div class="recent_thumb">
                                                        <img src="<?=PUBLIC_URL?>img/recent_blog_post-1.png" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                    <div class="recent_post_details">
                                                        <h6>Vietnamese Style Grilllorem ipsued Five Spice Chicken</h6>
                                                        <p>April 12, 2015</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="recent_post_tags">
                                        <h6>Tags</h6>
                                        <a href="#" class="active">lorem</a>
                                        <a href="#">ipsum</a>
                                        <a href="#">lorem ipsum</a>
                                        <a href="#">UI</a>
                                        <a href="#">Dolor</a>
                                        <a href="#">Fusion</a>
                                        <a href="#">lorem</a>
                                        <a href="#">Hot Chicken</a>
                                        <a href="#">lorem</a>
                                        <a href="#">lorem</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- end single blog section -->

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->
    <!-- my js -->
    <script src="js/main.js"></script>

</body>

</html>
