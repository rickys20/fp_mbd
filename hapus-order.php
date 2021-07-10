<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $o_id = $_GET['id'];

    // buat query hapus
    pg_query("BEGIN") or die("Failed\n");
    $pgsql = "DELETE FROM orders WHERE order_id=$o_id";
    $query = pg_query($dbcon, $pgsql);

    // apakah query hapus berhasil?
    if( $query ){
        pg_query("COMMIT") or die("Gagal\n");
        header('Location: order.php');
    } else {
        die("gagal menghapus...");
        pg_query("ROLLBACK") or die("Query gagal\n");
    }

} else {
    die("akses dilarang...");
}

?>