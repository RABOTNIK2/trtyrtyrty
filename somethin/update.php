<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host="localhost";
    $user="root";
    $pass="";
    $bd="test";
    
    $link=mysqli_connect($host, $user, $pass, $bd );
    mysqli_query($link,"SET NAMES 'utf8'");
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $query = "INSERT INTO users SET name='$name', age='$age', salary='$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        }
    ?>
    <form action="update.php?id=<?= $_GET['id'] ?>" method="POST">
     <input name="name" value="<?= $user['name'] ?>">
     <input name="price" value="<?= $user['price'] ?>">
     <input name="weight" value="<?= $user['weight'] ?>">
     <input type="submit">
</form>

</body>
</html>