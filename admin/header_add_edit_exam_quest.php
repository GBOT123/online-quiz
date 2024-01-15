<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý câu hỏi</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images\logo (2).png">

    <!-- Adding Jquery to use Modal bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/test.css"> -->


    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css\style.css">


    <!-- font chữ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



    <!-- style hover for menu -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <style>
    li:hover,
    li.active {
        background-color: #059862;
        transition: all 0.2s linear;
    }
    </style>

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    Quản lý câu hỏi
                </a>
                <a class="navbar-brand hidden" href="/"><img src="images\logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-edit"></i>Thêm và chỉnh
                            sửa chủ đề

                        </a>
                    </li>
                    <!-- active có chức năng đổi màu xanh của thẻ chọn-->

                    <li class="active">
                        <a href="add_edit_exam_quest.php"> <i class="menu-icon fa fa-question"></i>Thêm và chỉnh sửa câu
                            hỏi

                        </a>
                    </li>
                    <li>
                        <a href="instruct_exam.php"> <i class="menu-icon fa fa-link"></i>Hướng dẫn sử dụng web thi
                            trắc nghiệm
                        </a>
                    </li>
                    <li>
                        <a href="user_acc.php"> <i class="menu-icon fa fa-user"></i>Các tài khoản của người dùng

                        </a>
                    </li>
                    <li>
                        <a href="old_exam_results.php"> <i class="menu-icon fa fa-list"></i>Kết quả

                        </a>
                    </li>
                   
                    <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-close"></i>Đăng xuất </a>
                    </li>
                </ul>



            </div>
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">

                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle"
                                src="images\Picsart_23-03-30_10-18-14-850.png" alt="User Avatar">
                        </a>

                    </div>



                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->