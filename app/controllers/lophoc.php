<?php

require_once __DIR__ . '/../core/Controller.php';

class lophoc extends Controller
{
    public function index()
    {
        $lophocModel = $this->model('lophocModel');

        $lophocs = $lophocModel->getAll();

        $this->view(
            'lophoc/index',
            [
                'title' => 'Danh sách lớp học',
                'lophocs' => $lophocs
            ]
        );
    }

    public function create()
    {
        $this->view(
            'lophoc/create',
            [
                'title' => 'Thêm lớp học'
            ]
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MaLop = $_POST['MaLop'];
            $TenLop = $_POST['TenLop'];

            $lophocModel = $this->model('lophocModel');

            $result = $lophocModel->create(
                $MaLop,
                $TenLop
            );

            if ($result) {

                header(
                    "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/index"
                );

                exit();
            }

            echo "Thêm lớp học thất bại";
        }
    }

    public function edit($id)
    {
        $lophocModel = $this->model('lophocModel');

        $lophoc = $lophocModel->findById($id);

        $this->view(
            'lophoc/edit',
            [
                'title' => 'Cập nhật lớp học',
                'lophoc' => $lophoc
            ]
        );
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $MaLop = $_POST['MaLop'];
            $TenLop = $_POST['TenLop'];

            $lophocModel = $this->model('lophocModel');

            $result = $lophocModel->update(
                $id,
                $MaLop,
                $TenLop
            );

            if ($result) {

                header(
                    "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/index"
                );

                exit();
            }

            echo "Cập nhật thất bại";
        }
    }

    public function destroy($id)
    {
        $lophocModel = $this->model('lophocModel');

        $result = $lophocModel->delete($id);

        if ($result) {

            header(
                "Location: /PNNM_68PM4_TruongHoangNghia_028121/public/lophoc/index"
            );

            exit();
        }

        echo "Xóa thất bại";
    }
}