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

function validation($log,){
    urldecode($log);
    strip_tags($log);
    htmlspecialchars($log);
    return $log;

  }
  $id=$_SESSION["id"];

if(!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['age']) and !empty($_POST['email'])){
    $login = $_POST['login'];
    $age = $_POST['age'];
    $email=$_POST['email'];
    // $photoshop=$_POST['photoshop'];

    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $query = "SELECT * FROM users WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if (empty($user)) {
        validation($login);
        validation($password);
        validation($email);

        if (isset($_POST['upload'])) {

        
          $filename = $_FILES["uploadfile"]["name"];
          $tempname = $_FILES["uploadfile"]["tmp_name"];
          $folder = "./image/" . $filename;

          if(!empty($filename)){

            // Get all the submitted data from the form
            $query = "UPDATE users SET login='$login', password='$password', age='$age', email='$email',photoshop='$filename' WHERE id=$id ";

        
          // Execute query
            mysqli_query($link, $query) or die(mysqli_error($link));
            // error_reporting(E_ALL);
            // ini_set('display_errors', 'on');
        
          // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3>  Image uploaded successfully!</h3>";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }

          }
        
        
          
 
        
        }else{
          echo "Вы не отправили файл";
        }
           
    } else {
        echo "Такой логин уже есть";
          
    }
    

}



if($_SESSION["auth"] == true){?>
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

<div class="based_div">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
              <img src="img/pie.png" class="picsa"><span class="text-light">Блог плохих рецептов</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="./profile.php">Профиль</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./kyrsov.php">На главную</a>
                  </li>
                </ul>
              </div>
            </div>
    </nav>
    <div class="container12">
        <div class="jopa">
        
        <?php
            $id=$_SESSION["id"];
            $query = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $user123 = mysqli_fetch_assoc($result);
             ?>
            <img src='image/<?=$user123['photoshop'] ?>'class="functional">

        </div>
        <div class="colonna">
           <form action="" method="POST" enctype="multipart/form-data" class="addin">

              <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
              <input name="uploadfile" type="file" class="form-control"><br>

              <input name="login" type="text" class="form-control" value="<?=$user123['login']?>"><br>
              <input name="password" type="password" class="form-control" placeholder="пароль"><br>
              <input name="email" type="email" class="form-control" value="<?=$user123['email']?>"><br>
              <input name="age" type="text" class="form-control" value="<?=$user123['age']?>"><br>
              <button type="submit" class="btn btn-outline-light" name='upload' id="vasy32">Отправить</button>     
           </form>

        </div>

    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php } ?>