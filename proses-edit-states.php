<?php

$dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='final'");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $sid= $_POST['s_id'];
    $name= $_POST['s_name'];
    $s_abbr= $_POST['s_abbr'];
    $s_region= $_POST['s_region'];

    // buat query update
    pg_query("BEGIN") or die("Failed\n");
    $pgsql = "UPDATE us_states SET state_name='$name', state_abbr='$s_abbr', state_region='$s_region' WHERE state_id=$sid";
    $query = pg_query($dbcon, $pgsql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: us-states.php');
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