<?php

require_once __DIR__ . '/../core/DB.php';

class lophocModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM lophoc";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = "SELECT * FROM lophoc WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($MaLop, $TenLop)
    {
        $query = "
            INSERT INTO lophoc
            (
                MaLop,
                TenLop
            )
            VALUES
            (
                :MaLop,
                :TenLop
            )
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':MaLop', $MaLop);
        $stmt->bindParam(':TenLop', $TenLop);

        return $stmt->execute();
    }

    public function update($id, $MaLop, $TenLop)
    {
        $query = "
            UPDATE lophoc
            SET
                MaLop = :MaLop,
                TenLop = :TenLop
            WHERE id = :id
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':MaLop', $MaLop);
        $stmt->bindParam(':TenLop', $TenLop);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM lophoc WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}