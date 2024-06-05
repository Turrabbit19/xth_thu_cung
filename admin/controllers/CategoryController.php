<?php
class CategoryController
{
    public $categoryQuery;

    public function __construct()
    {
        $this->categoryQuery = new CategoryQuery();
    }
    public function __destruct()
    {
    }

    public function list()
    {
        $listCgr = $this->categoryQuery->all();
        
        include "views/category/list.php";
    }
}
