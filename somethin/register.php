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
       <input type="password" name="confirm">
       <!-- <input name="email" type="email">
       <input name="data_birht"> -->
       <input type="submit">
</form>





    <?php  
    session_start();
    $host="localhost";
    $user="root";
    $pass="";
    $bd="test";
    
    $link=mysqli_connect($host, $user, $pass, $bd );
    mysqli_query($link,"SET NAMES 'utf8'");
    // $query="CREATE TABLE courses(id INT NOT NULL AUTO_INCREMENT ,courses_name VARCHAR(50) NOT NULL ,teachers_id INT NOT NULL AUTO_INCREMENT)";
    // $query="DROP TABLE TEACHERS";
    // $query="SELECT * FROM USERS2";
    // for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    // $result = '';
    // foreach ($data as $elem) {
    //  $result .= '<tr>';
    //  $result .= '<th>' . $elem['id'] . '</th>';
    //  $result .= '<th>' . $elem['name'] . '</th>';
    //  $result .= '<th>' . $elem['age'] . '</th>';
    //  $result .= '<th>' . $elem['salary'] . '</th>';
    //  $result .= '<th><a href=./edit.php?id='.$elem['id'].'>change user</a></th>';
    //  $result .= '</tr>';
    // }
     
    //  echo "<table>"; 
    //  echo $result;
    //  echo "</table>";w
    // function generateSalt(){
    //   $salt = '';
    //   $saltLength = 8;
      
    //   for($i = 0; $i < $saltLength; $i++) {
    //   $salt .= chr(mt_rand(33, 126));
    //   }
      
    //   return $salt;
    // }

    
    if (!empty($_POST['login']) and !empty($_POST['password'] and !empty($_POST['confirm']))) {
      if (mb_strlen($_POST["login"])>=4 && mb_strlen($_POST["login"])<=10 && mb_strlen($_POST["password"])>=6 && mb_strlen($_POST["password"])<=12 ){
        if ($_POST['password'] == $_POST['confirm']) {
          $login = $_POST['login'];
          
          $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
          $query = "SELECT * FROM users345 WHERE login='$login'";
          $user = mysqli_fetch_assoc(mysqli_query($link, $query));
          if (empty($user)) {
            $query = "INSERT INTO users345 SET login='$login', password='$password'";
            mysqli_query($link, $query);
      
            $_SESSION['auth'] = true;
      
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            header("Location: ./index.php");
             
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
        

      

 
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    ?>
</body>
</html>