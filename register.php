<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<style>
    .bg-reg-img {
    background: url("./img/logo/logo.jpg");
    background-position: center;
    background-size: cover;
   

}
</style>


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-reg-img"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Nuevo Usuario</h1>
                            </div>
                            <form class="user" method="POST" action="php/regData.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                        name="FirstName"
                                            placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName"
                                        name="LastName"
                                            placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="form-group">
                                <span id="check-InputEmail"></span>
                                    <input type="email" class="form-control form-control-user" onInput="checkUsername()" id="InputEmail"
                                    name="InputEmail"
                                        placeholder="Correo Electronico">
                                </div>
                                <div class="form-group ">
                               
                                <span id="check-InputUsrName"></span>
                                    <input type="text" class="form-control form-control-user" onInput="checkInputUsrName()" id="InputUsrName"
                                    name="InputUsrName"
                                        placeholder="Nombre de usuario">
                                
                                

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                        name="InputPassword"
                                            id="InputPassword" placeholder="Contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="RepeatPassword"
                                            id="RepeatPassword" placeholder="Repetir Contraseña">
                                    </div>
                                </div>
                                <div class="form-group ">
                                       <select type="select" class="form-select form-control " data-show-subtext='true'  data-live-search='true'   id="privilegios"
                                        name="privilegios" style="font-size: .8rem; border-radius:10rem; height: 3.9em;" required >
                                        <option >Selecciona Privilegios</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Cobrador</option>
                                        <option value="3">Asesor</option>
                                       </select>
                                  
                                </div>
                                
                                
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="Register" id="Register" value="Register">Registrar Cuenta</button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Ya tienes cuenta? Inicia Sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script>
function checkUsername() {
    
    jQuery.ajax({
    url: "php/check_availability.php",
    data:'InputEmail='+$("#InputEmail").val(),
    type: "POST",
    success:function(data){
        $("#check-InputEmail").html(data);
    },
    error:function (){}
    });
}
</script>

<script>
function checkInputUsrName() {
    
    jQuery.ajax({
    url: "php/check_availabilityUsr.php",
    data:'InputUsrName='+$("#InputUsrName").val(),
    type: "POST",
    success:function(data){
        $("#check-InputUsrName").html(data);
    },
    error:function (){}
    });
}
</script>

<script>
    var password = document.getElementById("InputPassword")
  , confirm_password = document.getElementById("RepeatPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</html>