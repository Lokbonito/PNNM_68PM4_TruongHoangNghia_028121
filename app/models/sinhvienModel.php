<?php

require_once __DIR__ . '/../core/DB.php';

class sinhvienModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhVien()
    {
        $query = "SELECT * FROM sinhvien";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $query = "SELECT COUNT(*) FROM sinhvien";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function getPaginated($limit, $offset)
    {
        $query = "
            SELECT *
            FROM sinhvien
            LIMIT :limit
            OFFSET :offset
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(
            ':limit',
            (int)$limit,
            PDO::PARAM_INT
        );

        $stmt->bindValue(
            ':offset',
            (int)$offset,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        $MSSV,
        $HoTen,
        $GioiTinh
    )
    {
        $query = "
            INSERT INTO sinhvien
            (
                MSSV,
                HoTen,
                GioiTinh
            )
            VALUES
            (
                :MSSV,
                :HoTen,
                :GioiTinh
            )
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':MSSV', $MSSV);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);

        return $stmt->execute();
    }
}