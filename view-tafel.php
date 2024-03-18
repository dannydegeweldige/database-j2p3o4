<?php

include "tafel.php";

$tafel = new Tafel($myDb);

$alles = $tafel->selectAllTafel()->fetchAll();

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

    <h1>overzicht tafels</h1>

    <table>
        <tr>
            <th>id</th>
            <th>nummer</th>
            <th>Omschrijving</th>
        </tr>
        <tr>
            <?php foreach ($alles as $tafel) {
                echo "<td>" . $tafel["tafel_id"] . "</td>";
                echo "<td>" . $tafel["nummer"] . "</td>";
                echo "<td>" . $tafel["Omschrijving"] . "</td>";
                echo "<td><a href='edit-tafel.php?id=" . $tafel["tafel_id"] . "'>edit</a></td>";
                ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>