<?php

$host = "localhost";
$user = "postgres";
$pass = "Koki12001";
$db = "fp_mbd";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("Could not connect to Server\n");

if( !$con ){
    echo "Error : Unable to open database\n";
}else{
    echo "Berhasil\n";
}

?>