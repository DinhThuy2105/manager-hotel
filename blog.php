<?php
session_start();
define('TITLE', 'Our Blog');
require_once './config/utils.php';
$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// get data from web_settings
$getWebSettingQuery = "select * from web_settings where id = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

// get data from news
$getNewsQuery = "select * from news";
$total_records = count(queryExecute($getNewsQuery, true));

$limit = 2;
// tổng số trang
$total_page = ceil($total_records / $limit);

// Tìm Start
$start = ($current_page - 1) * $limit;

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$getNewsQuery .= " LIMIT $start, $limit";
$allNews = queryExecute($getNewsQuery, true);
// get recent post
$getRecentPost = "select * from news order by created_at DESC LIMIT 0, 3";
$recentPost = queryExecute($getRecentPost, true);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './public/_share/link.php'; ?>
</head>

<body id="blog_page">
    <!-- start header -->
    <?php include_once './public/_share/header.php'; ?>
    <!-- end header -->

    <!-- start breadcrumb -->
    <section class="breadcrumb_main_area margin-bottom-80">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcrumb_main nice_title">
                    <h2>News</h2>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <div class="container">
                            <div class="special_offer_sub">
                                <img src="<?= BASE_URL . $webSetting['offer'] ?>" alt="imf">
                            </div>
                        </div>
                    </div>
                    <!-- end offer start -->
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrunb -->

    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-grid border-right masonry boxed_child">
                        <?php foreach ($allNews as $news) : ?>
                            <article class="post">
                                <figure>
                                    <a href="<?= BASE_URL . 'single.php?id=' . $news['id'] ?>" title="Post"><img alt="Post with Slider" src="<?= $news['feature_image'] ?>"></a>
                                    <div class="blog_bg_light"><span class="post_date">October 22, 2015</span>
                                        <h2 class="post_title"><a href="<?= BASE_URL . 'single.php?id=' . $news['id'] ?>"><?= $news['title'] ?></a></h2>
                                        <div class="post_figure_and_info">
                                            <div class="post_sub"><a href="#"><span class="post_info post_author"><?= $news['author_id'] ?></span></a><a href="#22"><span class="post_info post_categories">Suites</span></a><a href="#"><span class="post_info post_comment"> <i class="fad fa-comment"></i>12 </span></a></div>
                                        </div>
                                        <p class="text-justify"><?= substr($news['news_content'], 0, 400) ?></p><a href="<?= BASE_URL . 'single.php?id=' . $news['id'] ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </figure>
                            </article>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination -->
                    <div class="col-md-12 text-center">
                        <ul class="pagination">
                            <?php
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="./blog.php?page=' . ($current_page - 1) . '">Previous</a></li>';
                            }

                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '<li class="page-item active"><a class="page-link" href="./blog.php?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="./blog.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }

                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="./blog.php?page=' . ($current_page + 1) . '">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- =========================== SIDEBAR ==========================-->
                    <aside class="widget widget_search small_screen_margin_top_half">
                        <form id="s" method="get" name="s" action="#">
                            <div class="input-group">
                                <input id="search" name="s" type="text" placeholder="SEARCH" class="form-control"><i class="icon icon-Search"></i>
                            </div>
                        </form>
                    </aside>
                    <aside class="widget widget_latest_posts">
                        <h4>RECENT POSTS</h4>
                        <?php foreach ($recentPost as $recent) : ?>
                            <div class="row">
                                <div class="col-4">
                                    <a href="<?= BASE_URL . 'single.php?id=' . $recent['id'] ?>"><img src="<?= BASE_URL . $recent['feature_image'] ?>" alt="Widget Image" class="image-recent-post"></a>
                                </div>
                                <div class="col-6">
                                    <a href="<?= BASE_URL . 'single.php?id=' . $recent['id'] ?>"><span class="text-capitalize"><?= $recent['title'] ?></span></a>
                                    <p><?=$recent['created_at']?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                    <aside class="widget widget_categories">
                        <h4>CATEGORIES</h4>
                        <ul>
                            <li><a href="#!">Services<small>7</small></a></li>
                            <li><a href="#!">Accomondation<small>12</small></a></li>
                            <li><a href="#!">Room &amp; suite<small>3</small></a></li>
                            <li><a href="#!">Spa &amp; gym<small>2</small></a></li>
                            <li><a href="#!">Pool &amp; swim<small>9</small></a></li>
                        </ul>
                    </aside>
                    <!-- <aside class="widget widget_tags">
                        <h4>TAGS</h4>
                        <ul>
                            <li><a href="#!">HOTEL</a></li>
                            <li><a href="#!">SERVICES</a></li>
                            <li><a href="#!">ROOM</a></li>
                            <li><a href="#!">QUALITY</a></li>
                            <li><a href="#!">POOL</a></li>
                            <li><a href="#!">LUXURY</a></li>
                            <li><a href="#!">GYM</a></li>
                            <li><a href="#!">BOOKING</a></li>
                            <li><a href="#!">SPA</a></li>
                            <li><a href="#!">GOLF</a></li>
                            <li><a href="#!">FOOTBALL</a></li>
                            <li><a href="#!">TV</a></li>
                            <li><a href="#!">WIFI</a></li>
                        </ul>
                    </aside> -->
                    <aside class="widget widget_recent_comments">
                        <h4>RECENT COMMENTS</h4>
                        <div class="media">
                            <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                            <div class="media-body"><span>Mike Willmadeit</span><a href="#"><span>Quality services</span></a></div>
                        </div>
                        <div class="media">
                            <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                            <div class="media-body"><span>Jessica Simpson</span><a href="#"><span>Hello World</span></a></div>
                        </div>
                        <div class="media">
                            <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                            <div class="media-body"><span>Jimmy Henrdax</span><a href="#"><span>We do love what we do</span></a></div>
                        </div>
                    </aside>
                    <!-- END======================== SIDEBAR ==========================-->
                </div>
            </div>
        </div>
    </section>

    <!-- start footer -->
    <?php include_once './public/_share/footer.php'; ?>
    <!-- end footer -->
    <!-- start script link -->
    <?php include_once './public/_share/script.php'; ?>
    <!-- end script link -->
</body>

</html>
