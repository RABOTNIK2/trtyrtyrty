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




// $popa= $elem["users_id_pub"];
// $query = "SELECT * FROM users WHERE id=$popa";

// $res = mysqli_query($link, $query) or die(mysqli_error($link));
// $user = mysqli_fetch_assoc($res);
$res21="";
if(!isset($_POST['upload'])){
  $query = "SELECT * FROM publication";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  
  
}else{
  $query = "SELECT * FROM publication ORDER BY datee DESC";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
  // header("Location: ./dishes.php");
}

if(isset($_POST['upload2'])){
  $query = "SELECT * FROM publication";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  
  
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
    <div class="basa">
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
                    <a class="nav-link text-light" href="./kyrsov.php">На главную</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <div class="recept">
            <div class="col-2" id="zagalovok1">
                <h3 class="text-light">Рецепты</h3>
                
            </div>
            <div class="btn-group">
              <form action='' method="POST" >
                <button type="submit" class="btn btn-outline-light" name="upload">Сначало новые</button>
              </form>
              <form action='' method="POST" class="ponos228" >
                <button type="submit" class="btn btn-outline-light" name="upload2">Сначало старые</button>
              </form>
                
            </div>
        </div>
      <?php foreach($data as $elem){?>

        <div class="content">
            <div class="sami_recepty">
                <div class="pictures">
                    <div class="fotocki">
                    <?php $popa= $elem["users_id_pub"];
                        $query = "SELECT * FROM users WHERE id=$popa";
                        $res = mysqli_query($link, $query) or die(mysqli_error($link));
                        $user = mysqli_fetch_assoc($res);
                        ?>
              
                        <img src='image/<?=$user['photoshop'] ?>' class="ludy">
                        
                        <h5 class="text-light"><?=$user['login']?></h5>
                    </div>
                    <img src='image/<?=$elem['photo']?>' class="food">
                </div>
                <div class="description">
                    <h4 class="text-light"><?=$elem['zagalovok']?></h4>
                    <p class="text-light"><?=$elem['incridients']?></p>
                    <?php $res21.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem['id'].' role="button"> Посмотреть полностью</a>';
                    echo $res21;
                    $res21=""; ?>
                    

                    <!-- <a class="btn btn-outline-light" href= "" role="button">Прочитать полностью</a> -->
                </div>

                
            
            </div>
            
        </div>
      <?php } ?>
        
    </div>
    

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php }else{?>
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
    <div class="basa">
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
                    <a class="nav-link text-light" href="./kyrsov.php">На главную</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <div class="recept">
            <div class="col-2" id="zagalovok1">
                <h3 class="text-light">Рецепты</h3>
                
            </div>
            <div class="btn-group">
            <form action='' method="POST" >
                <button type="submit" class="btn btn-outline-light" name="upload">Сначало новые</button>
              </form>
              <form action='' method="POST" class="ponos228" >
                <button type="submit" class="btn btn-outline-light" name="upload2">Сначало старые</button>
              </form>
            </div>
        </div>
      <?php foreach($data as $elem){?>

        <div class="content">
            <div class="sami_recepty">
                <div class="pictures">
                    <div class="fotocki">
                    <?php $popa= $elem["users_id_pub"];
                        $query = "SELECT * FROM users WHERE id=$popa";
                        $res = mysqli_query($link, $query) or die(mysqli_error($link));
                        $user = mysqli_fetch_assoc($res);
                        ?>
              
                        <img src='image/<?=$user['photoshop'] ?>' class="ludy">
                        
                        <h5 class="text-light"><?=$user['login']?></h5>
                    </div>
                    <img src='image/<?=$elem['photo']?>' class="food">
                </div>
                <div class="description">
                    <h4 class="text-light"><?=$elem['zagalovok']?></h4>
                    <p class="text-light"><?=$elem['incridients']?></p>
                    <?php $res21 .='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem['id'].' role="button"> Посмотреть полностью</a>';
                    echo $res21;
                    $res21=""; ?>

                    <!-- <a class="btn btn-outline-light" href= "" role="button">Прочитать полностью</a> -->
                </div>
            </div>
        </div>
      <?php } ?>
        
    </div>
    

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
<?php } ?>
