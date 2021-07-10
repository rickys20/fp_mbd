<?php


$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: order.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$pgsql = "SELECT * FROM orders WHERE order_id=$id";
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
    <title>Formulir Edit Order</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Order</h3>
    </header>

    <form action="proses-edit-order.php" method="POST">

        <fieldset>

            <input type="hidden" name="order_id" value="<?php echo $pg['order_id'] ?>" />

        <p>
            <label for="cust_id">Customers Id: </label>
            <input type="text" name="cust_id" placeholder="customer id" value="<?php echo $pg['customer_id'] ?>" />
        </p>
        <p>
            <label for="employee_id">Employee Id: </label>
            <input type="text" name="employee_id" placeholder="employee_id" value="<?php echo $pg['employee_id'] ?>"/>
        </p>
        <p>
            <label for="ship_country">Ship Country: </label>
            <input type="text" name="ship_country" placeholder="ship_country" value="<?php echo $pg['ship_country'] ?>"/>
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>
    </form>

    </body>
</html>