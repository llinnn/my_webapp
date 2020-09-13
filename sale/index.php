<?php
require_once '../db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <link href="sale.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/product/index.php">
              Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/sale/index.php">
              Sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Summary</h1>
        <a href="./form/index.php" class="btn btn-success">ขายสินค้า</a>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รายการสินค้า</th>
              <th>จำนวนคงเหลือ</th>
              <th>จำนวนขาย</th>
              <th>รวมเป็นเงิน</th>
            </tr>
          </thead>
          <tbody>
<?php
$sumSTMT = $dbh->prepare('select
product.name as name,
product.amount as amount,
sum(sale.amount) as sale_amount,
sum(sale.summary_price) as sale_summary_price
from product left outer join sale on (sale.product_id = product.id)
group by product.name
');
$sumSTMT->execute();
$sum = $sumSTMT->fetchAll();
$summaryPrice=0;
foreach($sum as $sumData) {
  $summaryPrice = $summaryPrice +$sumData['sale_summary_price'];
  echo "<tr>
  <td>{$sumData['name']}</td>
  <td>{$sumData['amount']}</td>
  <td>{$sumData['sale_amount']}</td>
  <td>{$sumData['sale_summary_price']}</td>
</tr>";
} 
?>
          </tbody>
          <tfoot>
            <td colspan="1" class="text-center">รวมเป็นเงิน</td>
            <td class="text-right"><?php echo $summaryPrice ?></td>
            <td></td>
          </tfoot>
        </table>
      </div>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sales</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>รายการสินค้า</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>วันที่</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
<?php
$saleSTMT = $dbh->prepare('select
      product.name as name, sale.amount as amount,
      sale.unit_price as unit_price, sale.date as date
  from sale join product on sale.product_id = product.id
');
$saleSTMT->execute();
$sales = $saleSTMT->fetchAll();
foreach($sales as $sale) {
           echo "<tr>
              <td>{$sale['name']}</td>
              <td>{$sale['amount']}</td>
              <td>{$sale['unit_price']}</td>
              <td>{$sale['date']}</td>
            </tr>";
}
?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
</html>
