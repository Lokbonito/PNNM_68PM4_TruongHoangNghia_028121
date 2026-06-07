<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Website Sinh Viên'; ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header,
        footer {
            padding: 15px;
            background: #343a40;
            color: white;
        }

        footer {
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <?php require_once __DIR__ . '/partial/header.php'; ?>
    </header>

    <main class="container">

        <?php require_once __DIR__ . '/../' . $viewname . '.php'; ?>
    </main>

    <footer>
        <?php require_once __DIR__ . '/partial/footer.php'; ?>
    </footer>

</body>

</html>