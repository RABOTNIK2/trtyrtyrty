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
function validation($log){
    
    urldecode($log);
    strip_tags($log);
    htmlspecialchars($log);
    return $log;

  }
  $popa= $_SESSION['id'];

  date_default_timezone_set('UTC');

  $vremy= date('Y-m-d');

if(!empty($_POST['oglavlenie']) and !empty($_POST['poema']) ){
    $oglavlenie = $_POST['oglavlenie'];
    $poema = $_POST['poema'];
    $user_id_arg=$popa;
    $datee=$vremy;

    validation($oglavlenie);
    validation($poema);

    $query = "SELECT * FROM argue WHERE oglavlenie='$oglavlenie' ";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if (empty($user)) {
        $query = "INSERT INTO argue SET oglavlenie='$oglavlenie', poema='$poema', user_id_arg='$user_id_arg', datee='$datee' ";
        mysqli_query($link, $query);
        // error_reporting(E_ALL);
        // ini_set('display_errors', 'on');
           
    } else {
        echo " Кажется такую тему уже обсуждали";
          
    }
    

}else{
  // echo "вы ввели пустые данные";
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
        <div class="colonna">
           <form action="" method="POST" class="addin">
              <input name="oglavlenie" type="text" class="form-control" placeholder="Загаловок"><br>
              <input name="poema" type="text" class="form-control" placeholder="Текст"><br>
              <button type="submit" class="btn btn-outline-light" id="vasy32">Отправить</button>     
           </form>

        </div>

    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>