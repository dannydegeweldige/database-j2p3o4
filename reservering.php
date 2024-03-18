<?php

include "../db.php";

class Reservering {
    private $dbh;
    private $table = "reservering";

    public function __construct(DB $dbh){
        $this->dbh = $dbh;
    }

    public function insertReservering(String $begintijd, string $eindtijd) {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$begintijd, $eindtijd]);
    }

    public function updateReservering(String $begintijd, string $eindtijd, int $reservering_id) {
        return $this->dbh->execute("UPDATE $this->table SET naam = ?, prijs = ? WHERE reserveringCode = ?", [$begintijd, $eindtijd, $reservering_id]);
    }

    public function deleteReservering($reservering_id) {
        return $this->dbh->execute("DELETE FROM $this->table WHERE reserveringCode = ?", [$reservering_id]);
    }

    public function getAllReservering(int $id = null) {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneReservering(int $reservering_id) {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE reserveringCode = ?", [$reservering_id]);
    }

    public function selectAllReservering() {
        return $this->dbh->execute("SELECT * FROM reservering");
    }

    public function selectOneReservering($reservering_id) {
        return $this->dbh->execute("SELECT * FROM reservering WHERE reserveringCode = ?", [$reservering_id]);
    }
}
?>
