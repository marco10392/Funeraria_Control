<?php
require "conexion.php";
session_start();

$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$calle = $_POST["calle"];
$municipio = $_POST["municipio"];
$telefono = $_POST["telefono"];
$aportacion = $_POST["aportacion"];
$beneficiario = $_POST["beneficiario"];
$ocupacion = $_POST["ocupacion"];
$asesor = $_POST["asesor"];
$plan = $_POST["plan"];


echo $FirstName .$LastName . $calle .$municipio . $telefono .$aportacion . $beneficiario . $ocupacion . $asesor . $plan ;

$sqlcliente = ("INSERT INTO clientes VALUES ('".$FirstName."','".$LastName."','".$calle."','".$municipio."','"
              .$telefono."','".$beneficiario."','".$ocupacion."','".$asesor."','".$plan."',now(),'')");

              $resultcliente = mysqli_query($conn,$sqlcliente);
echo $sqlcliente;
$queryfind = ("SELECT cl_NumCOntrato FROM clientes WHERE cl_Nombre = '".$FirstName."'");
$resultfind = mysqli_query($conn,$queryfind);
while($rowfind = mysqli_fetch_array($resultfind)){
    $cliente = $rowfind[0];
}

if($aportacion != 0) {
    $sqlabonoini = ("INSERT INTO abonos VALUES('', now(),'".$aportacion."','".$cliente."','".$asesor."')");
    $resabono = mysqli_query($conn,$sqlabonoini);

    header('Location: reciboAbono.php?contrato='.$cliente.'' );
}


?>