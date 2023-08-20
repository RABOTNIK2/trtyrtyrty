<?php
$host="localhost";
$user="root";
$pass="";
$bd="test";

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");
 $id = $_GET['id'];
 $name = $_POST['name'];
 $age = $_POST['age'];
 $salary = $_POST['salary'];

 $query = "UPDATE USERS2 SET name='$name', age='$age', salary='$salary' WHERE id=$id";
 mysqli_query($link, $query) or die(mysqli_error($link));
 echo 'юзер успешно изменен!';

?>
