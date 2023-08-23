
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

$id = $_GET['id'];
$query = "SELECT * FROM argue WHERE id=$id ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

$popa= $user["user_id_arg"];
$query = "SELECT * FROM users WHERE id=$popa";

$res = mysqli_query($link, $query) or die(mysqli_error($link));
$user23 = mysqli_fetch_assoc($res);

if(isset($_SESSION['id'])){
  $popa1= $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id=$popa1";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  $user32 = mysqli_fetch_assoc($result);

}
date_default_timezone_set('UTC');




function validation3($log){
  urldecode($log);
  strip_tags($log);
  htmlspecialchars($log);
  return $log;

}
$popa2=$user['id'];
if(!empty($_POST['content'])  ){
  $content = $_POST['content'];
  $prenadlecit=$popa2;
  $user_id_comm=$popa1;

  validation3($content);

  $query = "INSERT INTO comments SET content='$content', prenadlecit='$prenadlecit', user_id_comm='$user_id_comm' ";
  mysqli_query($link, $query)or die(mysqli_error($link));
  // error_reporting(E_ALL);
  // ini_set('display_errors', 'on');
         
  
        

  

}else{
  // echo "вы ввели пустой логин";
}

$query = "SELECT * FROM comments WHERE prenadlecit=$id ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

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
                    <a class="nav-link active text-light" aria-current="page" href="./profile.php">  Профиль</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./argue.php">Обсуждения</a>
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
                <?php
            $id=$_SESSION["id"];
            $query = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $user123 = mysqli_fetch_assoc($result);
             ?>
                    <img src="image/<?=$user23['photoshop']?>"  class="ludy">
                    <h5 class="text-light"><?= $user23['login']?></h5>
                </div>
                <div>
                <h5 class="text-light">Дата публикации<br>
                    <?=$user['datee']?>
                    </h5>
                </div>
            </div>
            <div class="needed_food">
                <h5 class="text-light"><?=$user["oglavlenie"]?> </h5>
                <p class="text-light"><?=$user["poema"]?></p>
            </div>
            <div class="crasaucik">
                <h5 class="text-light">Комментарии</h5>
                <div class="background_stuff"></div>
                <?php foreach($data as $elem){?>
                  <div class="comments">
                    <div class="maket">
                        <div class="poleno">
                        <?php
                            $popa34= $elem["user_id_comm"];
                            $query = "SELECT * FROM users WHERE id=$popa34";
                            
                            $res = mysqli_query($link, $query) or die(mysqli_error($link));
                            $user52 = mysqli_fetch_assoc($res);
                             ?>
                            <img src='image/<?=$user52['photoshop'] ?>' class="ludy">
                            
                            <h5 class="text-light"><?= $user52["login"]?></h5>
                        </div>
                        
                        <p class="text-light" id="nabor_text"><?=$elem["content"]?></p>
                        <?php
                        // if($popa34==$popa1){
                        //   $resultat='<a class="btn btn-outline-light" href=./del_comm.php?id='.$elem['id'].' role="button"> Удалить коммент</a>';

                        // } 
                        // echo $resultat;
                        // $resultat="";
                        ?>
                    </div>
                </div>
              <?php }?>
                
                
                <div class="comments">
                    <div class="maket">
                        <div class="poleno">
                            <img src='image/<?=$user123['photoshop']?>' class="ludy">
                            <h5 class="text-light"><?=$user32["login"]?></h5>
                        </div>
                        <form action="" method="POST">
                          <input name="content" type="text" class="form-control" placeholder="Комментарии"><br>
                          <button type="submit" class="btn btn-outline-light" id="vasy1">Отправить</button>
                        </form>
                    </div>
                </div>
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
                    <a class="nav-link active text-light" aria-current="page" href="./registration.php">  Вход</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-light" href="./argue.php">Обсуждения</a>
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
                
                    <img src='image/<?=$user23['photoshop'] ?>' class="ludy">
                    <h5 class="text-light"><?= $user23['login']?></h5>
                </div>
                <div>
                <h5 class="text-light">Дата публикации
                  <?=$user['datee'] ?></h5>
                </div>
            </div>
            <div class="needed_food">
                <h5 class="text-light"><?=$user["oglavlenie"]?> </h5>
                <p class="text-light"><?=$user["poema"]?></p>
            </div>
            <div class="crasaucik">
                <h5 class="text-light">Комментарии</h5>
                <div class="background_stuff"></div>
                <?php foreach($data as $elem){?>
                  <div class="comments">
                    <div class="maket">
                        <div class="poleno">
                        <?php
                            $popa34= $elem["user_id_comm"];
                            $query = "SELECT * FROM users WHERE id=$popa34";
                            
                            $res = mysqli_query($link, $query) or die(mysqli_error($link));
                            $user52 = mysqli_fetch_assoc($res);
                             ?>
                            <img src='image/<?=$user52['photoshop'] ?>' class="ludy">
                            
                            <h5 class="text-light"><?= $user52["login"]?></h5>
                        </div>
                        
                        <p class="text-light" id="nabor_text"><?=$elem["content"]?></p>
                    </div>
                </div>
              <?php }?>
                
                
                


        </div>
    </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php } ?>
