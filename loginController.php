<?php
// Include database connection
require_once 'database/connection.php';
session_start();
is_login();
function is_login()
{
    if (isset($_SESSION['user'])) {
        header('Location: product/product.php');
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate user input
    if (empty($email) || empty($password)) {
        $errors['all'] = 'Email and password are required';
    } else {
        $conn = get_connection();
        $sql = "SELECT * from users where email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows === 1) {
            $user = mysqli_fetch_assoc($result);
            print_r($user);
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set user session
                $_SESSION['user'] = $user;
                header('Location: product/product.php');
                exit();
            } else {
                $_SESSION['error']  = 'Invalid email or password';
            }
        } else {

            $_SESSION['error'] = 'Invalid email or password';
            header('Location: login.php');
            exit();
        }
        $conn->close();
    }
}

?>
