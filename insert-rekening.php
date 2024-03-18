<?php
include "rekening.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $btw = $_POST["btw"];
    $totaalprijs = $_POST["totaalprijs"];

    $myDb = new DB("restaurant");
    $rekening = new Rekening($myDb);

    try {
        $result = $rekening->insertrekening($btw, $totaalprijs);

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
    <title>Insert rekening</title>
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
    
    <h2>Insert rekening</h2>
    <form action="insert-rekening.php" method="POST">
        <label for="btw">btw:</label>
        <input type="text" name="btw" required>
        <br>
        <label for="totaalprijs">totaalprijs:</label>
        <input type="number" name="totaalprijs" required>
        <br>
        <input type="submit" value="Insert rekening">
    </form>
</body>

</html>