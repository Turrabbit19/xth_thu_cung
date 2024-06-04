<?php
    class ProductController {
        public $productQuery;

        public function __construct() {
            $this->productQuery = new ProductQuery();
        }
        public function __destruct() {

        }

        public function list() {
            // Gọi models lấy danh sách sản phẩm
            $listPro = $this->productQuery->all();
            // Hiển thị views tương ứng
            include "views/product/list.php";
        }
    }
?>