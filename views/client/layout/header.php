<!DOCTYPE html>
<html lang="en">
<?php
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null; ?>
<!-- Mirrored from swiftcart-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:44:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../public/client/assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../public/client/assets/img/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/client/assets/img/favicons/favicon-16x16.png" />
    <link rel="manifest" href="../public/client/assets/img/favicons/site.webmanifest" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Public+Sans:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">

    <!-- Package Css link -->
    <link rel="stylesheet" href="../public/client/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/meanmenu/css/meanmenu.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/swiftcart-icons/style.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/owl-carousel/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/glightbox/css/glightbox.min.css" />
    <link rel="stylesheet" href="../public/client/assets/vendors/spacing/spacing.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="../public/client/assets/css/swiftcart.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="../public/client/assets/css/swiftcart.css" />

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
    <div class="xc-preloader">
        <div class="xc-preloader__image">
            <img src="../public/client/assets/img/preloader/preloader.png" alt="preloader">
        </div>
    </div>

    <!-- /.preloader -->

    <div class="xc-page-wrapper">

        <header>
            <div class="xc-header-one bg-black" id="xc-header-sticky">
                <div class="container">
                    <div class="xc-header-one__wrapper">
                        <div class="xc-header-one__logo">
                            <a href="index.php?act=index">
                                <h3 class="text-light">Royal</h3>
                            </a>
                        </div>
                        <div class="xc-header-one__right">
                            <div class="xc-header-one__search d-none d-xl-block">
                                <form action="index.php?act=searchresult" method="post">
                                    <input type="search" placeholder="Tìm kiếm tại đây..." name="keyword" required>
                                    <button type="submit" name="search">Tìm kiếm</button>
                                </form>

                            </div>
                            <div class="xc-header-one__btns d-none d-lg-flex">

                                <a href="?act=cart" class="xc-header-one__btn">
                                    <i class="icon-grocery-store"></i>Giỏ hàng
                                </a>
                                <!-- <a href="index.php?act=login" class="xc-header-one__btn">
                                    <i class="icon-user"></i>Đăng nhập
                                </a> -->
                                <!-- <?php if ($role == 0) { ?>
                                <a href="index.php?act=admin" class="xc-header-one__btn">
                                    <i class="icon-user"></i>Admin
                                </a>
                                <?php } ?> -->

                                <?php if (!isset($_SESSION['user'])): ?>
                                    <a href="index.php?act=login" class="xc-header-one__btn">
                                        <i class="icon-user"></i>Đăng nhập
                                    </a>
                                <?php else: ?>
                                    <a href="index.php?act=profile" class="xc-header-one__btn">
                                        <i class="icon-user"></i>
                                        <span>Xin chào <?= $_SESSION['user']['name'] ?></span>
                                    </a>
                                <?php endif; ?>
                                <!-- mobile drawer  -->
                                <div class="xc-header-one__hamburger d-xl-none">
                                    <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                                        <i class="icon-menu"></i>Nav Bar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- mobile drawer  -->
                        <div class="xc-header-one__hamburger d-lg-none">
                            <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                                <i class="icon-menu"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xc-header-one__bottom d-none d-lg-block">
                <div class="container">
                    <div class="xc-header-one__bottom-wrapper">
                        <div class="xc-header-one__bottom-left">
                            <div class="xc-header-one__cat">
                            </div>
                            <div class="xc-header-one__menu xc-main-menu">
                                <nav id="mobile-menu">
                                    <ul class="ul-0">
                                        <li class="">
                                            <a href="?act=index">Trang chủ</a>
                                        </li>
                                        <li><a href="#">About</a></li>
                                        <li class="has-dropdown"><a href="">Sản phẩm</a>
                                            <ul class="submenu">
                                                <!-- <li><a href="shop.html">Shop</a> -->
                                                <li><a href="index.php?act=all-products">Tất cả sản phẩm</a></li>
                                                <li><a href="?act=cart">Đơn hàng</a></li>
                                                <li><a href="?act=checkout">Đặt hàng</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="has-dropdown">
                                            <a href="blog-list.html">Blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog-grid.html">Blog Grid</a>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="blog-list.html">Blog List</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog-list-no-sidebar.html">No Sidebar</a></li>
                                                        <li><a href="blog-list.html">Right Sidebar</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-details.html">Blog Details</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <li>
                                            <a href="#">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="xc-header-one__bottom-right">
                            <div class="xc-header-one__lang">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>