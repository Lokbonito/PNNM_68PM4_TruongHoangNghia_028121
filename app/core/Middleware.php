<?php

class Middleware
{
    public static function auth()
    {
        if (!isset($_SESSION['username'])) {

            header(
                'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/auth/login'
            );

            exit();
        }
    }

    public static function guest()
    {
        if (isset($_SESSION['username'])) {

            header(
                'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/home/index'
            );

            exit();
        }
    }
}