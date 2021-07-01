

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Taqarra Shop</title>
</head>

<body>
  <!--lalu saya menggunakan jumbotron untuk memberi desain untuk judul laman-->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" align="center">TAQARRA SHOP</h1>
      <p class="lead" align="center">Selamat Datang di Taqarra Shop, Silahkan Order untuk Memesan Product dan Melihat Product pada Menu Product</p>
      
    </div>
  </div>
  
  <?php ; 
    $dbcon = pg_connect("host='localhost' user='postgres' password='1kingtiger' dbname='FPMBD`'"); // ganti passaword dsiinii
    $query = "SELECT * FROM products";
    $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());
    
    // echo '
    // <table id="employee_grid" class="table" width="100%" cellspacing="0">
    //   <tr>
    //     <th>Month</th>
    //     <th>Savings</th>
    //   </tr>
    //   <tr>
    //     <td>January</td>
    //     <td>$100</td>
    //   </tr>
    
    // </table>
   
    // ';
    echo '<table id="product" class="table" width="100%" cellspacing="0">
          <tr>
              <td>ID produk</td>
              <td>Nama Produk</td>
              <td>ID Supplier</td>
              <td>ID category</td>
              <td> quantity per unit</td>
              <td> unit price </td>
              <td> units in stock </td>
              <td> units on order </td>
              <td> reorder level </td>
              <td> discontinued </td>
              
          </tr>';
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                echo("<tr>");
                foreach ($line as $col_value => $row_value) {
                    echo("<td>$row_value</td>");
                }
                echo("</tr>\n");
            }
            echo("</table>");
    // output result
    // while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    // echo "Id: " . $line['product_id'] . "    Produk: " . $line['product_name'] . "<br/>";
    // }

    // free result
    pg_free_result($result);

    // close connection
    pg_close($dbcon);
    ?>
</body>

