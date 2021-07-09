<!DOCTYPE html>
<html lang="en">
<!--ini merupakan bagian head dari laman login, terdapat link link yg di copy dari bootstrap-->
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>NORTHWIND Shop</title>
</head>
<!--dan lalu ini bagian body atau tubuh laman login saya-->
<body>
  <!--lalu saya menggunakan jumbotron untuk memberi desain untuk judul laman-->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" align="center">NORTHWIND SHOP</h1>
      <p class="lead" align="center">Selamat Datang di NORTHWIND Shop, Silahkan Order untuk Memesan Product dan Melihat Product pada Menu Product</p>
    </div>
  </div>
  
    <!--lalu mulai dari bawah ini saya membuat form yang berfungsi sebagai tempat untuk mengisi username dan password-->
	<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-transparent mb-0"><h5 class="text-center">NORTHWIND SHOP</h5></div>
          <div class="card-body">
              
              <form action="form-order.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
              <div class="form-group">
                <input type="submit" name="order" value="ORDER" class="btn btn-primary btn-block">
              </div>
              </form>
              
              <form action="form-product.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
              <div class="form-group">
                <input type="submit" name="product" value="PRODUCT" class="btn btn-primary btn-block">
              </div>
              </form>

              <form action="menu-view.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
              <div class="form-group">
                <input type="submit" name="view" value="VIEW" class="btn btn-primary btn-block">
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
	</div>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>


