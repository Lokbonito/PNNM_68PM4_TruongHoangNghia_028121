<?php

require_once __DIR__ . '/../middleware/Middleware.php';


class home
{
    public function index()
    {
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function create()
    {
        echo "Đây là trang tạo mới Home";
    }
}
