<?php
$dns="mysql:host=db;dbname=web;charset=utf8";
$username="root";
$password="1234";

try {
    $dbh = new PDO($dns, $username, $password);
} catch (PDOException $e) {
    echo "DB ERROR: ".$e->getMessage();
}
?>