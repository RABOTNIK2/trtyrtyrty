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


// $query = "SELECT * FROM publication WHERE";
// $result = mysqli_query($link, $query) or die(mysqli_error($link));

// $query="SELECT MIN(id) FROM publication";
// $result = mysqli_query($link, $query) or die(mysqli_error($link));
// $user = mysqli_fetch_assoc($result);

// $query="SELECT MAX(id) FROM publication";
// $res = mysqli_query($link, $query) or die(mysqli_error($link));
// $user2 = mysqli_fetch_assoc($res);
$query = "SELECT * FROM publication ORDER BY RAND() LIMIT 2";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

$query = "SELECT * FROM publication ORDER BY RAND() LIMIT 1";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data1 = []; $row1 = mysqli_fetch_assoc($res); $data1[] = $row1);

$res21="";
$res22="";


 if($_SESSION["auth"] == true) {?>
  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
  
      <title>figny</title>
    </head>
    <body>
    <div>
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
          <li class="nav-item">
            <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 
  <div class="karousell">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php foreach($data1 as $elem1){?>
      <div class="carousel-item active">
        <img src="image/<?=$elem1['photo']?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?=$elem1['zagalovok']?></h5>
          <?php $res22.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem1['id'].' role="button"> Посмотреть полностью</a>';
          echo $res22;
          $res22=""; ?>
          
        </div>
      </div>
    <?php }?>
    <?php foreach($data as $elem){?>
      <div class="carousel-item">
        <img src="image/<?=$elem['photo']?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?=$elem['zagalovok']?></h5>
          <?php $res21.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem['id'].' role="button"> Посмотреть полностью</a>';
          echo $res21;
          $res21=""; ?>
          
        </div>
      </div>
    <?php }?>
    
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  
  </div>
  <div div class="part_of_osnova">
    <h3 class="proud">Наш сайт одобрили такие люди как</h3>
  </div>
    
    <div class="sponsor1">
      <div class="circle">
        <img src="img/1574061724_152223.jpg" class="foto_sponsora">
        <div class="words">
          <h3>Рататуй Мышевский</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam </p>
        </div>
      </div>
    </div>
    <div class="sponsor2">
      <div class="circle2">
        <div class="words2">
          <h3 class="zagalovok">Рататуй Мышевский</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam </p>
        </div>
        <img src="img/0_1425034615.jpg" class="foto_sponsora2">
      </div>
    </div>
    <div class="sponsor1">
    <div class="circle">
      <img src="img/1663621448_12-mykaleidoscope-ru-p-yulya-visotskaya-krasivo-14.jpg" class="foto_sponsora">
      <div class="words">
      <h3>Рататуй Мышевский</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam 
      </p></div>
      </div>
    </div>
  
  </div>
  <div class=" bg-warning" id="jopicol">
      <h5 class="text-light">Типо копирайт</h5><br>
      
  </div>
  
    </div>
  
  
  
  <?php }else { ?>
    <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
  
      <title>figny</title>
    </head>
    <body>
    <div>
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
          <li class="nav-item">
            <a class="nav-link text-light" href="./dishes.php">Рецепты</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="./argue.php">Обсуждение</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="karousell">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php foreach($data1 as $elem1){?>
      <div class="carousel-item active">
        <img src="image/<?=$elem1['photo']?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?=$elem1['zagalovok']?></h5>
          <?php $res22.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem1['id'].' role="button"> Посмотреть полностью</a>';
          echo $res22;
          $res22=""; ?>
          
        </div>
      </div>
    <?php }?>
    <?php foreach($data as $elem){?>
      <div class="carousel-item">
        <img src="image/<?=$elem['photo']?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?=$elem['zagalovok']?></h5>
          <?php $res21.='<a class="btn btn-outline-light" href=./recipe.php?id='.$elem['id'].' role="button"> Посмотреть полностью</a>';
          echo $res21;
          $res21=""; ?>
          
        </div>
      </div>
    <?php }?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  
  </div>
  <div div class="part_of_osnova">
    <h3 class="proud">Наш сайт одобрили такие люди как</h3>
  </div>
    
    <div class="sponsor1">
      <div class="circle">
        <img src="img/1574061724_152223.jpg" class="foto_sponsora">
        <div class="words">
          <h3>Рататуй Мышевский</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam </p>
        </div>
      </div>
    </div>
    <div class="sponsor2">
      <div class="circle2">
        <div class="words2">
          <h3 class="zagalovok">Рататуй Мышевский</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam </p>
        </div>
        <img src="img/0_1425034615.jpg" class="foto_sponsora2">
      </div>
    </div>
    <div class="sponsor1">
    <div class="circle">
      <img src="img/1663621448_12-mykaleidoscope-ru-p-yulya-visotskaya-krasivo-14.jpg" class="foto_sponsora">
      <div class="words">
      <h3>Рататуй Мышевский</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ducimus cumque. Accusamus velit ab inventore esse dolorum quia aperiam 
      </p></div>
      </div>
    </div>
  
  </div>
  <div class=" bg-warning" id="jopicol">
      <h5 class="text-light">Типо копирайт</h5><br>

  </div>
  
    </div>
  <?php }?>
  
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
  </html>
  




