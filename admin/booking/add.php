<?php
session_start();
require_once '../../config/utils.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add demo</title>
    <?php include_once '../_share/style.php' ?>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="">name</label>
            <input type="text" name="customer_name">
        </div>
        <div>
            <label for="">phone number</label>
            <input type="text" name="phoner_number">
        </div>
        <div>
            <label for="">email</label>
            <input type="text" name="email">
        </div>

        <!-- Date Picker Input -->
        <div class="form-group col-6">
            <label for="" class="text-capitalize font-weight-bold">Thời gian bắt đầu<span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="start_time" />
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fal fa-calendar-star"></i></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function() {
                    $('#datetimepicker1').datetimepicker({
                        format: "YYYY/MM/DD"
                    });
                });
            </script>
        </div>
        <!-- DEnd ate Picker Input -->
    </form>
    <?php include_once '../_share/script.php' ?>
</body>

</html>
