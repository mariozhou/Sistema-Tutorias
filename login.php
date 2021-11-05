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
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    header("location:menuTutor.php");
                }if((($usuario["TipoUser"])==='Alumno')AND ($menutipo === 'Alumno')  ){
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    header("location:menuAlumno.php");
                }if((($usuario["TipoUser"])==='Coordinador de Tutores')AND ($menutipo === 'Coordinador de Tutores') ){
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    header("location:menuCT.php");
                }if((($usuario["TipoUser"])==='Jefe de departamento')AND ($menutipo === 'Jefe de departamento') ){
                    $_SESSION['tipo']= $usuario["TipoUser"];
                    $_SESSION['nombre']=$usuario["Nombre"];
                    $_SESSION['paterno']=$usuario["ApPaterno"];
                    $_SESSION['materno']=$usuario["ApMaterno"];
                    header("location:menuJD.php");
                }else{
                    echo "Usuario o Contraseña no es validad";
                }
            }else{
                
                echo "Usuario o Contraseña no es validad";
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
<?php include("template/pie.php"); ?>