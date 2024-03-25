<?php

include "tafel.php";

if (isset($_GET['id'])) {
    $tafel_id = $_GET['id'];
    $tafel = new Tafel($myDb);
    $deleted = $tafel->deleteTafel($tafel_id);
    if ($deleted) {
        header("Location: view-tafel.php");
        exit();
    } else {
        echo "Failed to delete table.";
    }
} else {
    echo "Table ID not provided.";
}
?>
