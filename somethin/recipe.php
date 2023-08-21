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

date_default_timezone_set('UTC');

$vremy= date('d-m-Y');



$id = $_GET['id'];
$query = "SELECT * FROM publication WHERE id=$id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

$popa= $user["users_id_pub"];
$query = "SELECT * FROM users WHERE id=$popa";

$res = mysqli_query($link, $query) or die(mysqli_error($link));
$user21 = mysqli_fetch_assoc($res);
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
    <div class="basa2">
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
                    <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
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
        <div class="fkusnotisha">
            <div class="info1">
                <div class="photoshop">
            
                    <img src='image/<?=$user21['photoshop']?>' class="ludy">
                    <h5 class="text-light"><?=$user21["login"]?></h5>
                </div>
                <div>
                    <h5 class="text-light">Дата публикации:</h5>
                    <h5 class="text-light"><?=$user['datee'] ?></h5>
                </div>
            </div>
            <div class="photo">
                <img src='image/<?=$user['photo']?>' class="kartinocka">
            </div>
            <div class="needed_food">
                <h5 class="text-light">Индигридиенты</h5>
                <ul>
                    <p class="text-light"><?= $user["incridients"]?></p>
                </ul>
            </div>
            <div class="instruction">
                <h5 class="text-light">Как это готовить</h5>
                <ul>
                    <p class="text-light"><?=$user["cookin_steps"]?></p>
                </ul>
            </div>

        </div>
    </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php }else{ ?>
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
    <div class="basa2">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
              <img src="img/pie.png" class="picsa"><span class="text-light">Блог плохих рецептов</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="./registration.php">Вход</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
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
        <div class="fkusnotisha">
            <div class="info1">
                <div class="photoshop">
            
                    <img src='image/<?=$user21['photoshop']?> 'class="ludy">
                    <h5 class="text-light"><?=$user21["login"]?></h5>
                </div>
                <div>

                  <h5 class="text-light">Дата публикации</h5><br>
                  <h5 class="text-light"><?=$user['datee'] ?></h5>
                </div>
            </div>
            <div class="photo">
                <img src='image/<?=$user['photo']?>' class="kartinocka">
            </div>
            <div class="needed_food">
                <h5 class="text-light">Индигридиенты</h5>
                <ul>
                    <p class="text-light"><?= $user["incridients"]?></p>
                </ul>
            </div>
            <div class="instruction">
                <h5 class="text-light">Как это готовить</h5>
                <ul>
                    <p class="text-light"><?=$user["cookin_steps"]?></p>
                </ul>
            </div>

        </div>
    </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php } ?>
