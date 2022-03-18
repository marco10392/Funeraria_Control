<?php
require "conexion.php";
session_start();
if (isset($_SESSION['InputEmail'])) {
    $email = $_SESSION['InputEmail'];
    //echo "<script>alert('Alguno de los campos no es válido.$email');</script>";

        $query = "SELECT * FROM users WHERE fn_Email = '".$email."' OR fn_User = '".$email."'"; 
        $result = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($result)) {
            $asrid = $row[0];
            $usrname = $row[4];
            $priv = $row[6];

          // echo $row[4];
        }
      
  
}else {
   // echo "user";
    
}

$contratores = $_GET['contrato'];
$email = $_SESSION['InputEmail'];

$sqlrecibo = "SELECT * FROM abonos WHERE ab_Contrato = '$contratores' ORDER BY id DESC LIMIT 1";

$res = mysqli_query($conn,$sqlrecibo);

while($row = mysqli_fetch_array($res)){
    $idabn = $row[0];
    $fechaCon = $row[1];
    $amnt = $row[2];
    $contrato = $row[3];
    $asesorr = $row[4];
    /*********CHECK THE LAST ABONO REGISTERED */
    echo '"ID"'.$idabn ,'"FECHA"'. $fechaCon ,'"MONTO"'. $amnt ,'"CONTRATO"'. $contrato ,'"ASESOR"'. $asesorr .'"USUARIO"'.$email ;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recibo de pago</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- PDF -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body id="page-top">

<div style="display: flex; justify-content: center;">
<div id="invoice" style="height:250px; width:195px; border-style:double;margin:5px;">
    
    <div id="container-fluid">
        <div class="row" style="justify-content:center;display:flex">
        <div>    
        <img src="../img/logo/funeraria-logo-ticket.png" style="width: 80px;height:80px;">
        </div>
        </div>

        <div class="row">
            <p style="font-size: 10px;text-align:center">
            AV. SANTA INES #10 COL. CUAUTLIXCO CUAUTLA, MORELOS C.P. 62747
            </p>
        </div>

    </div>
</div>
</div>




</body>

<script>
        window.onload = function () {
           
    
    const invoice = this.document.getElementById("invoice");
    console.log(invoice);
    console.log(window);
    var opt = {
        margin: 1,
        filename: 'Reservacion <?php echo $contratores ?>.pdf',
        image: { type: 'png', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: [80,58], orientation: 'portrait' }
    };
    html2pdf().from(invoice).set(opt).save();

}
    </script>
</html>