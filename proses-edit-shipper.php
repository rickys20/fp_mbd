<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $sid= $_POST['shipper_id'];
    $name= $_POST['company_name'];
    $phone= $_POST['phone'];

    // buat query update
    pg_query("BEGIN") or die("Failed\n");
    $pgsql = "UPDATE shippers SET company_name='$name', phone='$phone' WHERE shipper_id=$sid";
    $query = pg_query($dbcon, $pgsql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: shippers.php');
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