<?php
$host="localhost";
$username="root";
$password="";
$dbname="technology";

$con=mysqli_connect($host,$username,$password,$dbname);
if(!$con)
{
    die("Could not connect to database: " . mysqli_connect_error());
}

?>