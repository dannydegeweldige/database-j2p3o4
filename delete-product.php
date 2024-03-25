<?php

include "product.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $product = new Product($myDb);
    $deleted = $product->deleteProduct($product_id);
    if ($deleted) {
        header("Location: view-product.php");
        exit();
    } else {
        echo "Failed to delete product.";
    }
} else {
    echo "Product ID not provided.";
}
?>
