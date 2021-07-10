<?php


$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: categories.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$pgsql = "SELECT * FROM shippers WHERE shipper_id=$id";
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
    <title>Formulir Edit Shipper</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Shipper</h3>
    </header>

    <form action="proses-edit-shipper.php" method="POST">

        <fieldset>

            <input type="hidden" name="shipper_id" value="<?php echo $pg['shipper_id'] ?>" />

        <p>
            <label for="s_name">Company Name: </label>
            <input type="text" name="company_name" placeholder="company name" value="<?php echo $pg['company_name'] ?>" />
        </p>
        <p>
            <label for="s_abbr">Phone: </label>
            <input type="text" name="phone" placeholder="no.phone" value="<?php echo $pg['phone'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>
    </form>

    </body>
</html>