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

        public function add($name, $description, $price_old, $price_new, $quantity, $image_src, $category_id, $status) {
            try {
                $sql = "INSERT INTO product(name,image_src,price_old,price_new,description,quantity,status,category_id ) values('$name','$image_src','$price_old','$price_new','$description','$quantity','$category_id','$status')";
                pdo_execute($sql);
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }
    }
?>