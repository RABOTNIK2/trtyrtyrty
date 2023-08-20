<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <form action="" method="POST">
 <input name="login">
 <input name="password" type="password">
 <input type="submit">
</form> -->
<h1>ЖРИ ГОВНО</h1>

    <?php
    session_start();
    $host="localhost";
    $user="root";
    $pass="";
    $bd="test";
    
    $link=mysqli_connect($host, $user, $pass, $bd );
    mysqli_query($link,"SET NAMES 'utf8'");
    
    // if (!empty($_POST['password']) && !empty($_POST['login'])) {
    //     $login = $_POST['login'];
    //     $password = $_POST['password'];
        
    //     $query = "SELECT * FROM users345 WHERE login='$login' AND password='$password'";
    //     $res = mysqli_query($link, $query);
    //     $user = mysqli_fetch_assoc($res);
        
    //     if (!empty($user)) {
    //        header("Location: ./index.php");
    //        $_SESSION['flash'] = 'вы успешно вошли';
       
    //     } else {
    //        echo "вводи нормальные данные утырок";
    //     }
    //    };?>
    
</body>
</html>