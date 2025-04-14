<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:16 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../public/admin/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../public/admin/assets/images/favicon.png" type="image/x-icon">
    <title>Royal - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="../public/admin/assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="../public/admin/assets//css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="../public/admin/assets//css/style.css">

    <!--  -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
        toastr.warning(\"{$_SESSION['error']}\")
        </script>";

        // Xóa session
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
        toastr.success(\"{$_SESSION['success']}\")
        </script>";

        // Xóa session
        unset($_SESSION['success']);
    }
    ?>

    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="./images/user/<?= ($_SESSION['user']['avatar']) ?>" alt="">
                                <div class="user-name-hide media-body">
                                    <span><?= $_SESSION['user']['name'] ?></span>
                                    <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href="javascript:void(0)">
                                        <i data-feather="log-out"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="index.html" data-bs-original-title="" title="">
                            <h2 class="text-light">Royal</h2>
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo main-white" src="../public/admin/assets//images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark" src="../public/admin/assets//images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="index.php?act=admin">
                                        <i class="ri-home-line"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Sản phẩm</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=product">Danh sách sản phẩm</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Danh mục</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=category">Danh sách danh mục</a>
                                        </li>

                                        <li>
                                            <a href="index.php?act=category-create">Add New Category</a>
                                        </li>
                                        <li>
                                            <a href="index.php?act=category-edit">Edit Category</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Người dùng</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=user">Danh sách người dùng</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Giảm giá</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="?act=coupon">danh sách giảm giá</a>
                                        </li>

                                        <li>
                                            <a href="?act=coupon-create">Tạo mới giảm giá</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="?act=order-list">Danh sách đơn hàng</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="right-arrow" id="right-arrow">
                                    <i data-fe ather="arrow-right"></i>
                                </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->