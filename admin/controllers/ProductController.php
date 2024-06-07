<?php
class ProductController {
    public $productQuery;
    public $categoryQuery;

    public function __construct() {
        $this->productQuery = new ProductQuery();
        $this->categoryQuery = new CategoryQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $listPro = $this->productQuery->all();
        include "views/product/list.php";
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price_old = $_POST['price_old'] ?? '';
            $price_new = $_POST['price_new'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $status = $_POST['status'] ?? '';

            if (isset($_FILES['image_src']) && $_FILES['image_src']['error'] == 0) {
                $target_dir = "img/san-pham/";

                $target_file = $target_dir . basename($_FILES['image_src']['name']);
                if (!move_uploaded_file($_FILES['image_src']['tmp_name'], $target_file)) {
                    echo "Không thể tải ảnh lên.";
                    return;
                }
                $image_src = $target_file;
            } else {
                echo "Ảnh là bắt buộc.";
                return;
            }

            try {
                $this->productQuery->add($name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status);
                echo "Thêm sản phẩm thành công!";
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        } 

        $listCgr = $this->categoryQuery->all();
        include "views/product/add.php";
    }
}
?>
