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

    <h1><?= $title ?></h1>

    <p>
        Tổng số sinh viên:
        <?= $total ?>
    </p>

    <p>
        <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/create">
            Thêm sinh viên
        </a>
    </p>

    <table>

        <tr>
            <th>ID</th>
            <th>MSSV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($sinhviens as $sinhvien): ?>

            <tr>
                <td><?= $sinhvien['id'] ?></td>
                <td><?= $sinhvien['MSSV'] ?></td>
                <td><?= $sinhvien['HoTen'] ?></td>
                <td><?= $sinhvien['GioiTinh'] ?></td>
                <td>
                    <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/edit/<?php echo $sinhvien['id']; ?>">
                        Sửa
                    </a>

                    <a
                        href="/PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/destroy/<?php echo $sinhvien['id']; ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')">
                        Xóa
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

    <br>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>

        <a href="?page=<?= $i ?>">
            <?= $i ?>
        </a>

    <?php endfor; ?>

</body>

</html>