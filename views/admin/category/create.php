<?php
include "../views/admin/layout/header.php";
?>
<!-- Page Body start -->
<div class="page-body-wrapper">

    <div class="page-body">

        <!-- New Product Add Start -->
        <form action="index.php?act=category-create" method="post" enctype="multipart/form-data">
            <div class=" container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-8 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Thêm danh mục</h5>
                                        </div>

                                        <div class="thme-form theme-form-2 mega-form">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Tên danh mục</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="name"
                                                        placeholder="Nhập tên danh mục">
                                                    <?php if (isset($_SESSION['errors']['name'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Chọn ảnh</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control">
                                                    <?php if (isset($_SESSION['errors']['image'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['image'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="status"
                                                        aria-label="Default select example">
                                                        <option selected>Chọn trạng thái</option>
                                                        <option value="Active">Ẩn</option>
                                                        <option value="Hidden">Hiện</option>
                                                    </select>
                                                    <?php if (isset($_SESSION['errors']['status'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Mô tả</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control bg-light-subtle" name="description"
                                                        id="description" placeholder="Nhập mô tả"></textarea>
                                                    <?php if (isset($_SESSION['errors']['description'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            <div style="display: flex; margin-left: 440px;">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    name="createCategory">Thêm mới</button>
                                                <button type="submit" class="btn btn-outline-warning"><a
                                                        href="index.php?act=category">Quay lại</a></button>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- New Product Add End -->
                </div>
                <!-- Container-fluid End -->
            </div>
        </form>
        <!-- Page Body End -->
        <?php
        include "../views/admin/layout/footer.php";
        ?>