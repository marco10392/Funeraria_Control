<?php
# create database connection
require 'conexion.php';

if(!empty($_POST["InputUsrName"])) {
  $query = "SELECT * FROM users WHERE fn_User = '".$_POST["InputUsrName"]."'"; 
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "<span style='color:red'> Usuario ya existe .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
    echo "<span style='color:green'> Usuario disponible .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
?>