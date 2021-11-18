<?php
session_start();
include("bd.php");//conexion
echo $idRegistros = $_REQUEST['IdMensaje'];
//echo $idRegistros=$_SESSION['idd'];

$sentenciaSQL3 = $conexion->prepare("DELETE FROM cambiartutor WHERE IdMensaje = :IdMensaje ");  
$sentenciaSQL3->bindParam(':IdMensaje',$idRegistros);
$sentenciaSQL3->execute();   
?>