<?php 

$dbcon = new mysqli ("MySQL-5.7", "root", "", "dataBase");
if ($dbcon -> connect_error) { 
    die($dbcon->connect_error);
}

?>