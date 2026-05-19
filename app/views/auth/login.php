<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

    <h2>Đăng nhập</h2>

    <?php if (isset($_SESSION['error'])) : ?>

        <p>
            <?= $_SESSION['error']; ?>
        </p>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>

    <form method="POST">

        <div>
            <label>Username:</label>
            <input
                type="text"
                name="username"
                required
            >
        </div>

        <br>

        <div>
            <label>Password:</label>
            <input
                type="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">
            Đăng nhập
        </button>

    </form>

</body>
</html>