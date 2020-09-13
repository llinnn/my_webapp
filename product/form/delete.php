<?php
require_once '../../db.php';

try {
    $dbh->prepare('delete from product where id=:id')
        ->execute(['id' => $_GET['id']]);
    header('location: /product/index.php');
} catch (PDOException $e) {
    echo 'DELETE ERROR: '.$e->getMessage();
}
?>