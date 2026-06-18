<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm lớp học</title>
</head>

<body>

    <h1>Thêm lớp học</h1>

    <form
        action="/PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/store"
        method="POST">

        <p>
            Mã lớp
            <br>
            <input
                type="text"
                name="MaLop"
                required>
        </p>

        <br>

        <p>
            Tên lớp
            <br>
            <input
                type="text"
                name="TenLop"
                required>
        </p>

        <br>

        <button type="submit">
            Lưu
        </button>

    </form>

</body>

</html>