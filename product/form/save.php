<?php
require_once '../../db.php';
try {
    if (empty($_GET['id'])) {
        $dbh->prepare('insert into product set
        name=:name, amount=:amount, price=:price,
        date=:date')->execute([
            'name' => $_POST['name'],
            'amount' => $_POST['amount'],
            'price' => $_POST['price'],
            'date' => $_POST['date'],
        ]);
    } else {
        $dbh->prepare('update product set
        name=:name, amount=:amount, price=:price,
        date=:date where id=:id')->execute([
            'name' => $_POST['name'],
            'amount' => $_POST['amount'],
            'price' => $_POST['price'],
            'date' => $_POST['date'],
            'id' => $_GET['id'],
        ]);
    }
    header('location: /product/index.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>