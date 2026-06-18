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
        <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/create">
            Thêm lớp học
        </a>
    </p>

    <table>

        <tr>
            <th>ID</th>
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($lophocs as $lophoc): ?>

            <tr>
                <td><?= $lophoc['id'] ?></td>
                <td><?= $lophoc['MaLop'] ?></td>
                <td><?= $lophoc['TenLop'] ?></td>

                <td>

                    <a href="/PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/edit/<?= $lophoc['id'] ?>">
                        Sửa
                    </a>

                    |

                    <a
                        href="/PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/destroy/<?= $lophoc['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')">
                        Xóa
                    </a>

                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>