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
                    $sentenciaSQL1 = $conexion->prepare("UPDATE `usuario` SET `Password`=:contra  WHERE IdUser=:user");
                    $sentenciaSQL1->bindParam(':user',$txtUser);  
                    $sentenciaSQL1->bindParam(':contra',$txtPass);  
                    $sentenciaSQL1->execute();
                    $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
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
                 
                <div class="contraseña">
                    <img src="img/contraseña.jpg" alt="imgcontraseña" >
                    <input class="caja-texto" type="password" name="txtPass2" id="txtPass" placeholder="Ingrese contraseña" required>
                </div>

                <div class="Aceptar">
                    <button class="botones" name="btnlogin" type="submit" value="aceptar">Aceptar</button> 
                </div>
    
        </form>
    </div>
<?php include("template/pie.php"); ?>