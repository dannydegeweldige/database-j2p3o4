<?php
include "reservering.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $begintijd = $_POST["begintijd"];
    $eindtijd = $_POST["eindtijd"];

    $myDb = new DB("restaurant");
    $reservering = new Reservering($myDb);

    try {
        $result = $reservering->insertReservering($begintijd, $eindtijd);

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
    <title>Insert reservering</title>
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

    <h2>Insert reservering</h2>
    <form action="insert-reservering.php" method="POST">
        <label for="begintijd">begintijd:</label>
        <input type="time" name="begintijd" required>
        <br>
        <label for="eindtijd">eindtijd:</label>
        <input type="time" name="eindtijd" required>
        <br>
        <input type="submit" value="Insert reservering">
    </form>
</body>

</html>