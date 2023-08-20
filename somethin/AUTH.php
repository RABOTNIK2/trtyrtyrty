<?php
 session_start();
 $host="localhost";
 $user="root";
 $pass="";
 $bd="test"; 
 $link=mysqli_connect($host, $user, $pass, $bd );
 mysqli_query($link,"SET NAMES 'utf8'");


 $login = $_POST['login'];
 $query = "SELECT * FROM users345 WHERE login='$login'"; // получаем юзера по логину
 $res = mysqli_query($link, $query);
 $user = mysqli_fetch_assoc($res);

 if (!empty($_POST['password']) and !empty($_POST['login'])) {
     $login = $_POST['login'];
     $password = $_POST['password'];
     
     $query = "SELECT * FROM users345 WHERE login='$login' AND password='$password'";
    //  $res = mysqli_query($link, $query);
    //  $user = mysqli_fetch_assoc($res);
     if (!empty($user)) {
         $hash = $user['password']; // соленый пароль из БД
         
        if (password_verify($_POST['password'], $hash)) {
            echo "всё ок авторизируем";
        
        } else {
            echo "пароль не подошёл сообщим об этом";
        }
     } else {
        echo "пользователя с таким логином нет";

     }
 
     if (!empty($user)) {
        $_SESSION['auth'] = true;
        header("Location: ./rer1.php");
     } else{
        // неверно ввел логин или пароль

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
       <input name="login">
       <input name="password" type="password">
       <input type="submit">
</form>
    
</body>
</html>