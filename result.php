<?php
session_start(); // bắt đầu phiên làm việc
include "connection.php";
$date = date("H:i d/m/Y"); // lấy thời gian hiên tại
// Biến $_SESSION["end_time"] được tính toán bằng cách thêm số phút của kỳ thi vào thời gian hiện tại
// hàm strtotime() để chuyển đổi dữ liệu ngày tháng và hàm date() để định dạng lại định dạng ngày tháng
$_SESSION["end_time"] = date("H:i d/m/Y", strtotime($date . " + $_SESSION[exam_time] minutes"));
include "header-result-exam.php"; // header-result-exam.php được đưa vào để hiển thị giao diện kết quả của kỳ thi
?>

<div>
    <div class="tb">
        <?php
        // khởi tạo biến $correct và $wrong lần lượt là 0 để đếm số câu trả lời đúng và sai
        $correct = 0;
        $wrong = 0;

        if (isset($_SESSION["answer"])) { // dùng isset() kiểm tra biến session "answer" đã được đặt hay chưa
            echo '<pre>';
            var_dump($_SESSION["answer"][50]);
            echo '</pre>';
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

        echo "<div class='tb'>";

        echo "<br>";
        echo "<br>";
        echo "<center>";

        echo "Số điểm của bạn: " . $correct . "/" . $count;
        echo "<br>";

        echo "</center>";

        ?>
    </div>

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