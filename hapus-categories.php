<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $c_id = $_GET['id'];

    // buat query hapus
    $pgsql = "DELETE FROM categories WHERE category_id=$c_id";
    $query = pg_query($dbcon, $pgsql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: categories.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>