<?php
session_start();
define('TITLE', 'Customer Feedbacks');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// dd($_SESSION[AUTH]['name']);
$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";

// lấy danh sách contacts
$getContactsQuery = "select c.* from contacts c";

// tìm kiếm
if ($keyword !== "") {
    $getContactsQuery .= " where (c.name like '%$keyword%'
                            or c.phone_number like '%$keyword%'
                            or c.email like '%$keyword%'
                            or c.subject like '%$keyword%'
                            or c.messages like '%$keyword%'
                            or c.status like '%$keyword%')";
}
// dd($getContactsQuery);
$contacts = queryExecute($getContactsQuery, true);

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
                            <h1 class="m-0 text-dark">Quản trị contacts</h1>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, email, số điện thoại, chủ đề,...">
                                    </div>
                                    <!-- <div class="form-group col-4">
                                        <select name="role" class="form-control">
                                            <option selected value="">Tất cả</option>
                                            <?php foreach ($roles as $ro) : ?>
                                                <option <?php if ($roleId === $ro['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $ro['id'] ?>"><?php echo $ro['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Danh sách contacts  -->
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Email khách hàng</th>
                                <th>Chủ đề</th>
                                <th width=25%>Nội dung lời nhắn</th>
                                <th>Trạng thái</th>
                                <th width=10%>Thao tác</th>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact) : ?>
                                    <tr>
                                        <td><?php echo $contact['id'] ?></td>
                                        <td><?php echo $contact['name'] ?></td>
                                        <td><?php echo $contact['phone_number'] ?></td>
                                        <td>
                                            <?php echo $contact['email'] ?>
                                        </td>
                                        <td><?php echo $contact['subject'] ?></td>
                                        <td><?php echo $contact['messages'] ?></td>
                                        <?php if ($contact['status'] == 0) { ?>
                                            <td class="text-danger">Chưa trả lời</td>
                                        <?php } else if ($contact['status'] == 1) { ?>
                                            <td class="text-secondary">Đã trả lời</td>
                                        <?php } ?>
                                        <td>
                                            <a href="<?php echo ADMIN_URL . 'contacts/content-email.php?id=' . $contact['id'] ?>" class="btn btn-sm btn-success">
                                                <i class="far fa-comment-dots"></i>
                                            </a>
                                            <a href="<?php echo ADMIN_URL . 'contacts/remove.php?id=' . $contact['id'] ?>" class="btn-remove btn btn-sm btn-danger">
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
