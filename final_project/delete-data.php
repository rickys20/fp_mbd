<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>NORTHWIND Shop</title>
</head>

<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" align="center">NORTHWIND SHOP</h1>
        <p class="lead" align="center">Selamat Datang di NORTHWIND Shop, Silahkan Order untuk Memesan Product dan Melihat Product pada Menu Product</p>
        <div class="container">
          <div class="row justify-content-left mt-0">
            <div class="col-md-2">
              <form action="order.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
                  <div class="form-group">
                  <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
                  </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-transparent mb-0"><h5 class="text-center">Masukkan ID yang akan Dihapus</h5></div>
                <div class="card-body">
                <form method="POST" action="proses-delete.php">
			        <div class="form-group" >
                     <label>Order ID: </label>
                     <input type="text" name="order_id" class="form-control" placeholder="order id" required="required">
                   </div>

                   <div class="form-group">
                      <input type="submit" name="order" class="btn btn-primary btn-block" value="ORDER">
                   </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
</body>