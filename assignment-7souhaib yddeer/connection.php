

<?php

$localhost = "localhost";
$user =  "root";
$password = "";
$database = "expencetracker";

$conn = mysqli_connect('localhost','root','','expencetracker');


if(!$conn){

  die('error' .mysqli_connect_error());
}



?>