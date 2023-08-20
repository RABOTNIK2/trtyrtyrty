<?php 
$host="localhost";
$user="root";
$pass="";
$bd="test";

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");
$del = $_GET['del'];
$query = "DELETE FROM users WHERE id=$del";
mysqli_query($link, $query) or die(mysqli_error($link));?>