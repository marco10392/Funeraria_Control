<?php


include 'conexion.php';
$email = $_POST['InputEmail'];
  
  $pass = md5($_POST['InputPassword']);
  

if (isset($email) && isset($_POST['InputPassword']) && $_POST['InputPassword'] != "") {
    //$username = $_POST['InputEmail'];
    $password = md5($_POST['InputPassword']);
    
    $squlito = "SELECT fn_Nombre, fn_User, fn_Contrasena FROM users WHERE fn_User ='" . $_POST['InputEmail'] . "' and fn_Contrasena='" . md5($_POST['InputPassword']) . "'";
  // echo $squlito;

   $result = mysqli_query($conn,$squlito);
  $count = mysqli_num_rows($result);

    //$result = $conn->query($squlito);
//echo $result;
    if ($count > 0) {

        echo "count ";
        
        while ($row = $result->fetch_row()) {
            $uss = $row[0];
            
            echo $uss;
            
            //echo "<script>alert('is statement');</script>";
        }
        
        session_start();
        $_SESSION['InputEmail'] = $email;
        $_SESSION['InputUsrName'] = $usrnam;
        
        
        header('location:../index.php');
        

        
       
       // header('location:regInfo.php');
    } else {
        echo "<script>alert('Alguno de los campos no es válido.');</script>";
        header('location:../404.html');
    }
}else{
    echo " no valid data";
}

?>