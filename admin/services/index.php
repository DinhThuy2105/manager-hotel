<?php
session_start();
define('TITLE', 'Services');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get keywords
$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$statusSearch = isset($_GET['statusSearch']) == true ? $_GET['statusSearch'] : "";
// danh sách services
$getServicesQuery = "select * from services";
// tìm kiếm
if ($keyword !== "" || strlen($keyword) > 0) {
    $getServicesQuery .= " where (name like '%$keyword%'
                            or introduce like '%$keyword%')";
    if (strlen($statusSearch) > 0) {
        $getServicesQuery .= " and status = $statusSearch%";
    }
} else {
    if (strlen($statusSearch) > 0) {
        $getServicesQuery .= " where status = $statusSearch";
    }
}
$services = queryExecute($getServicesQuery, true);

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
                            <h1 class="m-0 text-dark">Quản trị services</h1>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, nội dung dịch vụ...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="statusSearch" class="form-control">
                                            <option selected value="">Tất cả</option>
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
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead class="table-secondary">
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>
                                        <a href="<?php echo ADMIN_URL . 'services/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                    </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($services as $service) : ?>
                                        <tr>
                                            <td><?php echo $service['id'] ?></td>
                                            <td><?php echo $service['name'] ?></td>
                                            <td>
                                                <?php if ($service['feature_img']) { ?>
                                                    <img class="img-fluid" src="<?= BASE_URL . $service['feature_img'] ?>" width="150px">
                                                <?php } else { ?>
                                                    <img class="img-fluid" src="<?= PUBLIC_URL . 'img/default-image.jpg' ?>" width="150px">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($service['status'] == 1) { ?>
                                                    <span class="">Kích hoạt</span>
                                                <?php } else if ($service['status'] == 0) { ?>
                                                    <span class="text-danger">Không kích hoạt</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo ADMIN_URL . 'services/edit-form.php?id=' . $service['id'] ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo ADMIN_URL . 'services/remove.php?id=' . $service['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
            setTimeout(() => {
                sessionStorage.clear();
            }, 2000);

            $('.btn-remove').on('click', function() {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa dịch vụ này không?",
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
                    icon: 'success',
                    title: "<?= $_GET['msg']; ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>
