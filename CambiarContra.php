<?php include("template/cabeceralogin.php"); ?>

<?php 
session_start();
$menutipo=$_SESSION['tipo'];//recibir tipo de user de menuPrincipal
$txtUser=(isset($_POST['txtUser']))?$_POST['txtUser']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$txtPass2=(isset($_POST['txtPass2']))?$_POST['txtPass2']:"";
$btnlogin=(isset($_POST['btnlogin']))?$_POST['btnlogin']:"";


include("config/bd.php");//conexion
switch($btnlogin){
    case "aceptar":
        if($_POST){
            $sentenciaSQL = $conexion->prepare("SELECT `IdUser`, `Password`, `TipoUser` FROM `usuario` WHERE IdUser=:user");
            $sentenciaSQL->bindParam(':user',$txtUser);  
            $sentenciaSQL->execute();
            $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

            if($usuario){ 
          
                if ($txtPass==$txtPass2) {
                    $sentenciaSQL1 = $conexion->prepare("UPDATE `usuario` SET `Password`=:contra, cambio='0'  WHERE IdUser=:user");
                    $sentenciaSQL1->bindParam(':user',$txtUser);  
                    $sentenciaSQL1->bindParam(':contra',$txtPass);  
                    $sentenciaSQL1->execute();
                    $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                    echo "<script> alert('Contraseña cambiado');
                    </script>";
                    header("location:menuPrincipal.php");    
                    }else{
                           echo "<script> alert('Contraseña no coincide');
                            </script>";
                     
                        }     
                    }else {
                             echo "<script> alert('Usuario no es validad');
                            </script>";
                    }
    break;
    }
}

?>
<!--
    <div class="contenedor-imagen">
        <img src="img/login.jpg" alt="imglogin" >  
    </div>
    <div class="contenedor-principal">   
        <form  class="form-registro" id="formulario" method="POST" enctype="multipart/form-data" >
                <div class="texto">
                    <h4>Iniciar Sesion</h4>
                </div>
                
                <div class="login">
                    <img src="img/noControl.jpg" alt="imgnoControl" >
                    <input class="caja-texto" type="text" name="txtUser" id="txtUser" placeholder="Ingrese su correo" required>
                </div>

                <div class="contraseña">
                    <img src="img/contraseña.jpg" alt="imgcontraseña" >
                    <input class="caja-texto" type="password" name="txtPass" id="txtPass" placeholder="Ingrese contraseña" required>
                </div>
                 
                <div class="">
                    <img src="img/contraseña.jpg" alt="imgcontraseña" >
                    <input class="caja-texto" type="password" name="txtPass2" id="txtPass" placeholder="Ingrese contraseña" required>
                </div>

                <div class="Aceptar">
                    <button class="botones" name="btnlogin" type="submit" value="aceptar">Aceptar</button> 
                </div>
    
        </form>
    </div>-->

    <div class="container w-75 mt-5 mb-5 rounded shadow bg-info">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <img src="img/escudo_itt_grande.png" width="50" alt="imglogin">
            </div> 
            <h2 class="fw-bold text-center py-5">Cambio de contraseña</h2>
            <!--login-->
            <form method="POST" class="form-group" enctype="multipart/form-data" required>
                <div class="mb-4">
                    <label for="txtUser" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="txtUser" id="txtUser" placeholder="Ingrese su No.Control" required>
                </div>
                <div class="mb-4">
                    <label for="Password" class="form-label">Nueva Contraseña</label>
                    <input type="Password" class="form-control" name="txtPass" id="txtPass" placeholder="Ingrese contraseña">
                </div>
                <div class="mb-4">
                    <label for="Password" class="form-label">Confirmar Contraseña</label>
                    <input type="Password" class="form-control" name="txtPass2" id="txtPass2" placeholder="Ingrese contraseña">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="btnlogin" value="aceptar">Guardar</button>
                    <a href="menuPrincipal.php"><button type="button" class="btn btn-primary">Regresar</button></a>
                </div>
            </form>
            <!---->
        </div>
    </div>
</div>
<?php include("template/pie.php"); ?>
