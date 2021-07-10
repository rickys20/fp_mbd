<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['reorder'])){

    // ambil data dari formulir
    $id = $_POST['product_id'];
    $quantity= $_POST['quantity'];


    $pgsql = "CALL reorder_product($id,$quantity)";
    $query = pg_query($dbcon, $pgsql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: product.php');
        pg_query("COMMIT") or die("Gagal\n");
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        pg_query("ROLLBACK") or die("Query gagal\n");
    }


} else {
    die("Akses dilarang...");
}

?>