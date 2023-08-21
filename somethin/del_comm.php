<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$bd="htth";
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");

$id = $_GET['id'];

$query = "DELETE FROM comments WHERE id='$id' ";
mysqli_query($link, $query);

$query="SELECT * FROM publiction";

header("Location: ./argue_exstra.php ");



error_reporting(E_ALL);
ini_set('display_errors', 'on');
 ?>