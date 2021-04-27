<?php
session_start();
define('TITLE', 'Customer Feedbacks');
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";

$getFeedbacksQuery = "select fb.* from customer_feedbacks fb";

// tìm kiếm
if ($keyword !== "") {
    $getFeedbacksQuery .= " where (fb.address like '%$keyword%'
                            or fb.content like '%$keyword%'
                            or fb.name like '%$keyword%')
                      ";
}
$feedbacks = queryExecute($getFeedbacksQuery, true);

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
                            <h1 class="m-0 text-dark">Quản trị Customer Feedbacks</h1>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, địa chỉ, nội dung,...">
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
                                <th width=15%>Tên</th>
                                <th width=15%>Địa chỉ</th>
                                <th>Nội dung</th>
                                <th width=10%>Trạng thái</th>
                                <th width="150">Ảnh</th>
                                <th width=10%>
                                    <a href="<?php echo ADMIN_URL . 'customer_feedbacks/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($feedbacks as $feedback) : ?>
                                    <tr>
                                        <td><?php echo $feedback['id'] ?></td>
                                        <td><?php echo $feedback['name'] ?></td>
                                        <td><?php echo $feedback['address'] ?></td>
                                        <td><?php echo $feedback['content'] ?></td>
                                        <td>
                                            <?php if ($feedback['status'] == 1) { ?>
                                                <span class="">Active</span>
                                            <?php } else if ($feedback['status'] == 0) { ?>
                                                <span class="text-danger">Inactive</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <img class="img-fluid" src="<?= BASE_URL . $feedback['avatar'] ?>" alt="">
                                        </td>
                                        <td>
                                            <a href="<?php echo ADMIN_URL . 'customer_feedbacks/edit-form.php?id=' . $feedback['id'] ?>" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?php echo ADMIN_URL . 'customer_feedbacks/remove.php?id=' . $feedback['id'] ?>" class="btn-remove btn btn-sm btn-danger">
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
            setTimeout(() => {
                sessionStorage.clear();
            }, 2000);

            $('.btn-remove').on('click', function() {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn feedback khoản này?",
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
