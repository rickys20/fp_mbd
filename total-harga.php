<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>NORTHWIND Shop</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url('./css/1.jpg');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 30px 30px;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

    /* #myInputC {
      background-image: url('./css/1.jpg');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 30px 30px;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    } */

    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 11px;
    }

    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
    </style>
</head>

<body>
    <div class="container">
          <div class="row justify-content-left mt-5">
            <div class="col-md-2">
              <form action="order.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
                  <div class="form-group">
                  <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
                  </div>
              </form>
            </div>
          </div>
        </div>
    <div class="card-header bg-transparent mb-0"><h5 class="text-center">Total Harga</h5></div>
      <div class="card-body">
         
        <?php
          $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
          $o_id= $_GET['id'];
          $query = "SELECT * FROM total_harga($o_id)";
          $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());
                
          $pg = pg_fetch_array($result);
          echo "<p align='center'>".$pg['total_harga']."</p>";
        ?>
      </div>
    </div>   
</body>
