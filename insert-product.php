<?php
include "product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_naam = $_POST["product_naam"];
    $product_prijs = $_POST["product_prijs"];

    $myDb = new DB("restaurant");
    $product = new Product($myDb);

    try {
        $result = $product->insertproduct($product_naam, $product_prijs);

        if ($result->rowCount() > 0) {
            echo "product inserted successfully!";
        } else {
            echo "Error inserting product.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
</head>

<body>

    <nav>
        <a href="../producten/insert-product.php">Insert product</a>
        <a href="../producten/view-product.php">View products</a>
        <a href="../rekening/insert-rekening.php">rekening</a>
        <a href="../rekening/view-rekening.php">View rekening</a>
        <a href="../reservering/insert-reservering.php">reservering</a>
        <a href="../reservering/view-reservering.php">view reservering</a>
        <a href="../tafel/insert-tafel.php">tafel</a>
        <a href="../tafel/view-tafel.php">view tafel</a>
    </nav>
    
    <h2>Insert product</h2>
    <form action="insert-product.php" method="POST">
        <label for="product_naam">Naam:</label>
        <input type="text" name="product_naam" required>
        <br>
        <label for="product_prijs">Prijs:</label>
        <input type="number" name="product_prijs" required>
        <br>
        <input type="submit" value="Insert product">
    </form>
</body>

</html>