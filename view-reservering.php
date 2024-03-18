<?php

include "reservering.php";

$reservering = new Reservering($myDb);

$alles = $reservering->selectAllReservering()->fetchAll();

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

    <h1>overzicht reservering</h1>

    <table>
        <tr>
            <th>id</th>
            <th>begintijd</th>
            <th>eindtijd</th>
        </tr>
        <tr>
            <?php foreach ($alles as $reservering) {
                echo "<td>" . $reservering["reservering_id"] . "</td>";
                echo "<td>" . $reservering["begintijd"] . "</td>";
                echo "<td>" . $reservering["eindtijd"] . "</td>";
                echo "<td><a href='edit-reservering.php?id=" . $reservering["reservering_id"] . "'>edit</a></td>";
                ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>