<?php
//bd
$host="localhost"; 
$bd="tutoria";
$user="root";
$pass="";

try{
        $conexion = new PDO("mysql:host=$host;dbname=$bd",$user,$pass);
        if($conexion){
            //echo "Conectado... a sistema"; 
        }
            
}catch( Exception $ex){
    echo $ex->getMessage();
    exit;
}

return $conexion;



/*
//para ingresar datos 
<?php 
$txtUser=(isset($_POST['txtUser']))?$_POST['txtUser']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$btnlogin=(isset($_POST['btnlogin']))?$_POST['btnlogin']:"";

//imprimir valores de formulario en  la pag
echo $txtUser."<br/>";
echo $txtPass."<br/>";
echo $btnlogin."<br/>";


include("config/bd.php");

switch($btnlogin){
    case "aceptar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO `usuario` (`IdUser`, `Password`, `TipoUser`) VALUES (:user, :pass,'');");
        $sentenciaSQL->bindParam(':user',$txtUser);
        $sentenciaSQL->bindParam(':pass',$txtPass);
        //$sentenciaSQL->bindParam(':tipoUser',);
        //INSERT INTO `usuario` (`IdUser`, `Password`, `TipoUser`) VALUES ('16401023', 'zhou1234', ''); //para ingresar datos 
        //SELECT `IdUser`, `Password`, `TipoUser` FROM `usuario` WHERE 1
        $sentenciaSQL->execute();
        break;
    case "cambiar":
        echo $txtUser."<br/>";
        echo $txtPass."<br/>";
        break;
}

?> */


?>

