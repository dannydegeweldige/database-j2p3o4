<?php

include "../db.php";

class product {
    private $dbh;
    private $table = "products";

    public function __construct(DB $dbh){
        $this->dbh = $dbh;
    }

    public function insertProduct(String $product_naam, int $product_prijs) {
        return $this->dbh->execute("INSERT INTO $this->table VALUES (null, ?, ?)", [$product_naam, $product_prijs]);
    }

    public function updateProduct(String $product_naam, int $product_prijs, int $product_id) {
        return $this->dbh->execute("UPDATE $this->table SET product_naam = ?, product_prijs = ? WHERE product_id = ?", [$product_naam, $product_prijs, $product_id]);
    }

    public function deleteProduct($product_id) {
        return $this->dbh->execute("DELETE FROM $this->table WHERE product_id = ?", [$product_id]);
    }

    public function getAllProduct(int $id = null) {
        return $this->dbh->execute("SELECT * FROM $this->table");
    }

    public function getOneProduct(int $product_id) {
        return $this->dbh->execute("SELECT * FROM $this->table WHERE product_id = ?", [$product_id]);
    }

    public function selectAllProduct() {
        return $this->dbh->execute("SELECT * FROM products");
    }

    public function selectOneProduct($product_id) {
        return $this->dbh->execute("SELECT * FROM products WHERE product_id = ?", [$product_id]);
    }
}
?>
