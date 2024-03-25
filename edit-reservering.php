<?php

include "reservering.php";

$reservering_id = $_GET['id'];

$reservering = new Reservering($myDb);
$reserveringData = $reservering->getOneReservering($reservering_id)->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $begintijd = $_POST['begintijd'];
    $eindtijd = $_POST['eindtijd'];

    $reservering->updateReservering($begintijd, $eindtijd, $reservering_id);

    header("Location: view-reservering.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
</head>
<body>
    <h1>Edit Reservation</h1>
    <form method="post">
        <label for="begintijd">Start Time:</label><br>
        <input type="text" id="begintijd" name="begintijd" value="<?php echo $reserveringData['begintijd']; ?>"><br>
        <label for="eindtijd">End Time:</label><br>
        <input type="text" id="eindtijd" name="eindtijd" value="<?php echo $reserveringData['eindtijd']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
