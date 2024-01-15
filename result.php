<?php
session_start(); // bắt đầu phiên làm việc
include "connection.php";
$date = date("H:i d/m/Y"); // lấy thời gian hiên tại
// Biến $_SESSION["end_time"] được tính toán bằng cách thêm số phút của kỳ thi vào thời gian hiện tại
// hàm strtotime() để chuyển đổi dữ liệu ngày tháng và hàm date() để định dạng lại định dạng ngày tháng
$_SESSION["end_time"] = date("H:i d/m/Y", strtotime($date . " + $_SESSION[exam_time] minutes"));
include "header-result-exam.php"; // header-result-exam.php được đưa vào để hiển thị giao diện kết quả của kỳ thi

?>

<div style="display: flex; align-items: center; flex-direction: column;">
    <?php
    // khởi tạo biến $correct và $wrong lần lượt là 0 để đếm số câu trả lời đúng và sai
    $correct = 0;
    $wrong = 0;

    if (isset($_SESSION["answer"])) { // dùng isset() kiểm tra biến session "answer" đã được đặt hay chưa
        foreach ($_SESSION["answer"] as $key => $value) {
            $answer = "";
            $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'
                && id=$key");

            while ($row = mysqli_fetch_array($res)) {
                $answer = $row["answer"];
            }

            if (isset($value)) { // dùng isset() để kiểm tra xem người dùng đã trả lời câu hỏi này chưa
                if ($answer == $value) { // nếu trả lời đúng
                    $correct = $correct + 1;
                } else { // nếu trả lời sai
                    $wrong = $wrong + 1;
                }
            } else { // nếu không trả lời
                $wrong = $wrong + 1;
            }
        }
    }

    $count = 0;
    $res = mysqli_query($link, "(SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='easy' ORDER BY RAND() LIMIT 8)
        UNION
        (SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='medium' ORDER BY RAND() LIMIT 6)
        UNION
        (SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='hard' ORDER BY RAND() LIMIT 6)");
    $count = mysqli_num_rows($res);
    $wrong = $count - $correct;

    echo "<div class='container-result'>";
    echo "<center>";

    echo "Số điểm của bạn: " . $correct . "/" . $count;

    echo "</center>";

    echo "<div>";
    echo "<button id='btnViewDetails' class='view-result' onclick='handleViewDetail()'>Xem lại kết quả</button>";
    echo "<button id='btnDone' class='view-result-done' onclick='handleViewDone()'>Kết thúc</button>";
    echo "</div>";
    ?>

</div>
<div class="review-result" id="hidden-detail" style="display: none;">
    <?php
    $i = 0;
    foreach ($_SESSION['answer'] as $key => $value) {
        $i++;
        $sql = "select * from questions where id=" . $key;
        $res = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($res);
    ?>
        <table class="tablez" style="border-bottom: 1px dotted;">
            <tr>
                <td class="tdz" colspan="2">
                    <?php echo "Câu hỏi " . $i . ": " . $row["question"]; ?>
                </td>
            </tr>
        </table>

        <!-- table questions -->
        <table style="margin-left:10px; margin-bottom: 10px;">
            <!-- op1 -->
            <tr>
                <td>
                    <div style="border:1px solid #000; padding:10px; border-radius: 10px" class="option <?php echo $row['opt1'] == $row['answer'] ? 'correct-answer' : ($value == $row['opt1'] ? 'wrong-answer' : ''); ?>">
                        <!-- Câu trả lời -->
                        <div style="display: flex; flex-direction: row; align-items: center; gap:10px">
                            A.
                            <?php
                            if (strpos($row['opt1'], 'images/') !== false) {
                            ?>
                                <img src="admin/<?php echo $row['opt1']; ?>" height="30" width="30">

                            <?php
                            } else {
                                echo '<span class="answer-p">' . $row['opt1'] . '</span>';
                            }

                            ?>
                        </div>
                    </div>

                </td>
            </tr>

            <!-- op2 -->
            <tr>
                <td>
                    <div style="border:1px solid #000; padding:10px; border-radius: 10px" class="option <?php echo $row['opt2'] == $row['answer'] ? 'correct-answer' : ($value == $row['opt2'] ? 'wrong-answer' : ''); ?>">
                        <div style="display: flex; flex-direction: row; align-items: center; gap:10px">
                            B.
                            <?php
                            if (strpos($row['opt2'], 'images/') !== false) {
                            ?>
                                <img src="admin/<?php echo $row['opt2']; ?>" height="30" width="30">

                            <?php
                            } else {
                                echo '<span class="answer-p">' . $row['opt2'] . '</span>';
                            }

                            ?>
                        </div>
                    </div>
                </td>

            </tr>

            <!-- op3 -->
            <tr>
                <td>
                    <div style="border:1px solid #000; padding:10px; border-radius: 10px" class="option <?php echo $row['opt3'] == $row['answer'] ? 'correct-answer' : ($value == $row['opt3'] ? 'wrong-answer' : ''); ?>">
                        <div style="display: flex; flex-direction: row; align-items: center; gap:10px">
                            C.
                            <?php
                            if (strpos($row['opt3'], 'images/') !== false) {
                            ?>
                                <img src="admin/<?php echo $row['opt3']; ?>" height="30" width="30">

                            <?php
                            } else {
                                echo '<span class="answer-p">' . $row['opt3'] . '</span>';
                            }

                            ?>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- op4 -->
            <tr>
                <td>
                    <div style="border:1px solid #000; padding:10px; border-radius: 10px" class="option <?php echo $row['opt4'] == $row['answer'] ? 'correct-answer' : ($value == $row['opt4'] ? 'wrong-answer' : ''); ?>">
                        <div style="display: flex; flex-direction: row; align-items: center; gap:10px">
                            D.
                            <?php
                            if (strpos($row['opt4'], 'images/') !== false) {
                            ?>
                                <img src="admin/<?php echo $row['opt4']; ?>" height="30" width="30">

                            <?php
                            } else {
                                echo '<span class="answer-p">' . $row['opt4'] . '</span>';
                            }

                            ?>
                        </div>
                    </div>
                </td>
            </tr>

        </table>
    <?php
    }
    ?>
</div>

<?php
if (isset($_SESSION["exam_start"])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh'); //thời gian tại VN hiện tại

    $date = date("H:i d/m/Y"); //H: là giờ, i: là giây, d/m/y ngày/tháng/năm
    mysqli_query($link, "insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)
    values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");
}

if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"]);
?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
<?php
}

?>

<script>
    var isClicked = false;

    function handleViewDetail() {
        var button = document.getElementById('btnViewDetails');
        var div = document.getElementById('hidden-detail');

        if (!isClicked) { // Nếu nút chưa được nhấp
            button.innerHTML = 'Hủy';
            button.className = 'view-result-cancel';
            isClicked = true; // Cập nhật trạng thái
            div.style.display = 'block';
        } else { // Nếu nút đã được nhấp
            button.innerHTML = 'Xem lại kết quả';
            button.className = 'view-result';
            isClicked = false; // Cập nhật trạng thái
            div.style.display = 'none';
        }
    }

    function handleViewDone() {
        // Gửi yêu cầu AJAX đến tệp PHP để xóa session
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "forajax/clear_session.php", true);
        xhttp.send();

        // Chuyển hướng người dùng về trang index.php
        window.location.href = 'select_exam.php';
    }
</script>