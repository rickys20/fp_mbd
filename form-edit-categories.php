<?php


$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: categories.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$pgsql = "SELECT * FROM categories WHERE category_id=$id";
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

    <form action="proses-edit-categories.php" method="POST">

        <fieldset>

            <input type="hidden" name="c_id" value="<?php echo $pg['category_id'] ?>" />

        <p>
            <label for="c_name">Category Name: </label>
            <input type="text" name="c_name" placeholder="category name" value="<?php echo $pg['category_name'] ?>" />
        </p>
        <p>
            <label for="desc">Description: </label>
            <input type="text" name="desc" placeholder="Description" value="<?php echo $pg['description'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>
    </form>

    </body>
</html>