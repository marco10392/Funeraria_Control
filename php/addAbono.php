<?php
require "conexion.php";
session_start();


$contrato = $_POST['contrato'];
$amount = $_POST['amount'];

if (isset($_SESSION['InputEmail'])) {
    $email = $_SESSION['InputEmail'];
    //echo "<script>alert('Alguno de los campos no es válido.$email');</script>";

        $query = "SELECT * FROM clientes WHERE cl_NumCOntrato = '".$contrato."'"; 
        $result = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($result)) {
            $idasr = $row[7];

         
        }
      
  
}else {
   // echo "user";
    
}
//echo $contrato;

$sqlabonos = "INSERT INTO abonos VALUES('',now(),'".$amount."','".$contrato."','".$idasr."')";
$resultabono =mysqli_query($conn,$sqlabonos);


if($resultabono){
   // $_SESSION['contrato'] = $contrato;
    //echo $contrato;
    //echo $contrato;
   // header('Location: reciboAbono.php?contrato='.$contrato );
   header('Location: reciboAbono.php?contrato='.$contrato );
   
   // header('Location: ../pagos.php');

}else{
   
    $message = "Error de datos enviada";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: ../pagos.php?message=' ." $message " );

   // header('Location:../pagos.php' . $message.);
  
}


?>