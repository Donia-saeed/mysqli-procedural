<?php
require_once '../database/connection.php';

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header('Location: product.php');
    exit();
}

$product_id = $_GET['id'];
$conn = get_connection();
$query = "DELETE FROM products WHERE id='$product_id'";
$result = mysqli_query($conn, $query);
if ($result) {
    // Redirect to product page after successful deletion
    header('Location: product.php');
    exit();
} 
?>
