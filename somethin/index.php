<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // $arr = [
    //     [2,1,4,3,5],
    //     [3,5,2,4,1],
    //     [4,3,1,5,2],
    // ];
    // foreach($arr as $value){
    //     sort($value);
    //     echo "<pre>";
    //     print_r($value) ;
    //     echo "</pre>";
    
    // }

    // $arr = [
    //     [1,2,3],
    //     [4,5,6],
    //     [7,8,9],
    // ];
    // foreach($arr as $value) {
    //     foreach($value as $value2) {
    //         $result += $value2;
    //     }
    // }
    // echo $result;

    // $arr = [];
    // foreach($arr as $value) {
    //     foreach($value as $value1) {
    //         $value1[0] = 1;
    //         $value1[0] = 2;
    //         $value1[1] = 3;
    //         $value1[1] = 4;
    //         $value1[2] = 5;
    //         $value1[2] = 6;
    //         $value1[3] = 7;
    //         $value1[3] = 8;
    //         print_r($value1);
    //     }
    // }
    // function hello($num,$num2){
    //     return $num**3 + $num2**3;
        
    // }
    // $res=hello(2,3);
    // echo $res;
    // function PosOrNeg($num1){
    //     if($num1 >=0){
    //         echo "+++";
    //     }else{
    //         echo "---";
    //     }
    // }
    // PosOrNeg(-1);
    // function Summa($num3,$num4,$num5){
    //     $result=$num3 +$num4+$num5;
    //     echo $result;
    // }
    // Summa(1,2,3);


    // if(!isset($_COOKIE["zaxod"])){
    //     $time=time();
    //     setcookie("zaxod",$time,time() + 3600);

    // }else{
        
    //     echo time() - $_COOKIE["zaxod"];
    // }
    // $age=12;
    // $name="dacvz";
    // setcookie("age", $age,time()+ 60 *60 * 24 * 30);
    // if(isset($_COOKIE["page1"])){
    //     setcookie("page1","",);
        
    // }
    // var_dump($_COOKIE["name"])
    // setcookie("food", $food,time()+ 60 *60 * 24 * 30 *12 *100);


    // ?>

    <?php  
    $host="localhost";
    $user="root";
    $pass="";
    $bd="test";
    
    $link=mysqli_connect($host, $user, $pass, $bd );
    mysqli_query($link,"SET NAMES 'utf8'");
    // $query="CREATE TABLE courses(id INT NOT NULL AUTO_INCREMENT ,courses_name VARCHAR(50) NOT NULL ,teachers_id INT NOT NULL AUTO_INCREMENT)";
    // $query="DROP TABLE TEACHERS";
    
    // $query="SELECT * FROM USERS2";
    // $result = mysqli_query($link, $query) or die (mysqli_error('Ошибка подключения :('));

    // for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    // $result = '';
    // foreach ($data as $elem) {
    //  $result .= '<tr>';
    //  $result .= '<th>' . $elem['id'] . '</th>';
    //  $result .= '<th>' . $elem['name'] . '</th>';
    //  $result .= '<th>' . $elem['age'] . '</th>';
    //  $result .= '<th>' . $elem['salary'] . '</th>';
     $result .= '<th><a href=./edit.php?id='.$elem['id'].'>change user</a></th>';
    //  $result .= '</tr>';
    // }
     
    //  echo "<table>"; 
    //  echo $result;
    //  echo "</table>";
    
    
    ?>
   




</body>
</html>