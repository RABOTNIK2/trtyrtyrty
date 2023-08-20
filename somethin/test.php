<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <input name="text" type="text"><br>
    <input type="submit">
</form>
<?php
$host="localhost";
$user="root";
$pass="root";
$bd="kursov";

$link=mysqli_connect($host, $user, $pass, $bd );
mysqli_query($link,"SET NAMES 'utf8'");

if (!empty($_POST)) {
  $text = $_POST['text'];

  $query = "INSERT INTO comments SET text='$text'";
  mysqli_query($link, $query) or die(mysqli_error($link));
}
$query = "SELECT * FROM comments";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>

<div>
  <h2>комменты</h2>
  <?php foreach ($data as $elem){ ?>
    <p>
        <b><?= $elem['text'] ?></b><br>
        <?php echo date('Y-m-d');?>
    </p>
<?php }; ?>

</div>

  
</body>
</html>