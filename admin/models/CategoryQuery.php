<?php
class CategoryQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM category";
            $data = $this->pdo->query($sql)->fetchAll();
            $listCgr = [];
            foreach ($data as $row) {
                $listCgr[] = convertToObjCategory($row);
            }
            return $listCgr;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
}
