<?php
session_start();
define('TITLE', 'Web setting');
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";

// get data from web_settings table
$getDataWebsettingsQuery = "select * from web_settings";
$webSettings = queryExecute($getDataWebsettingsQuery, true);
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
                            <h1 class="m-0 text-dark">Quản trị Web-Settings</h1>
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
                        <!-- Danh sách websettings  -->
                        <table class="table table-stripped">
                            <thead class="table-secondary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Trạng thái</th>
                                <th>Chỉnh sửa</th>
                            </thead>
                            <tbody>
                                <?php foreach ($webSettings as $setting) : ?>
                                    <tr>
                                        <td><?php echo $setting['id'] ?></td>
                                        <td><?php echo $setting['name'] ?></td>
                                        <td>
                                            <?php if ( $setting['status'] == ACTIVE) { ?>
                                                <span class="">Kích hoạt</span>
                                            <?php } else if ( $setting['status'] == INACTIVE) { ?>
                                                <span class="text-danger">Không kích hoạt</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo ADMIN_URL . 'web_settings/edit-form.php?id=' . $setting['id'] ?>" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil-alt"></i>
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
