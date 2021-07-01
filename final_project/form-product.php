<?php include ('config.php'); 
$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='fp_mbd'");
$query = "SELECT * FROM categories";
$result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());

// output result
 while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
 echo "Id: " . $line['category_id'] . "    Judul: " . $line['category_name'] . "<br/>";
 }

 // free result
 pg_free_result($result);

 // close connection
 pg_close($dbcon);?>

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
</body>

