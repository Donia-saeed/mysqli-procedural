<?php
// Include database connection
require_once 'database/connection.php';
session_start();
$errors = [];

is_login();
function is_login()
{
    if (isset($_SESSION['user'])) {
        header('Location: product/product.php');
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = trim(htmlspecialchars(htmlentities($_POST['username'])));
    $email = trim(htmlspecialchars(htmlentities($_POST['email'])));
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (empty($email) || empty($password)) {
        header('Location: register.php');
    } else {
        $conn = get_connection();
        $sql = "INSERT INTO users (username , email , password) values ('$username', '$email', '$hashed_password')";
        $result = mysqli_query($conn, $sql);
        header('Location: login.php');
    }
}
