<?php
require_once __DIR__ . '/../middleware/Middleware.php';

class Auth
{
    protected $users = [
        'admin' => '123456',
        'user1' => 'password1',
        'user2' => 'password2',
    ];

    public function index()
    {
        $this->login();
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (
                isset($this->users[$username]) &&
                $this->users[$username] === $password
            ) {

                $_SESSION['username'] = $username;

                header(
                    'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/home/index'
                );
                exit();
            }

            $_SESSION['error'] =
                'Sai tài khoản hoặc mật khẩu';

            header(
                'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/auth/login'
            );
            exit();
        }

        require_once '../app/views/auth/login.php';
    }

    public function logout()
    {
        session_destroy();

        header(
            'Location: /PNNM_68PM4_TruongHoangNghia_028121/public/auth/login'
        );

        exit();
    }
}
