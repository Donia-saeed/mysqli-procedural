<?php
require_once '../database/connection.php';

if (!isset($_GET['id'])) {
    header('Location: category.php');
    exit();
}

$category_id = $_GET['id'];
$conn = get_connection();
$query = "DELETE FROM categories WHERE id='$category_id'";
$result = mysqli_query($conn, $query);
if ($result) {
    header('Location: category.php');
    exit();
} 
?>
