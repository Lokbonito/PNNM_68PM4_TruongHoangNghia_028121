<?php

class Middleware
{
    public function checkLogin()
    {
        $publicPages = [
            '/PNNM_68PM4_TruongHoangNghia_028121/public/auth/login',
            '/PNNM_68PM4_TruongHoangNghia_028121/public/auth/index'
        ];

        $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (
            !isset($_SESSION['username']) &&
            !in_array($currentUrl, $publicPages)
        ) {
            header(
                'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/auth/login'
            );
            exit();
        }
    }
}