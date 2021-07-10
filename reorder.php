<?php


$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: categories.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$pgsql = "SELECT * FROM products WHERE product_id=$id";
$query = pg_query($dbcon, $pgsql);
$pg = pg_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( pg_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Reorder</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Reorder</h3>
    </header>

    <form action="proses-reorder.php" method="POST">

        <fieldset>

            <input type="hidden" name="product_id" value="<?php echo $pg['product_id'] ?>" />

        <p>
            <label for="quantity">Quantity: </label>
            <input type="text" name="quantity" placeholder="quantity" />
        </p>
        <p>
            <input type="submit" value="Reorder" name="reorder" />
        </p>

        </fieldset>
    </form>

    </body>
</html>