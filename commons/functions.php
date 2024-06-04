<?php
    function connectDB()
    {
        $host = DB_HOST;
        $dbName = DB_NAME;

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    function convertToObjProduct($row) {
        $product = new Product();
        $product->id = $row['id'];
        $product->name = $row['name'];
        $product->description = $row['description'];
        $product->price = $row['price'];
        $product->quantity = $row['quantity'];
        $product->image_src = $row['image_src'];
        $product->category_id = $row['category_id'];
        $product->status = $row['status'];
        return $product;
    }
?>