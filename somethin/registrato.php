<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$bd="htth";

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");
function validation($log,){
  urldecode($log);
  strip_tags($log);
  htmlspecialchars($log);
  return $log;

}
error_reporting(E_ALL);
ini_set('display_errors', 'on');

 if (!empty($_POST['login']) and !empty($_POST['password'] and !empty($_POST['confirm']))) {
   if (mb_strlen($_POST['login'])>=4 and mb_strlen($_POST['login'])<=36 and mb_strlen($_POST['password'])>=6 and mb_strlen($_POST['password'])<=40 ){
      if ($_POST['password']=== $_POST['confirm']) {
        $login = $_POST['login'];
        
        
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $query = "SELECT * FROM users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));
        if (empty($user)) {
          validation($login);
          validation($password);
       
          $query = "INSERT INTO users SET login='$login', password='$password'";
          mysqli_query($link, $query);
    
          $_SESSION['auth'] = true;
    
          $id = mysqli_insert_id($link);
          $_SESSION['id'] = $id;
          header("Location: ./kyrsov.php");
           
        } else {
          echo "логин занят , выведем сообщение об этом";
          
        }
  
        
          
      } else {
        echo "шёл нафиг";
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="bg-warning" id="p123">
    
    <div class="registration_window1">
      <h3 class="text-light">Регистрция</h3>
      <form action="" method="POST">
        <input name="login" type="text" class="form-control" placeholder="Имя"><br>
        <input name="password" type="password" class="form-control" placeholder="Пароль"><br>
        <input type="password" name="confirm" class="form-control" placeholder="Повторите пароль"><br>
        <button type="submit" class="btn btn-outline-light" id="vasy1">Зарегистрироваться</button>
      </form>
      
    </div>

  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>