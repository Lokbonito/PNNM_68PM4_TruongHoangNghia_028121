<?php

require_once '../app/core/Middleware.php';

class home
{
    public function __construct()
    {
        Middleware::auth();
    }

    public function index()
    {
        require_once '../app/views/home/index.php';
    }

    public function create()
    {
        echo "Đây là trang tạo mới Home";
    }
}

?>