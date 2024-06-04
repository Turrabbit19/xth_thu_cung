<?php
    // 1. Nhúng tất cả các file cần dùng vào đây
    // File commons
    require_once "../commons/env.php";
    require_once "../commons/functions.php";

    // Controllers
    require_once "controllers/ProductController.php";

    // Models
    require_once "models/Product.php";
    require_once "models/ProductQuery.php";

    // Người dùng hệ thống tương tác website bằng URL
    // ==> tham số act trên URL để hệ thống phân biệt mong muốn người dùng muốn truy cập tới
    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";

    // Kiểm tra giá trị act để gọi phương thức tương ứng trong Controllers
    // Có thể dùng switch-case
    include "views/component/header.php";
    include "views/component/sidebar.php";
    match($act) {
        '' => (new ProductController()) -> list(),
        'list-pro' => (new ProductController()) -> list()
    };
    include "views/component/footer.php";
?>