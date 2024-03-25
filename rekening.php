<?php

include "../db.php";

class Rekening {
    private $dbh;
    private $table = "rekening";

    public function __construct(DB $dbh){
        $this->dbh = $dbh;
    }

    public function insertRekening(String $btw, int $totaalprijs) {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$btw, $totaalprijs]);
    }

    public function updateRekening(String $btw, int $totaalprijs, int $rekening_id) {
        return $this->dbh->execute("UPDATE $this->table SET btw = ?, totaalprijs = ? WHERE rekening_id = ?", [$btw, $totaalprijs, $rekening_id]);
    }

    public function deleteRekening($rekening_id) {
        return $this->dbh->execute("DELETE FROM $this->table WHERE rekening_id = ?", [$rekening_id]);
    }

    public function getAllRekening(int $id = null) {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneRekening(int $rekening_id) {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE rekening_id = ?", [$rekening_id]);
    }

    public function selectAllRekening() {
        return $this->dbh->execute("SELECT * FROM rekening");
    }

    public function selectOneRekening($rekening_id) {
        return $this->dbh->execute("SELECT * FROM rekening WHERE rekening_id = ?", [$rekening_id]);
    }
}
?>
