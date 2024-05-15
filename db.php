<?php
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="flower";

$conn=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$conn)
{
    die("failed to connect!!");
}