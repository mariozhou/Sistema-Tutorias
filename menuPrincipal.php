<?php include("template/cabeceraMenuPrincipal.php"); ?>
<?php 

$btntipo=(isset($_POST['btntipo']))?$_POST['btntipo']:"";
session_start();
$_SESSION['tipo']=$btntipo;

switch($btntipo){
    case"Jefe de departamento":
        header("location:login.php");
        break;
    case"Coordinador de Tutores":
        header("location:login.php");
        break;
    case"Tutor":
        header("location:login.php");
        break;
    case"Alumno":
        header("location:login.php");
        break;

}
?>   
    <div class="texto">
        <P>Elegir Usuario</P>
    </div>
    <form method="POST">
    <div class="panel-botones">
        <input  class="botones" type="submit" value="Jefe de departamento" id="btntipo" name="btntipo"><br>
        <input  class="botones" type="submit" value="Coordinador de Tutores" id="btntipo" name="btntipo"><br>
        <input  class="botones-Tutor" type="submit" value="Tutor" id="btntipo" name="btntipo"><br>
        <input  class="botones-Alumno" type="submit" value="Alumno" id="btntipo" name="btntipo"><br>
    </div>
</form>
<!--  <input class="botones" name="btnlogin" type="submit" value="Cambiar Contraseña">
      -->
<?php include("template/pie.php"); 

