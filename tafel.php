<?php

include "../db.php";

class Tafel {
    private $dbh;
    private $table = "tafel";

    public function __construct(DB $dbh){
        $this->dbh = $dbh;
    }

    public function insertTafel(String $nummer, string $omschrijving) {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$nummer, $omschrijving]);
    }

    public function updateTafel(String $nummer, string $omschrijving, int $tafel_id) {
        return $this->dbh->execute("UPDATE $this->table SET nummer = ?, omschrijving = ? WHERE tafel_id = ?", [$nummer, $omschrijving, $tafel_id]);
    }

    public function deleteTafel($tafel_id) {
        return $this->dbh->execute("DELETE FROM $this->table WHERE tafel_id = ?", [$tafel_id]);
    }

    public function getAllTafel(int $id = null) {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneTafel(int $tafel_id) {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE tafel_id = ?", [$tafel_id]);
    }

    public function selectAllTafel() {
        return $this->dbh->execute("SELECT * FROM tafel");
    }

    public function selectOneTafel($tafel_id) {
        return $this->dbh->execute("SELECT * FROM tafel WHERE tafel_id = ?", [$tafel_id]);
    }
}
?>
