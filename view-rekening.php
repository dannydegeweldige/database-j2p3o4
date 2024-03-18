<?php

include "rekening.php";

$rekening = new Rekening($myDb);

$alles = $rekening->selectAllRekening()->fetchAll();

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

    <table>
        <tr>
            <th>id</th>
            <th>btw</th>
            <th>totaalprijs</th>
        </tr>
        <tr>
            <?php foreach ($alles as $rekening) {
                echo "<td>" . $rekening["rekening_id"] . "</td>";
                echo "<td>" . $rekening["btw"] . "</td>";
                echo "<td>" . $rekening["totaalprijs"] . "</td>";
                echo "<td><a href='edit-rekening.php?id=" . $rekening["rekening_id"] . "'>edit</a></td>";
            ?>
        </tr>
        <?php } ?>
    </table>
</body>
</html>