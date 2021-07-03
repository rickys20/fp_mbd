<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Taqarra Shop</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>

<body>
  <!--lalu saya menggunakan jumbotron untuk memberi desain untuk judul laman-->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" align="center">ORDERS</h1>
      <p class="lead" align="center">Menampilkan Data ORDERS</p>
      <p>
        <table style="width:100%">
            <?php 
            $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='coba'");
            $query = "SELECT * FROM orders";
            $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());

            // output result
            echo '<table id="Order" class="table" width="30%" cellspacing="0">
            <tr>
              <td>ORDER_ID</td>
              <td>CUSTOMER_ID</td>
              <td>EMPLOYEE_ID</td>
              <td>ORDER_DATE</td>
              <td>REQUIRED DATE</td>
              <td>SHIPPED DATE</td>
              <td>SHIP VIA</td>
              <td>FRIEGHT</td>
              <td>SHIP NAME</td>
              <td>SHIP ADDRESS</td>
              <td>SHIP CITY</td>
              <td>SHIP REGION</td>
              <td>SHIP POSTAL CODE</td>
              <td>SHIP COUNTRY</td>
            </tr>';
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {  
                echo("<tr>");
                foreach ($line as $col_value => $row_value) {
                    echo("<td>$row_value</td>");
                }
                echo("</tr>\n");
            }
            echo("</table>");

            // free result
            pg_free_result($result);

            // close connection
            pg_close($dbcon);?>
        
       </p>    
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <form action="form-view.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
            <div class="form-group">
            <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
