<?php
# create database connection
require 'conexion.php';

if(!empty($_POST["InputEmail"])) {
  $query = "SELECT * FROM users WHERE fn_Email = '".$_POST["InputEmail"]."'"; 
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "<span style='color:red'> Correo ya existe .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
    echo "<span style='color:green'> Correo disponible .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
?>