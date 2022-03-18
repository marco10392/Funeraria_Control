<?php
require "conexion.php";
session_start();

$nombre = $_POST["FirstName"];
$apellido =$_POST["LastName"];
$email = $_POST['InputEmail'];
$usrnam = $_POST['InputUsrName'];
$contrasena =$_POST["InputPassword"];
$repeatcontrasena =$_POST["RepeatPassword"];
$privilegios = $_POST['privilegios'];

$query = "SELECT * FROM users WHERE fn_Email = '".$_POST["InputEmail"]."'"; 
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count<=0 & ($nombre != '' & $apellido != ''& $email != '' & $usrnam != '' & $contrasena != '' & $repeatcontrasena != '')) {/***************EMPTY SPACE CONDITION 13/03/22 */
    $sqlreg ="INSERT INTO users VALUES ('','$nombre','$apellido','$email','$usrnam',md5('$contrasena'),'')";

$result =mysqli_query($conn,$sqlreg);

if($result){
    $var_dump =($result);
    $var_dump = $sqlreg;
    $_SESSION['InputEmail'] = $email;
    $_SESSION['InputUsrName'] = $usrnam;
    header('location:../index.php');
    
}
  }
else{
    header('location:../register.php');
}


?>