<?php

//connect to database...
$servername="localhost";
$username="root";
$password="";
$database="iDiscuss";

$con=mysqli_connect($servername,$username,$password,$database);
if(!$con){
    die("something went wrong ".mysqli_connect_error());
}
?>