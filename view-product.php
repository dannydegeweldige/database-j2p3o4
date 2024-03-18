<?php

include "product.php";

$product = new Product($myDb);

$alles = $product->selectAllProduct()->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>overzicht producten</h1>
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

    <table>
        <tr>
            <th>id</th>
            <th>naam</th>
            <th>prijs</th>
        </tr>
        <tr>
            <?php foreach ($alles as $product) {
                echo "<td>" . $product["product_id"] . "</td>";
                echo "<td>" . $product["product_naam"] . "</td>";
                echo "<td>" . $product["product_prijs"] . "</td>";
                echo "<td><a href='edit-product.php?id=" . $product["product_id"] . "'>edit</a></td>";
                ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>