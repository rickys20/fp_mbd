<?php
    $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");
	
    if(isset($_POST['confirm'])){
	//ambil data formulir
	$p_id = $_POST['product_id'];
	$unit = $_POST['unit_price'];
	$qty = $_POST['quantity'];
    $disc = $_POST['discount'];
	
	//query
	pg_query("BEGIN") or die("Failed\n");
    $query = "INSERT INTO order_details (product_id, unit_price, quantity, discount) VALUES ('$p_id', '$unit', '$qty', '$disc' )";
	$result = pg_query($query); 	

	if ($query) {
		header('Location: order.php?status=sukses');
		pg_query("COMMIT") or die("Gagal\n");
	} else {
		echo "Gagal\n";
		pg_query("ROLLBACK") or die("Query gagal\n");
	}

	pg_close($dbcon);
    }else{
        $p_id = $_POST['product_id'];
        $unit = $_POST['unit_price'];
        $qty = $_POST['quantity'];
        $disc = $_POST['discount'];
        
        //query
        pg_query("BEGIN") or die("Failed\n");
        $query = "INSERT INTO order_details (product_id, unit_price, quantity, discount) VALUES ('$p_id', '$unit', '$qty', '$disc' )";
        $result = pg_query($query); 	

        if ($query) {
            header('Location: new-order-details.php?status=sukses');
            pg_query("COMMIT") or die("Gagal\n");
        } else {
            echo "Gagal\n";
            pg_query("ROLLBACK") or die("Query gagal\n");
        }

        pg_close($dbcon);
    }	
?>