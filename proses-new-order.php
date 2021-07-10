<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
	
	//ambil data formulir
	$cust_id = $_POST['cust_id'];
	$emp_id = $_POST['emp_id'];
	$req_date = $_POST['req_date'];
	$ship_via = $_POST['ship_via'];
	$freight = $_POST['freight'];
	$ship_name = $_POST['ship_name'];
    $ship_address = $_POST['ship_address'];
	$ship_city = $_POST['ship_city'];
	$ship_region = $_POST['ship_region'];
	$postal_code = $_POST['postal_code'];
	$ship_country = $_POST['ship_country'];
	
	
	//query
	pg_query("BEGIN") or die("Failed\n");
    $query = "INSERT INTO orders(customer_id,employee_id,required_date,ship_via,freight,ship_name,ship_address,ship_city,ship_region,ship_postal_code,ship_country)
	 VALUES ('$cust_id', '$emp_id', '$req_date','$ship_via','$freight','$ship_name','$ship_address','$ship_city','$ship_region','$postal_code','$ship_country')";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: new-order-details.php?status=sukses');
		// header('Location: order.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");
	}

	pg_close($dbcon);	
?>