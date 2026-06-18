<?php

require_once __DIR__ . '/../core/Controller.php';

class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('sinhvienModel');

        $page = isset($_GET['page'])
            ? (int)$_GET['page']
            : 1;

        if ($page < 1) {
            $page = 1;
        }

        $limit = 5;

        $offset = ($page - 1) * $limit;

        $total = $sinhvienModel->countAll();

        $sinhviens = $sinhvienModel->getPaginated(
            $limit,
            $offset
        );

        $totalPages = ceil($total / $limit);

        $this->view(
            'sinhvien/index',
            [
                'title' => 'Danh sách sinh viên',
                'sinhviens' => $sinhviens,
                'page' => $page,
                'limit' => $limit,
                'offset' => $offset,
                'total' => $total,
                'totalPages' => $totalPages
            ]
        );
    }

    public function create()
    {
        $lophocModel = $this->model('lophocModel');

        $lophocs = $lophocModel->getAll();

        $this->view(
            'sinhvien/create',
            [
                'title' => 'Thêm sinh viên',
                'lophocs' => $lophocs
            ]
        );
    }

    public function edit($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocModel = $this->model('lophocModel');

        $sinhvien = $sinhvienModel->findById($id);

        $lophocs = $lophocModel->getAll();

        $this->view(
            'sinhvien/edit',
            [
                'title' => 'Cập nhật sinh viên',
                'sinhvien' => $sinhvien,
                'lophocs' => $lophocs
            ]
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MSSV = $_POST['MSSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $MaLop = $_POST['MaLop'];

            $sinhvienModel = $this->model('sinhvienModel');

            $result = $sinhvienModel->create(
                $MSSV,
                $HoTen,
                $GioiTinh,
                $MaLop
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

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MSSV = $_POST['MSSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $MaLop = $_POST['MaLop'];

            $sinhvienModel = $this->model('sinhvienModel');

            $result = $sinhvienModel->update(
                $id,
                $MSSV,
                $HoTen,
                $GioiTinh,
                $MaLop
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

    public function destroy($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');

        $result = $sinhvienModel->delete($id);

        if ($result) {

            header(
                "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/sinhvien/index"
            );

            exit();
        }

        echo "Xóa thất bại";
    }
}