<?php

include "rekening.php";

$myDb = new DB("restaurant");
$rekening = new Rekening($myDb);

if (isset($_GET['id'])) {
    $rekening_id = $_GET['id'];
    $rekening_details = $rekening->getOneRekening($rekening_id)->fetch();
} else {
    header("Location: view-rekening.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $btw = $_POST["btw"];
    $totaalprijs = $_POST["totaalprijs"];

    $rekening->updateRekening($btw, $totaalprijs, $rekening_id);

    header("Location: view-rekening.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rekening</title>
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

    <h2>Edit Rekening</h2>

    <form action="edit-rekening.php?id=<?php echo $rekening_id; ?>" method="POST">
        <label for="btw">BTW:</label>
        <input type="text" name="btw" value="<?php echo $rekening_details['btw']; ?>" required>
        <br>
        <label for="totaalprijs">Totaalprijs:</label>
        <input type="number" name="totaalprijs" value="<?php echo $rekening_details['totaalprijs']; ?>" required>
        <br>
        <input type="submit" value="Update Rekening">
    </form>

</body>

</html>
