<?php
    // 1. Nhúng tất cả các file cần dùng vào đây
    // File commons
    require_once "../commons/env.php";
    require_once "../commons/functions.php";

    // Controllers
    require_once "controllers/IndexController.php";
    require_once "controllers/ProductController.php";
    require_once "controllers/CategoryController.php";
    require_once "controllers/AccountController.php";
    require_once "controllers/BillController.php";

    // Models
    require_once "models/Product.php";
    require_once "models/ProductQuery.php";
    require_once "models/Category.php";
    require_once "models/CategoryQuery.php";
    require_once "models/Account.php";
    require_once "models/AccountQuery.php";
    require_once "models/Bill.php";
    require_once "models/BillQuery.php";

    // Người dùng hệ thống tương tác website bằng URL
    // ==> tham số act trên URL để hệ thống phân biệt mong muốn người dùng muốn truy cập tới
    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";

    // Kiểm tra giá trị act để gọi phương thức tương ứng trong Controllers
    // Có thể dùng switch-case
    include "views/component/header.php";
    include "views/component/sidebar.php";

    try {
        match($act) {
            '' => (new IndexController()) -> home(),
            'list-pro' => (new ProductController()) -> list(),
            
            'list-cgr' => (new CategoryController()) -> list(),

            'list-acc' => (new AccountController()) -> list(),

            'list-bill' => (new BillController()) -> list(),
        };
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    include "views/component/footer.php";
?>