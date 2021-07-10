<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id= $_POST['order_id'];
    $cust_id = $_POST['cust_id'];
    $employee_id = $_POST['employee_id'];
    $ship = $_POST['ship_country'];


    // buat query update
    pg_query("BEGIN") or die("Failed\n");
    $pgsql = "UPDATE orders SET customer_id='$cust_id', employee_id='$employee_id', ship_country='$ship' WHERE order_id=$id";
    $query = pg_query($dbcon, $pgsql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: order.php');
        pg_query("COMMIT") or die("Gagal\n");
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        pg_query("ROLLBACK") or die("Query gagal\n");;
    }


} else {
    die("Akses dilarang...");
}

?>