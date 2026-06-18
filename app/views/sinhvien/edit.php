<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>

<h1><?= $title ?></h1>

<form
    action="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/update/<?= $sinhvien['id'] ?>"
    method="POST"
>

    <p>
        MSSV
        <br>
        <input
            type="text"
            name="MSSV"
            value="<?= $sinhvien['MSSV'] ?>"
            required
        >
    </p>

    <br>

    <p>
        Họ tên
        <br>
        <input
            type="text"
            name="HoTen"
            value="<?= $sinhvien['HoTen'] ?>"
            required
        >
    </p>

    <br>

    <p>
        Giới tính
        <br>
        <input
            type="text"
            name="GioiTinh"
            value="<?= $sinhvien['GioiTinh'] ?>"
            required
        >
    </p>

    <br>

    <button type="submit">
        Cập nhật
    </button>

</form>

</body>
</html>