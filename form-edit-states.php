<?php


$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: categories.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$pgsql = "SELECT * FROM us_states WHERE state_id=$id";
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
    <title>Formulir Edit Category</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Category</h3>
    </header>

    <form action="proses-edit-states.php" method="POST">

        <fieldset>

            <input type="hidden" name="s_id" value="<?php echo $pg['state_id'] ?>" />

        <p>
            <label for="s_name">State Name: </label>
            <input type="text" name="s_name" placeholder="state name" value="<?php echo $pg['state_name'] ?>" />
        </p>
        <p>
            <label for="s_abbr">State Abbr: </label>
            <input type="text" name="s_abbr" placeholder="State Abbr" value="<?php echo $pg['state_abbr'] ?>" />
        </p>
        <p>
            <label for="s_region">State Region: </label>
            <input type="text" name="s_region" placeholder="State Region" value="<?php echo $pg['state_region'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>
    </form>

    </body>
</html>