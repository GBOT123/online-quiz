<?php 
session_start();
include "../connection.php";
$total_que=0;
$res1=mysqli_query($link,"(SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='easy' ORDER BY RAND() LIMIT 8)
UNION
(SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='medium' ORDER BY RAND() LIMIT 6)
UNION
(SELECT question_no FROM questions WHERE category='$_SESSION[exam_category]' AND level='hard' ORDER BY RAND() LIMIT 6)");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>