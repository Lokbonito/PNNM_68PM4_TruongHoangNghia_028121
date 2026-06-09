<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>

<h1>Thêm sinh viên</h1>

<form
    action="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/store"
    method="POST"
>

    <p>
        MSSV
        <br>
        <input
            type="text"
            name="MSSV"
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
            required
        >
    </p>

    <br>

    <button type="submit">
        Lưu
    </button>

</form>

</body>
</html>