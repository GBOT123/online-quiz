<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="\Simple-Quiz-Web-master\Simple-Quiz-Web-master\Menu\Picture\icon-tab.png" />

    <title>THI TRẮC NGHIỆM</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="\css\homeinexam.css">

</head>

<body>

    <div class="menu-container">
        <ul class="menu">
            <li class="active"><a href="select_exam.php">TRANG CHỦ</a>
            </li>
            <li><a href="instruct.php">HƯỚNG DẪN SỬ DỤNG</a>
            </li>
            <li><a href="update_registration.php">CẬP NHẬT THÔNG TIN</a>
            </li>
            <li><a href="old_exam_results.php">KẾT QUẢ</a>
            </li>
            <li><a href="logout.php">ĐĂNG XUẤT</a>
            </li>
        </ul>
        <div class="user-info">
            <img src="\admin\images\360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.jpg" alt="Avatar"
                class="avatar">
            <!-- Biến $_SESSION["username"] lưu trữ thông tin tên đăng nhập của người dùng -->
            <span class="username"><?php echo $_SESSION["username"]; ?></span>
        </div>
    </div>


    <div class="titlez">
        CHỦ ĐỀ THI TRẮC NGHIỆM
    </div>

</body>