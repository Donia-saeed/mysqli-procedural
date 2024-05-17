<?php

include 'connection.php'; // for calling get_connection()
$conn = get_connection();

$create_users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";

mysqli_query($conn, $create_users_table);



$create_categories_table = "CREATE TABLE IF NOT EXISTS categories (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
)";

mysqli_query($conn, $create_categories_table);




$create_products_table = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description  TEXT,
    price  FLOAT NOT NULL ,
    image VARCHAR(255),
    category_id int(11) UNSIGNED,
   FOREIGN KEY ( category_id) REFERENCES  categories(id) ON DELETE CASCADE
)";

mysqli_query($conn,$create_products_table);

// insert default user to users table 
$username = 'admin';
$email = 'admin@admin.com';
$password = password_hash('123456', PASSWORD_DEFAULT);

$check_user = "SELECT * from users where email = '$email' ";
$result = mysqli_query($conn, $check_user);

if(mysqli_num_rows($result) == 0){
   $insert_user = "INSERT INTO users (username , email , password) values ('$username', '$email', '$password')";
   mysqli_query($conn, $insert_user);
   echo "user created";

}