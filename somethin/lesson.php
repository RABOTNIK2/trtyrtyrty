<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$bd="test";
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");

function validation($log,$passs){
    urldecode($passs);
    strip_tags($passs);
    htmlspecialchars($passs);
    urldecode($log);
    strip_tags($log);
    htmlspecialchars($log);
  
  }
   if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm']) and !empty($_POST['name']) and !empty($_POST['lastname']) and !empty($_POST['patronymic'])) {
      if (mb_strlen($_POST["login"])>=4 && mb_strlen($_POST["login"])<=10 && mb_strlen($_POST["password"])>=6 && mb_strlen($_POST["password"])<=12 ){
        if ($_POST['password'] == $_POST['confirm']) {
          $login = $_POST['login'];
          $name = $_POST['name'];
          $lastname = $_POST['lastname'];
          $patronymic = $_POST['patronymic'];
          $dateofbirth = $_POST['dateofbirth'];
          
          $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
          $query = "SELECT * FROM register WHERE login='$login'";
          $user = mysqli_fetch_assoc(mysqli_query($link, $query));
          validation($login,$password);
        }else{
            echo "hhhh";

        }
        if (empty($user)) {
            $query = "INSERT INTO register SET login='$login', password='$password',name='$name', patronymic='$patronymic',lastname='$lastname',dateofbirth='$dateofbirth' ";
            mysqli_query($link, $query);
      
            $_SESSION['auth'] = true;
      
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            // header("Location: ./index.php");
             
        } else {
            echo "логин занят , выведем сообщение об этом";
            
        }
    
  
      }else{
        echo "Вы не то сделали";
      }
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
       <input name="login"><br>
       <input name="password" type="password"><br>
       <input type="password" name="confirm"><br>
       <input name="name"><br>
       <input name="patronymic"><br>
       <input name="lastname"><br>
       <input name="dateofbirth"><br>
       <input type="submit">
</form>

    
</body>
</html>