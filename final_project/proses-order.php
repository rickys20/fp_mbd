<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='coba'");
	pg_query("BEGIN") or die("Could not start transaction\n");

	//ambil data formulir
	$order_id = $_POST['order_id'];
	$cust_id = $_POST['cust_id'];
	$emp_id = $_POST['emp_id'];
	$order_date = $_POST['order_date'];
	$req_date = $_POST['req_date'];
	$shipped_date = $_POST['shipped_date'];
	$ship_via = $_POST['ship_via'];
	$frieght = $_POST['frieght'];
	$ship_name = $_POST['ship_name'];
    $ship_address = $_POST['ship_address'];
	$ship_city = $_POST['ship_city'];
	$ship_region = $_POST['ship_region'];
	$postal_code = $_POST['postal_code'];
	$ship_country = $_POST['ship_country'];
	
	
	//query
    $query = "INSERT INTO orders VALUES ('$order_id', '$cust_id', '$emp_id', '$order_date','$req_date','$shipped_date','$ship_via','$frieght','$ship_name','$ship_address','$ship_city','$ship_region','$postal_code','$ship_country')";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: order.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");;
	}

	pg_close($dbcon);	
?>