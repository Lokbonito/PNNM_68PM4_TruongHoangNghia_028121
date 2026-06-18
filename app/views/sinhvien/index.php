<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <body>
        <h1><?= $title ?></h1>

        <p>
            <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/create">
                Thêm sinh viên
            </a>
        </p>

        <br>

        <form method="GET">

            <input
                type="text"
                name="keyword"
                placeholder="Tìm MSSV hoặc Họ tên"
                value="<?= $keyword ?? '' ?>">

            <select name="MaLop">

                <option value="">
                    -- Tất cả lớp --
                </option>

                <?php foreach ($lophocs as $lop): ?>

                    <option
                        value="<?= $lop['MaLop'] ?>"
                        <?= ($MaLop == $lop['MaLop']) ? 'selected' : '' ?>>
                        <?= $lop['TenLop'] ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <select name="sort">

                <option value="MSSV"
                    <?= ($sort == 'MSSV') ? 'selected' : '' ?>>
                    MSSV
                </option>

                <option value="HoTen"
                    <?= ($sort == 'HoTen') ? 'selected' : '' ?>>
                    Họ tên
                </option>

            </select>

            <select name="order">

                <option value="ASC"
                    <?= ($order == 'ASC') ? 'selected' : '' ?>>
                    Tăng dần
                </option>

                <option value="DESC"
                    <?= ($order == 'DESC') ? 'selected' : '' ?>>
                    Giảm dần
                </option>

            </select>

            <button type="submit">
                Tìm kiếm
            </button>

            <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/index">
                Reset
            </a>

        </form>

        <br>

        <table>
            <tr>
                <th>STT</th>
                <th>MSSV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Mã Lớp</th>
                <th>Thao Tác</th>
            </tr>

            <?php foreach ($sinhviens as $index => $sinhvien): ?>
                <tr>
                    <td><?= $index + 1 ?></td>

                    <td><?= $sinhvien['MSSV'] ?></td>

                    <td><?= $sinhvien['HoTen'] ?></td>

                    <td><?= $sinhvien['GioiTinh'] ?></td>

                    <td><?= $sinhvien['MaLop'] ?></td>

                    <td class="action">

                        <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/edit/<?= $sinhvien['id'] ?>">
                            Sửa
                        </a>

                        <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/destroy/<?= $sinhvien['id'] ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                            Xóa
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?php if (isset($totalPages) && $totalPages > 1): ?>

            <div class="pagination">

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                    <a
                        class="<?= ($i == $page) ? 'active' : '' ?>"
                        href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/index?page=<?= $i ?>">

                        <?= $i ?>

                    </a>

                <?php endfor; ?>

            </div>

        <?php endif; ?>

    </body>


</html>