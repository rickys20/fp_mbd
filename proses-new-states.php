<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
	

	//ambil data formulir
	$name = $_POST['s_name'];
	$s_abbr = $_POST['s_abbr'];
	$s_region = $_POST['s_region'];
	
	//query
	pg_query("BEGIN") or die("Failed\n");
    $query = "INSERT INTO us_states (state_name, state_abbr, state_region) VALUES ('$name', '$s_abbr', '$s_region' )";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: us-states.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");
	}

	pg_close($dbcon);	
?>