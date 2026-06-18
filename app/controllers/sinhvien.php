<?php

require_once __DIR__ . '/../core/Controller.php';

class sinhvien extends Controller
{
    public function index()
    {
        try {

            $sinhVienModel = $this->model('sinhvienModel');

            $page = isset($_GET['page'])
                ? (int)$_GET['page']
                : 1;

            if ($page < 1) {
                $page = 1;
            }

            $limit = 5;
            $offset = ($page - 1) * $limit;

            $total = $sinhVienModel->countAll();

            $sinhviens = $sinhVienModel->getPaginated(
                $limit,
                $offset
            );

            $totalPages = ceil($total / $limit);

            $this->view(
                'sinhvien/index',
                [
                    'title' => 'Danh sách sinh viên',
                    'sinhviens' => $sinhviens,
                    'total' => $total,
                    'page' => $page,
                    'totalPages' => $totalPages
                ]
            );
        } catch (Throwable $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function create()
    {
        $this->view(
            'sinhvien/create',
            [
                'title' => 'Thêm sinh viên'
            ]
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MSSV = trim($_POST['MSSV']);
            $HoTen = trim($_POST['HoTen']);
            $GioiTinh = trim($_POST['GioiTinh']);

            if (
                empty($MSSV) ||
                empty($HoTen) ||
                empty($GioiTinh)
            ) {

                die('Vui lòng nhập đầy đủ thông tin');
            }

            $sinhvienModel = $this->model('sinhvienModel');

            $result = $sinhvienModel->create(
                $MSSV,
                $HoTen,
                $GioiTinh
            );

            if ($result) {

                header(
                    "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/index"
                );

                exit();
            }

            echo "Thêm sinh viên thất bại";
        }
    }

    public function edit($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');

        $sinhvien = $sinhvienModel->findById($id);

        $this->view(
            'sinhvien/edit',
            [
                'title' => 'Cập nhật sinh viên',
                'sinhvien' => $sinhvien
            ]
        );
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MSSV = $_POST['MSSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];

            $sinhvienModel = $this->model('sinhvienModel');

            $result = $sinhvienModel->update(
                $id,
                $MSSV,
                $HoTen,
                $GioiTinh
            );

            if ($result) {

                header(
                    "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/index"
                );

                exit();
            }

            echo "Cập nhật thất bại";
        }
    }
}
