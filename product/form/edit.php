<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Checkout form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">
<?php
require_once '../../db.php';
$stmt = $dbh->prepare('select * from product 
    where id=:id');
$stmt->execute(['id' => $_GET['id']]);
$product = $stmt->fetchObject();
?>
    <form method="POST" action="save.php?id=<?=$_GET['id']?>" class="col-md-12">
      
      <div class="form-group col-12">
        <label>ชื่อสินค้า:</label>
        <input name="name" class="form-control" value="<?=$product->name?>">
      </div>
      
      <div class="row col-12">
        <div class="form-group col-6">
          <label>จำนวน:</label>
          <input name="amount" class="form-control" value="<?=$product->amount?>">
        </div>
        
        <div class="form-group col-6">
          <label>ราคา:</label>
          <input name="price" class="form-control" value="<?=$product->price?>">
        </div>
      </div>
      
      <div class="form-group col-6">
        <label>วันที่:</label>
        <input name="date" class="form-control" value="<?=$product->date?>">
      </div>
      
      <br>
      <div class="form-group col-12">
        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        <a href="../index.php" class="btn btn-default">ย้อนกลับ</a>
      </div>
    </form>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
</html>
