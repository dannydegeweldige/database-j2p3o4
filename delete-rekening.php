<?php
include "rekening.php";

if (isset($_GET['id'])) {
    $rekening_id = $_GET['id'];
    $rekening = new Rekening($myDb);
    $deleted = $rekening->deleteRekening($rekening_id);
    if ($deleted) {
        header("Location: view-rekening.php");
        exit();
    } else {
        echo "Failed to delete rekening.";
    }
} else {
    echo "Rekening ID not provided.";
}
?>
