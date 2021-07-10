<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <title>NORTHWIND Shop</title>
     <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
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
  <!--lalu saya menggunakan jumbotron untuk memberi desain untuk judul laman-->
  <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row justify-content-left mt-2">
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
      <h1 class="display-4" align="center">PRODUCTS</h1>
      <p>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <table style="width:100%">
            <?php 
            $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
            $query = "SELECT * FROM Products";
            $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());

            // output result
            echo '<table id="Products" class="table" width="100%" cellspacing="0">
            <tr>
              <td>ID</td>
              <td>Product </td>
              <td>Supplier ID</td>
              <td>Category ID</td>
              <td>Quantity per unit</td>
              <td>unit price</td>
              <td>unit in stock</td>
              <td>reoder level</td>
              <td>discontinued</td>
              
              
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

  


  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    // input1 = document.getElementById("myInputC");
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("Products");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      // td = tr[i].getElementsByTagName("td")[1];
      td = tr[i].getElementsByTagName("td")[1];
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

</body>