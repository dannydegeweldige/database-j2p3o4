<?php

include "reservering.php";

if (isset($_GET['id'])) {
    $reservering_id = $_GET['id'];
    $reservering = new Reservering($myDb);
    $deleted = $reservering->deleteReservering($reservering_id);
    if ($deleted) {
        header("Location: view-reservering.php");
        exit();
    } else {
        echo "Failed to delete reservation.";
    }
} else {
    echo "Reservation ID not provided.";
}
?>
