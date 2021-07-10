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
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="container">
          <div class="row justify-content-left mt-5">
            <div class="col-md-2">
              <form action="index.php"><!--lalu, fungsi di sebelah ini akan membawa kita ke laman register-->
                  <div class="form-group">
                  <input type="submit" name="back menu" value="BACK" class="btn btn-primary btn-block">
                  </div>
              </form>
            </div>
          </div>
        </div>
        <div class="container">
          <h1 class="display-4" align="center">ORDERS</h1>
        </div>
        
        <div class="container">
          <div class="row justify-content-left mt-0">
            <div class="col-md-11">

              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for order id.." title="Type in a name">
              <table style="width:100%">

              <?php
                $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
                $query = "SELECT * FROM orders ORDER BY order_id";
                $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());


                echo '<table id="myTable" class="table" width="15%" cellspacing="0">
                <tr class="header">
                <th style="width:10%;">ORDER ID</th>
                <th style="width:20%;">CUSTOMER ID</th>
                <th style="width:60%;">EMPLOYEE ID</th>
                <th style="width:20%;">ORDER DATE</th>
                <th style="width:20%;">REQUIRED DATE</th>
                <th style="width:10%;">SHIPPED DATE</th>
                <th style="width:20%;">SHIP VIA</th>
                <th style="width:60%;">FREIGHT</th>
                <th style="width:20%;">SHIP NAME</th>
                <th style="width:20%;">SHIP ADDRESS</th>
                <th style="width:20%;">SHIP CITY</th>
                <th style="width:60%;">SHIP REGION</th>
                <th style="width:20%;">SHIP POSTAL CODE</th>
                <th style="width:20%;">SHIP COUNTRY</th>
                <th style="width:20%;">FITUR</th>
                </tr>';

                  while($pg = pg_fetch_array($result)){
                      echo "<tr>";

                      echo "<td>".$pg['order_id']."</td>";
                      echo "<td>".$pg['customer_id']."</td>";
                      echo "<td>".$pg['employee_id']."</td>";
                      echo "<td>".$pg['order_date']."</td>";
                      echo "<td>".$pg['required_date']."</td>";
                      echo "<td>".$pg['shipped_date']."</td>";
                      echo "<td>".$pg['ship_via']."</td>";
                      echo "<td>".$pg['freight']."</td>";
                      echo "<td>".$pg['ship_name']."</td>";
                      echo "<td>".$pg['ship_address']."</td>";
                      echo "<td>".$pg['ship_city']."</td>";
                      echo "<td>".$pg['ship_region']."</td>";
                      echo "<td>".$pg['ship_postal_code']."</td>";
                      echo "<td>".$pg['ship_country']."</td>";

                      echo "<td>";
                      echo "<a href='form-edit-order.php?id=".$pg['order_id']."'>Edit</a> | ";
                      echo "<a href='hapus-order.php?id=".$pg['order_id']."'>Hapus</a> |";
                      echo "<a href='total-harga.php?id=".$pg['order_id']."'>Total Harga</a>";
                      echo "</td>";

                      echo "</tr>";
                  }
                  ?>
            </div>
          </div>
        </div>
    </div>
</div>
</body>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    // input1 = document.getElementById("myInputC");
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      // td = tr[i].getElementsByTagName("td")[1];
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>

</html>