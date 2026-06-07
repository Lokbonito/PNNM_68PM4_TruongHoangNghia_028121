<?php

session_start();

require_once __DIR__ . '/../app/middleware/Middleware.php';

$middleware = new Middleware();
$middleware->checkLogin();

require_once __DIR__ . '/../app/core/App.php';

new App();
