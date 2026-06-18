<?php

require_once __DIR__ . '/../core/Controller.php';

class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocModel = $this->model('lophocModel');

        $keyword = $_GET['keyword'] ?? '';
        $MaLop = $_GET['MaLop'] ?? '';

        $sort = $_GET['sort'] ?? 'MSSV';
        $order = $_GET['order'] ?? 'ASC';

        $sinhviens = $sinhvienModel->filter(
            $keyword,
            $MaLop,
            $sort,
            $order
        );

        $lophocs = $lophocModel->getAll();

        $this->view(
            'sinhvien/index',
            [
                'title' => 'Danh sách sinh viên',
                'sinhviens' => $sinhviens,
                'lophocs' => $lophocs,
                'keyword' => $keyword,
                'MaLop' => $MaLop,
                'sort' => $sort,
                'order' => $order
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
