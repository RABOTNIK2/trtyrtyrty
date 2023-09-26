<?php 
session_start();
$host="localhost";
$user="root";
$pass="";
$bd="htth";
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");



// $query = "SELECT * FROM publication WHERE";
// $result = mysqli_query($link, $query) or die(mysqli_error($link));

// $query="SELECT MIN(id) FROM publication";
// $result = mysqli_query($link, $query) or die(mysqli_error($link));
// $user = mysqli_fetch_assoc($result);

// $query="SELECT MAX(id) FROM publication";
// $res = mysqli_query($link, $query) or die(mysqli_error($link));
// $user2 = mysqli_fetch_assoc($res);
$query = "SELECT * FROM publication ORDER BY RAND() LIMIT 2";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = '[]'; $row = mysqli_fetch_assoc($result); $data[] = $row);

$json=json_encode($data);

$query = "SELECT * FROM publication ORDER BY RAND() LIMIT 1";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data1 = []; $row1 = mysqli_fetch_assoc($res); $data1[] = $row1);

$json1=json_encode($data1);

header('Content-Type: application/json');


// $res21="";
// $res22="";

?>
  




