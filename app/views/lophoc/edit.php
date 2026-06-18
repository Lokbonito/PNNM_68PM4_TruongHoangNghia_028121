<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>

    <h1><?= $title ?></h1>

    <form
        action="/PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/update/<?= $lophoc['id'] ?>"
        method="POST">

        <p>
            Mã lớp
            <br>
            <input
                type="text"
                name="MaLop"
                value="<?= $lophoc['MaLop'] ?>"
                required>
        </p>

        <br>

        <p>
            Tên lớp
            <br>
            <input
                type="text"
                name="TenLop"
                value="<?= $lophoc['TenLop'] ?>"
                required>
        </p>

        <br>

        <button type="submit">
            Cập nhật
        </button>

    </form>

</body>

</html>