<?php
include "tafel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nummer = $_POST["nummer"];
    $omschrijving = $_POST["omschrijving"];

    $myDb = new DB("restaurant");
    $tafel = new Tafel($myDb);

    try {
        $result = $tafel->insertTafel($nummer, $omschrijving);

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
    <title>Insert tafel</title>
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
    
    <h2>Insert tafel</h2>
    <form action="insert-tafel.php" method="POST">
        <label for="nummer">nummer:</label>
        <input type="text" name="nummer" required>
        <br>
        <label for="omschrijving">omschrijving</label>
        <input type="text" name="omschrijving" required>
        <br>
        <input type="submit" value="Insert tafel">
    </form>
</body>
</html>
