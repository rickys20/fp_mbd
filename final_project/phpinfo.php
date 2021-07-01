<?php
 $dbcon = pg_connect("host='localhost' user='postgres' password='Koki12001' dbname='fp_mbd'");
       
       // Cek Koneksi Ke Server Database

    if ($dbcon) // Jika Ada Koneksi
    {
        echo "Koneksi Database Sukses";
    }
    else
    {
        echo "Koneksi Database Gagal";
    }
    echo"<br>";
   $query = "SELECT * FROM categories";
   $result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());

   // output result
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "Id: " . $line['category_id'] . "    Judul: " . $line['category_name'] . "<br/>";
    }

    // free result
    pg_free_result($result);

    // close connection
    pg_close($dbcon);
?>