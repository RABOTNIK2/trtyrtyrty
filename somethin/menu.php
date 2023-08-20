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
    $query="SELECT * FROM dishes";
    $result = mysqli_query($link, $query) or die (mysqli_error('Ошибка подключения :('));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    $result = '';
    foreach ($data as $elem) {
    //  $result .= '<tr>';
    //  $result .= '<th>' . $elem['id'] . '</th>';
    //  $result .= '<th>' . $elem['name'] . '</th>';
    //  $result .= '<th>' . $elem['age'] . '</th>';
    //  $result .= '<th>' . $elem['salary'] . '</th>';
    //  $result .= '<th><a href=./edit.php?id='.$elem['id'].'>change user</a></th>';
    //  $result .= '</tr>';
    } ?>
    
</body>
</html>