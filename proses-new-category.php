<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
	

	//ambil data formulir
	$name = $_POST['c_name'];
	$desc = $_POST['desc'];
	$pict = $_POST['pict'];
	
	//query
	pg_query("BEGIN") or die("Failed\n");
    $query = "INSERT INTO categories (category_name, description, picture) VALUES ('$name', '$desc', '$pict' )";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: categories.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");
	}

	pg_close($dbcon);	
?>