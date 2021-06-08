<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "fti";

$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$conn){
    die("Gabim ne lidhjen me databazen". mysqli_connect_error());
}