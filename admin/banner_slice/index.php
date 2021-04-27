<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$status = isset($_GET['status']) == true ? $_GET['status'] : "";

// Lấy danh sách roles
// $getRolesQuery = "select * from roles where status = 1";
$getRolesQuery = "select * from roles";
$roles = queryExecute($getRolesQuery, true);

// danh sách banner
$getBannerQuery = "select * from banner_slice";
// tìm kiếm
if ($keyword !== "") {
    $getBannerQuery .= " where (firstContent like '%$keyword%'
                            or secondContent like '%$keyword%')
                      ";
    if ($status !== false && $status !== "") {
        $getBannerQuery .= " and status = $status";
    }
} else {
    if ($status !== false && $status !== "") {
        $getBannerQuery .= " and status = $status";
    }
}
$banners = queryExecute($getBannerQuery, true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
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
                            <h1 class="m-0 text-dark">Quản trị banner slice</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= ADMIN_URL . 'dashboard' ?>">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-10 col-offset-1">
                            <!-- Filter  -->
                            <form action="" method="get">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, nội dung,...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="status" class="form-control">
                                            <option value="" selected>Chọn trạng thái</option>
                                            <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                            <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Danh sách users  -->
                        <table class="table table-stripped">
                            <thead class="table-secondary">
                                <th>ID</th>
                                <th>First content</th>
                                <th>Second content</th>
                                <th>Trạng thái</th>
                                <th width="100">Ảnh</th>
                                <th>
                                    <a href="<?php echo ADMIN_URL . 'banner_slice/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($banners as $banner) : ?>
                                    <tr>
                                        <td><?php echo $banner['id'] ?></td>
                                        <td><?php echo $banner['firstContent'] ?></td>
                                        <td><?php echo $banner['secondContent'] ?></td>
                                        <td>
                                            <?php if ($banner['status'] == 1) { ?>
                                                <span class="">Kích hoạt</span>
                                            <?php } else if ($banner['status'] == 0) { ?>
                                                <span class="text-danger">Không kích hoạt</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <img class="img-fluid" src="<?= BASE_URL . $banner['img_path'] ?>" alt="">
                                        </td>
                                        <td>
                                            <a href="<?php echo ADMIN_URL . 'banner_slice/edit-form.php?id=' . $banner['id'] ?>" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?php echo ADMIN_URL . 'banner_slice/remove.php?id=' . $banner['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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
            $('.btn-remove').on('click', function() {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa tài khoản này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => { // arrow function es6 (es2015)
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                });
                return false;
            });
            <?php if (isset($_GET['msg'])) : ?>
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'warning',
                    title: "<?= $_GET['msg']; ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>
