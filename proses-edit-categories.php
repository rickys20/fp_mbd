<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $cid= $_POST['c_id'];
    $name= $_POST['c_name'];
    $desc= $_POST['desc'];

    // buat query update
    pg_query("BEGIN") or die("Failed\n");
    $pgsql = "UPDATE categories SET category_name='$name', description='$desc' WHERE category_id=$cid";
    $query = pg_query($dbcon, $pgsql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: categories.php');
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