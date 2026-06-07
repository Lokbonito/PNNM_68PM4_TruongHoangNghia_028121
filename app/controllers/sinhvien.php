<?php

require_once __DIR__ . '/../core/Controller.php';

class sinhvien extends Controller
{
    public function index()
    {
        $sinhVienModel = $this->model('sinhvienModel');

        $sinhviens = $sinhVienModel->getAllSinhVien();
        
        $this->view(
            'sinhvien/index',
            [
                'title' => 'Danh sách sinh viên',
                'sinhviens' => $sinhviens
            ]
        );
    }

    public function create()
    {
        $this->view('sinhvien/create');
    }

    public function store()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $MSSV = $_POST['MSSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->create($MSSV, $HoTen, $GioiTinh);
            if ($result) {
                header("Location: /sinhvien/index");
                exit();
            } else {
                echo "Đã xảy ra lỗi khi tạo sinh viên.";
                exit();
            }
        }
    }
}
