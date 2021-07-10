<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>NORTHWIND Shop</title>
</head>

<body>
  <!--lalu saya menggunakan jumbotron untuk memberi desain untuk judul laman-->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" align="center">NORTHWIND SHOP</h1>
      <p class="lead" align="center">Selamat Datang di NORTHWIND Shop, Silahkan Order untuk Memesan Product dan Melihat Product pada Menu Product</p>
      <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-transparent mb-0"><h5 class="text-center">Silahkan Mengisi Order Detail</h5></div>
          <div class="card-body">
                <form method="POST" action="proses-new-order-detail.php">
                   <div class="form-group" >
                     <label>PRODUCT ID: </label>
                     <input type="text" name="product_id" class="form-control" placeholder="product id" required="required">
                  </div>
                   <div class="form-group">
                    <label>UNIT PRICE: </label>
                     <input type="text" name="unit_price" class="form-control" placeholder="unit_price" required="required">
                   </div>
                   <div class="form-group">
                    <label>Quantity: </label>
                     <input type="text" name="quantity" class="form-control" placeholder="quantity" required="required">
                   </div>
                   <div class="form-group">
                    <label>DISCOUNT: </label>
                     <input type="text" name="discount" class="form-control" placeholder="xx.xx" required="required">
                   </div>
                   <div class="form-group">
                      <input type="submit" name="confirm" class="btn btn-primary btn-block" value="CONFIRM">
                   </div>
                   <div class="form-group">
                      <input type="submit" name="order_lagi" class="btn btn-primary btn-block" value="ORDER AGAIN">
                   </div>
                  </form>

          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <form action="new-order.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
            <div class="form-group">
            <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

