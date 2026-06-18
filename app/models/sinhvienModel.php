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
        $GioiTinh,
        $MaLop
    ) {
        $query = "
    INSERT INTO sinhvien
    (
        MSSV,
        HoTen,
        GioiTinh,
        MaLop
    )
    VALUES
    (
        :MSSV,
        :HoTen,
        :GioiTinh,
        :MaLop
    )
";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':MSSV', $MSSV);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':MaLop', $MaLop);
        return $stmt->execute();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM sinhvien WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $MSSV, $HoTen, $GioiTinh, $MaLop)
    {
        $query = "
        UPDATE sinhvien
        SET
            MSSV = :MSSV,
            HoTen = :HoTen,
            GioiTinh = :GioiTinh,
            MaLop = :MaLop
        WHERE id = :id
    ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':MSSV', $MSSV);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':MaLop', $MaLop);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM sinhvien WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function search($keyword = '', $MaLop = '')
    {
        $query = "
        SELECT *
        FROM sinhvien
        WHERE 1=1
    ";

        if (!empty($keyword)) {
            $query .= "
            AND (
                MSSV LIKE :keyword
                OR HoTen LIKE :keyword
            )
        ";
        }

        if (!empty($MaLop)) {
            $query .= "
            AND MaLop = :MaLop
        ";
        }

        $stmt = $this->conn->prepare($query);

        if (!empty($keyword)) {
            $searchKeyword = "%{$keyword}%";
            $stmt->bindParam(':keyword', $searchKeyword);
        }

        if (!empty($MaLop)) {
            $stmt->bindParam(':MaLop', $MaLop);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
