<?php
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'market');
function get_connection()
{
    // // DATABASE IF NOT EXISTS
    // $conn = mysqli_connect(servername, username, password);
    // $sql = 'CREATE DATABASE IF NOT EXISTS ' . dbname;
    // mysqli_query($conn, $sql);
    // mysqli_close($conn);
    // // end DATABASE IF NOT EXISTS

    $conn = mysqli_connect(servername, username, password, dbname);
    return $conn;
}
