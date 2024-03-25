<?php
include "product.php";

$product = new Product($myDb);

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $product_details = $product->getOneProduct($product_id)->fetch();
} else {
    header("Location: view-product.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST["product_naam"];
    $product_prijs = $_POST["product_prijs"];
    
    $product->updateProduct($product_naam, $product_prijs, $product_id);
    
    header("Location: view-product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

    <h1>Edit Product</h1>

    <form method="post">
        <label for="product_naam">Product Name:</label><br>
        <input type="text" id="product_naam" name="product_naam" value="<?php echo $product_details['product_naam']; ?>"><br>
        <label for="product_prijs">Product Price:</label><br>
        <input type="number" id="product_prijs" name="product_prijs" value="<?php echo $product_details['product_prijs']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>
