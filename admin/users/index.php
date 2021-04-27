<?php
session_start();
define('TITLE', 'Users');
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$roleId = isset($_GET['role']) == true ? $_GET['role'] : false;

// Lấy danh sách roles
$getRolesQuery = "select * from roles";
$roles = queryExecute($getRolesQuery, true);

// danh sách users
$getUsersQuery = "select
                    u.*,
                    r.name as role_name
                    from users u
                    join roles r
                    on u.role_id = r.id";
// tìm kiếm
if ($keyword !== "") {
    $getUsersQuery .= " where (u.email like '%$keyword%'
                            or u.phone_number like '%$keyword%'
                            or u.name like '%$keyword%')
                      ";
    if ($roleId !== false && $roleId !== "") {
        $getUsersQuery .= " and u.role_id = $roleId";
    }
} else {
    if ($roleId !== false && $roleId !== "") {
        $getUsersQuery .= " where u.role_id = $roleId";
    }
}
$users = queryExecute($getUsersQuery, true);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Header -->
        <?php include_once '../_share/header.php'; ?>
        <!-- Header -->

        <!-- Main Sidebar Container -->
        <?php include_once '../_share/sidebar.php'; ?>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Quản trị users</h1>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, email, căn hộ, số điện thoại,...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="role" class="form-control">
                                            <option selected value="">Tất cả</option>
                                            <?php foreach ($roles as $ro) : ?>
                                                <option <?php if ($roleId === $ro['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $ro['id'] ?>"><?php echo $ro['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Loại tài khoản</th>
                                        <th width="100">Ảnh</th>
                                        <th>Số ĐT</th>
                                        <th>
                                            <a href="<?= ADMIN_URL . 'users/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $us) : ?>
                                            <tr>
                                                <td><?php echo $us['id'] ?></td>
                                                <td><?php echo $us['name'] ?></td>
                                                <td><?php echo $us['email'] ?></td>
                                                <td>
                                                    <?php echo $us['role_name'] ?>
                                                </td>
                                                <td>
                                                    <img class="img-fluid" src="<?= BASE_URL . $us['avatar'] ?>" alt="">
                                                </td>
                                                <td><?php echo $us['phone_number'] ?></td>
                                                <td>
                                                    <?php if ($us['role_id'] < $_SESSION[AUTH]['role_id']) : ?>
                                                        <a href="<?= ADMIN_URL . 'users/edit-form.php?id=' . $us['id'] ?>" class="btn btn-sm btn-info">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($us['role_id'] < $_SESSION[AUTH]['role_id']) : ?>
                                                        <a href="<?= ADMIN_URL . 'users/remove.php?id=' . $us['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
            }, 2500);

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
