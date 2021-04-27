<?php
session_start();
define('TITLE', 'Room Galleries');
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$typeId = isset($_GET['type']) == true ? $_GET['type'] : false;

// get room galleries
$getRoomGalleriesQuery = "select rg.*, rt.name as name
                                    from room_galleries rg join room_types rt
                                    on rg.room_id = rt.id";
// tìm kiếm
if ($keyword !== "") {
    $getRoomGalleriesQuery .= " where (name like '%$keyword%')
                      ";
    if ($typeId !== false && $typeId !== "") {
        $getRoomGalleriesQuery .= " and rg.room_id = $typeId";
    }
} else {
    if ($typeId !== false && $typeId !== "") {
        $getRoomGalleriesQuery .= " where rg.room_id = $typeId";
    }
}
$roomGalleries = queryExecute($getRoomGalleriesQuery, true);

// get room types
$getRoomTypesQuery = "select * from room_types";
$roomTypes = queryExecute($getRoomTypesQuery, true);
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
                            <h1 class="m-0 text-dark">Quản trị album ảnh</h1>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên loại phòng,...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="type" class="form-control">
                                            <option selected value="">Tất cả</option>
                                            <?php foreach ($roomTypes as $room) : ?>
                                                <option <?php if ($typeId === $room['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $room['id'] ?>"><?php echo $room['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Danh sách galleries  -->
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead class="table-secondary">
                                    <th>ID</th>
                                    <th>Loại phòng</th>
                                    <th>Ảnh loại phòng</th>
                                    <th>
                                        <a href="<?php echo ADMIN_URL . 'room_galleries/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                    </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($roomGalleries as $roomGallerie) : ?>
                                        <tr>
                                            <td><?php echo $roomGallerie['id'] ?></td>
                                            <td><?php echo $roomGallerie['name'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $roomGallerie['img_url'] ?>" width=150 alt="">
                                            </td>
                                            <td>
                                                <a href="<?php echo ADMIN_URL . 'room_galleries/edit-form.php?id=' . $roomGallerie['id'] ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo ADMIN_URL . 'room_galleries/remove.php?id=' . $roomGallerie['id'] ?>" class="btn-remove btn btn-sm btn-danger">
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
                    text: "Bạn có chắc chắn muốn xóa ảnh này không?",
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
