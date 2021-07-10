<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
	
	//ambil data formulir
	$name = $_POST['company_name'];
	$phone = $_POST['phone'];
	
	//query
	pg_query("BEGIN") or die("Failed\n");
    $query = "INSERT INTO shippers (company_name, phone) VALUES ('$name', '$phone')";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: shippers.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");
	}

	pg_close($dbcon);	
?>