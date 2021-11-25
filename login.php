<?php include("template/cabeceralogin.php"); ?>

<?php 
session_start();
$menutipo=$_SESSION['tipo'];//recibir tipo de user de menuPrincipal
$txtUser=(isset($_POST['txtUser']))?$_POST['txtUser']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$btnlogin=(isset($_POST['btnlogin']))?$_POST['btnlogin']:"";


include("config/bd.php");

switch($btnlogin){
    case "aceptar":
        if($_POST){
            $conexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` WHERE IdUser=:user AND Password=:pass AND TipoUser=:tipo ");
            //AND TipoUser=:tipo
            $sentenciaSQL->bindParam(':user',$txtUser);
            $sentenciaSQL->bindParam(':pass',$txtPass);  
            $sentenciaSQL->bindParam(':tipo',$menutipo);   
            $sentenciaSQL->execute();
            $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
            
            if($usuario){
                if((($usuario["TipoUser"])==='Tutor') AND ($menutipo === 'Tutor') ){
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['iduser']= $usuario["IdUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                        if($usuario['cambio'] == 1){
                            header("location:CambiarContra.php");    
                        }else{
                            header("location:menuTutor.php");
                        }
                    
                }if((($usuario["TipoUser"])==='Alumno')AND ($menutipo === 'Alumno')  ){
                    $_SESSION['iduser']= $usuario["IdUser"];    
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    if($usuario['cambio'] == 1){
                        header("location:CambiarContra.php");    
                    }else{
                        header("location:menuAlumno.php");
                    }
                    
                    
                }if((($usuario["TipoUser"])==='Coordinador de Tutores')AND ($menutipo === 'Coordinador de Tutores') ){
                    $_SESSION['iduser']= $usuario["IdUser"];
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    if($usuario['cambio'] == 1){
                        header("location:CambiarContra.php");    
                    }else{
                        header("location:menuCT.php");
                    }
                    
                }if((($usuario["TipoUser"])==='Jefe de departamento')AND ($menutipo === 'Jefe de departamento') ){
                    $_SESSION['iduser']= $usuario["IdUser"];
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    if($usuario['cambio'] == 1){
                        header("location:CambiarContra.php");    
                    }else{
                        header("location:menuJD.php");
                    }

                }else{
                    echo "<script> alert('Usuario o Contraseña no es validad');
                            </script>";
                }
            }else{
                echo "<script> alert('Usuario o Contraseña no es validad');
                            </script>";
            }
        }
  
        break;
    case "cambiar":
        if($_POST){
            $conexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sentenciaSQL = $conexion->prepare("SELECT `IdUser`, `Password`, `TipoUser` FROM `usuario` WHERE IdUser=:user AND Password =:pass");
            $sentenciaSQL->bindParam(':user',$txtUser);
            $sentenciaSQL->bindParam(':pass',$txtPass);    
            $sentenciaSQL->execute();
            $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
            if($usuario){
                $_SESSION['usuario']= $usuario["IdUser"];
                header("location:menuAlumno.php");
            }else{
                echo "Usuario o Contraseña no es validad";
            }
        }
        break;
}

?>
<!-- Form -original

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
                 
                <div class="Aceptar">
                    <button class="botones" name="btnlogin" type="submit" value="aceptar">Aceptar</button> 
                </div>
    
        </form>
    </div>
-->


<div class="container w-75 mt-5 mb-5 rounded shadow bg-info">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <img src="img/escudo_itt_grande.png" width="50" alt="imglogin">
            </div> 
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>
            <!--login-->
            <form method="POST" class="form-group" enctype="multipart/form-data" required>
                <div class="mb-4">
                    <label for="txtUser" class="form-label">No. Control</label>
                    <input type="text" class="form-control" name="txtUser" id="txtUser" placeholder="Ingrese su No.Control" required>
                </div>
                <div class="mb-4">
                    <label for="Password" class="form-label">Contraseña</label>
                    <input type="Password" class="form-control" name="txtPass" id="txtPass" placeholder="Ingrese contraseña">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="btnlogin" value="aceptar">Iniciar Sesión</button>
                    <a href="menuPrincipal.php"><button type="button" class="btn btn-primary">Regresar</button></a>
                </div>
                <div class="my-3">
                    <span><a href="CambiarContra.php">Cambiar contraseña</a></span>
                </div>
            </form>
            <!---->
        </div>
    </div>
</div>





<?php include("template/pie.php"); ?>