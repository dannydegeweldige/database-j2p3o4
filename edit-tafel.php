<?php

include "tafel.php";

$tafel = new Tafel($myDb);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $tafel_id = $_GET['id'];
    $tafelRecord = $tafel->getOneTafel($tafel_id)->fetch();

    if (!$tafelRecord) {
        echo "Tafel not found!";
        exit;
    }
} else {
    echo "Tafel ID is missing!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nummer = $_POST['nummer'];
    $Omschrijving = $_POST['Omschrijving'];

    $result = $tafel->updateTafel($nummer, $Omschrijving, $tafel_id);
    
    if ($result) {
        header("Location: view-tafel.php");
        exit;
    } else {
        echo "Failed to update tafel details!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tafel</title>
</head>

<body>
    <h1>Edit Tafel</h1>
    <form method="POST">
        <label for="nummer">Nummer:</label><br>
        <input type="text" id="nummer" name="nummer" value="<?php echo $tafelRecord['nummer']; ?>"><br>
        <label for="Omschrijving">Omschrijving:</label><br>
        <input type="text" id="Omschrijving" name="Omschrijving" value="<?php echo $tafelRecord['Omschrijving']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
