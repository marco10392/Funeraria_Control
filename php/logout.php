
<?php
require_once 'conexion.php';
session_start();
/*
if (isset($_SESSION['InputEmail'])) {
    $name = $_SESSION['InputEmail'];
  echo $name;
}else {
    echo "nothing";
}
*/

unset($_SESSION["InputEmail"]);
//unset($_SESSION["InputPassword"]);
header("Location:../index.php");
?>