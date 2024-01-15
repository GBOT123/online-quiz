<?php
session_start();
include "header_add_edit_exam_quest.php";
include "../connection.php";

if (!isset($_SESSION["admin_name"])) {
?>
    <script type="text/javascript">
        window.location = "login_system_admin\login_form.php";
    </script>
<?php
}

if (isset($_SESSION["message"])) {
    echo "<script>alert('".$_SESSION["message"]."')</script>";
    unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị
}

?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chọn danh mục bài kiểm tra để thêm và chỉnh sửa câu hỏi</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-end">
                        <button type="button" data-toggle="modal" data-target="#modalUpload" class="btn btn-info rounded">Thêm nhiều</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUploadTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalUploadLongTitle">Upload File Câu Hỏi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>File mẫu</div>
                                                <div>
                                                    <a class="text-success" href="assets/instruct_exam.xlsx">download here</a>
                                                </div>
                                            </div>

                                            <hr />

                                            <form method="POST" name="formFile" action="actions/upload_instruct_exam.php" enctype="multipart/form-data">
                                                <div>Upload file</div>
                                                <div class="mt-2">
                                                    <input type="file" name="excel_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                                </div>
                                                <div class="text-center mt-2">
                                                    <input type="submit" name="submit_file" class="btn btn-warning rounded" value="Tải lên file" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Chủ đề đã được thêm
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Chủ đề</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Chọn chủ đề</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $count = 0;
                                            $res = mysqli_query($link, "select * from exam_category");
                                            while ($row = mysqli_fetch_array($res)) {
                                                $count = $count + 1;
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["category"]; ?></td>
                                                    <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                    <td><a href="add_edit_quest.php?id=<?php echo $row["id"]; ?>"> Chọn
                                                        </a>
                                                    </td>


                                                </tr>
                                            <?php
                                            }
                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->