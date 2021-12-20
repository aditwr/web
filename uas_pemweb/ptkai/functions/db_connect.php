<?php 
#CONNECT TO DATABASE 
#$HOSTNAME = "sql113.epizy.com";
#$USERNAME = "epiz_30330577";
#$PASSWORD = "Dc9n1PcXyZv";
#$DBNAME = "epiz_30330577_diaryapp";

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "ptkai";

$conn =  mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

if(!$conn){
    echo "database gagal terhubung";
}

?>