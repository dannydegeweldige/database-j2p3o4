<?php

class DB {
    private $dbh; //dit is de verbinding met de database
    protected $stmt; //dit is het huidige statement

    public function __construct($db, $host = "localhost:3307", $user = "root", $pass = "") {
        try {
            $this->dbh = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("connection error: " . $e->getMessage());
        }
    }

    public function execute($sql, $placeholders = null){
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }

    
}

$myDb = new DB("restaurant");
?>
