<?php 

$host = "localhost"; 
$user = "postgres"; 
$pass = "Koki12001"; 
$db = "coba"; 

$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

pg_query("BEGIN") or die("Could not start transaction\n");
$order_id = $_POST['order_id'];
$query = "DELETE FROM orders WHERE order_id=$order_id";
$result = pg_query($query); 	

if ($query) {
    header('Location: order.php?status=sukses');
    pg_query("COMMIT") or die("Gagal Hapus\n");
} else {
    echo "Rolling back\n";
    pg_query("ROLLBACK") or die("Gagal\n");;
}

pg_close($con); 

?>