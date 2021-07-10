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
          <div class="card-header bg-transparent mb-0"><h5 class="text-center">Silahkan Order</h5></div>
          <div class="card-body">
                <form method="POST" action="proses-new-order.php">
                   <div class="form-group">
                    <label>CUSTOMER ID: </label>
                     <input type="text" name="cust_id" class="form-control" placeholder="customer id" required="required">
                   </div>
                   <div class="form-group" >
                     <label>EMPLOYEE ID: </label>
                     <input type="text" name="emp_id" class="form-control" placeholder="employee id" required="required">
                  </div>
                   <div class="form-group">
                    <label>REQUIRED DATE: </label>
                     <input type="text" name="req_date" class="form-control" placeholder="YYYY-MM-DD" required="required">
                   </div>
                   <div class="form-group">
                    <label>SHIPPED DATE: </label>
                     <input type="text" name="shipped_date" class="form-control" placeholder="YYYY-MM-DD" required="required">
                   </div>
                   <div class="form-group">
                    <label>SHIP VIA: </label>
                     <input type="text" name="ship_via" class="form-control" placeholder="ship via number" required="required">
                   </div><div class="form-group">
                    <label>FREIGHT: </label>
                     <input type="text" name="freight" class="form-control" placeholder="XX.XX" required="required">
                   </div><div class="form-group">
                    <label>SHIP NAME: </label>
                     <input type="text" name="ship_name" class="form-control" placeholder="ship name" required="required">
                   </div>
                   <div class="form-group">
                    <label>SHIP ADDRESS: </label>
                     <input type="text" name="ship_address" class="form-control" placeholder="address" required="required">
                   </div><div class="form-group">
                    <label>SHIP CITY: </label>
                     <input type="text" name="ship_city" class="form-control" placeholder="city" required="required">
                   </div><div class="form-group">
                    <label>SHIP REGION: </label>
                     <input type="text" name="ship_region" class="form-control" placeholder="region" required="required">
                   </div>
                   <div class="form-group">
                    <label>SHIP POSTAL CODE: </label>
                     <input type="text" name="postal_code" class="form-control" placeholder="postal code" required="required">
                   </div>
                   <div class="form-group">
                    <label>SHIP COUNTRY: </label>
                     <input type="text" name="ship_country" class="form-control" placeholder="country" required="required">
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

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <form action="index.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
            <div class="form-group">
            <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

