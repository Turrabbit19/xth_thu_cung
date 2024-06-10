<?php
    // Khai báo môi trường, các biến dùng chung cho toàn bộ hệ thống
    // Khai báo dạng hằng số

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'xth_thu_cung');

    define('BASE_URL', 'http://localhost/xth-thu-cung/');
    define('BASE_URL_IMG', 'http://localhost/xth-thu-cung/img/san-pham/');

    function redirect($key = "",$msg = "",$url ="") {
        $_SESSION[$key] = $msg;
        switch ($key) {
            case "errors":
                unset($_SESSION['success']);
                break;
            case "success":
                unset($_SESSION['errors']);
                break;
        }
        header('location: ' . BASE_URL . $url."?msg=".$key);die;
    }
?>