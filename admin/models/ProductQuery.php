<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        public function all() {
            try {
                $sql = "SELECT * FROM product";
                $data = $this->pdo->query($sql)->fetchAll();
                $listPro = [];
                foreach ($data as $row) {
                    // Chuyển đổi dữ liệu -> object Product
                    $listPro[] = convertToObjProduct($row);
                }
                return $listPro;
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }
    }
?>