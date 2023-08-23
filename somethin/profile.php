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
$popa= $_SESSION['id'];
$query = "SELECT * FROM users WHERE id=$popa";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

$query="SELECT * FROM publication WHERE users_id_pub=$popa ";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

$res21="";
$res100="";

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
    <div class="basa1">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
              <img src="img/pie.png" class="picsa"><span class="text-light">Блог плохих рецептов</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./kyrsov.php">На главную</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="characteristik">
            <div class="fotographiy">
            <?php
            $id=$_SESSION["id"];
            $query = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $user123 = mysqli_fetch_assoc($result);
             ?>
                <img src="image/<?=$user123['photoshop'] ?>" class="babuly">

            </div>
            <?php $query = "SELECT COUNT(*) as постов FROM publication WHERE users_id_pub=$popa";
                  $res = mysqli_query($link, $query) or die(mysqli_error($link));
                  $user1 = mysqli_fetch_row($res);
                  $user2=$user1[0];?>
            <div class="information">
                <h4 class="text-light" id="stol"><span class="login"><?=$user['login']?></span></h4>
                <p class="text-light">Возраст :<span class="age"><?= $user['age']?></span></p>
                <p class="text-light">Количество постов:<span class="count"><?php echo $user2;?> </span></p>
                
                <a class="btn btn-outline-light" href="./add_recipe.php" role="button">Добавить рецепт</a>
                <a class="btn btn-outline-light" href="./add_argue.php" role="button">Добавить пост</a><br>
                <a class="btn btn-outline-light" href="./change.php" role="button">Изменить профиль</a>
                <a class="btn btn-outline-light" href="./logout.php" role="button">Выйти из аккаунта</a>
                <!-- <a class="btn btn-outline-light" href="./logout.php" role="button">Выйти из аккаунта</a> -->
                <?php
                $res100='<a class="btn btn-outline-light" href=./kill_yourself.php?id='.$popa.' role="button"> Делитнуться</a>';
                echo $res100; ?>

                
                
                
                

            </div>
        </div>
        <div class="tipo_vyvod">
          <h4 class="text-light">Ваши блюда</h4>
        <?php foreach($data as $elem){?>

<div class="content1">
    <div class="sami_recepty">
        <div class="pictures">
            <div class="fotocki">
                <img src="image/<?=$user123['photoshop'] ?>" class="ludy">
                <h5 class="text-light"><?=$user['login']?></h5>
            </div>
            <img src="./image/<?=$elem['photo']?>" class="food">
        </div>
        <div class="description">
            <h4 class="text-light"><?=$elem['zagalovok']?></h4>
            <p class="text-light"><?=$elem['incridients']?></p>
            <?php $res21.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem['id'].' role="button"> Посмотреть полностью</a>';
            echo $res21;
            $res21=""; ?>
            <?php 
            $poa44=$elem['users_id_pub'];
            if($poa44==$popa){
              $res99='<a class="btn btn-outline-light" href=./change_recp.php?id='.$elem['id'].' role="button">Редактировать рецепт</a>';
              $res300='<a class="btn btn-outline-light" href=./del_pub.php?id='.$elem['id'].' role="button"> Удалить рецепт</a>';
            }
            echo $res99;
            $res99="";
            echo $res300;
            $res300="";
            
            ?>

            <!-- <a class="btn btn-outline-light" href= "" role="button">Прочитать полностью</a> -->
        </div>
    </div>
</div>
<?php } ?>
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

  <div class="guga">

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
              <img src="img/pie.png" class="picsa"><span class="text-light">Блог плохих рецептов</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="./kyrsov.php">Войти</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./kyrsov.php">На главную</a>
                  </li>
                </ul>
              </div>
            </div>
    </nav>
    <div class="bagaa">
      <h4 class="text-light">Вы не авторизированы</h4>
      <a class="btn btn-outline-light" href="./registration.php" role="button">Войти</a>
    </div>
  

  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php } ?>
