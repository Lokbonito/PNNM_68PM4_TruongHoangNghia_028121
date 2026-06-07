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
}
