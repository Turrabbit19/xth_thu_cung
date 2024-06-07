<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        public function top8ProductLatest() {
            try {
                $sql = "SELECT * FROM product order by id DESC LIMIT 8";
                $data = $this->pdo->query($sql)->fetchAll();
                $listPro = [];
                foreach ($data as $row) {
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