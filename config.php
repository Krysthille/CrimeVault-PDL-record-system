<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
// $dbport = 3307;

$connect =mysqli_connect("localhost", "root", "", "database");
if($connect->connect_errno)
{
    echo 'database connection error';
}
 ?>
