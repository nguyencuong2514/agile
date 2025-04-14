<?php
require_once('../models/category.php');

class CategoryAdminController extends Category
{
    public function index()
    {
        $listCategories = $this->listCategory();
        include "../views/admin/category/list.php";
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createCategory'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors['name'] = "Vui lòng nhập tên danh mục";
            }

            if (empty($_POST['status'])) {
                $errors['status'] = "Vui lòng chọn trạng thái";
            }

            if (empty($_POST['description'])) {
                $errors['description'] = "Vui lòng nhập mô tả";
            }

            // Kiểm tra ảnh
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $errors['image'] = "Vui lòng chọn hình ảnh";
            } else {
                $file = $_FILES['image'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

                $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $fileMimeType = mime_content_type($file['tmp_name']);

                if (!in_array($fileExtension, $allowedExtensions) || !in_array($fileMimeType, $allowedMimeTypes)) {
                    $errors['image'] = "File phải là ảnh hợp lệ (JPG, PNG, GIF, WEBP)";
                } else {
                    $image = $file['name'];
                    if (!move_uploaded_file($file['tmp_name'], './images/category/' . $image)) {
                        $errors['image'] = "Không thể tải ảnh lên";
                    }
                }
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $createCategory = $this->create($_POST['name'], $image, $_POST['status'], $_POST['description']);
                if ($createCategory) {
                    $_SESSION['success'] = 'Thêm danh mục thành công';
                    header('location: index.php?act=category');
                    exit();
                } else {
                    $_SESSION['error'] = "Thêm danh mục thất bại";
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }

        include "../views/admin/category/create.php";
    }


    public function editCategory($id)
    {
        $getCategory = $this->detail($id);
        if (!$getCategory) {
            $_SESSION['error'] = "Không tìm thấy danh mục";
            header('Location: index.php?act=category');
            exit();
        }
        include "../views/admin/category/edit.php";
    }


    public function updateCategory($id)
    {
        $getCategory = $this->detail($id);


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCategory'])) {
            $errors = [];


            $name = $_POST['name'] ?? '';
            $status = $_POST['status'] ?? '';
            $description = $_POST['description'] ?? '';
            $image = $getCategory['image'];

            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên danh mục";
            }

            if (empty($status)) {
                $errors['status'] = "Vui lòng chọn trạng thái";
            }

            if (empty($description)) {
                $errors['description'] = "Vui lòng nhập mô tả";
            }

            // Kiểm tra ảnh
            if (!empty($_FILES['image']['name'])) {
                $file = $_FILES['image'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

                $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $fileMimeType = mime_content_type($file['tmp_name']);

                if (!in_array($fileExtension, $allowedExtensions) || !in_array($fileMimeType, $allowedMimeTypes)) {
                    $errors['image'] = "File phải là ảnh hợp lệ (JPG, PNG, GIF, WEBP)";
                } else {
                    $image = $file['name'];
                    if (!move_uploaded_file($file['tmp_name'], './images/category/' . $image)) {
                        $errors['image'] = "Không thể tải ảnh lên";
                    }
                }
            }
            if (empty($errors)) {
                $updated = $this->update($id, $name, $image, $status, $description);
                if ($updated) {
                    $_SESSION['success'] = 'Cập nhật danh mục thành công';
                    header('Location: index.php?act=category');
                    exit();
                } else {
                    $_SESSION['error'] = 'Cập nhật danh mục thất bại';
                }
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
        include "../views/admin/category/edit.php";
    }

    public function deleteCategory()
    {
        try {


            $this->delete($_GET['id']);
            $_SESSION['success'] = 'Xoa danh mục thành công';
            header('Location: index.php?act=category');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Xoa danh mục that bai';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
