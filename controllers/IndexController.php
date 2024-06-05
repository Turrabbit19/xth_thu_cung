<?php
    class IndexController {
        public $productQuery;

        public function __construct() {
            $this->productQuery = new ProductQuery();
        }
        public function __destruct() {

        }

        public function home() {
            $listPro = $this->productQuery->all();
            include "views/home.php";
        }
    }
?>