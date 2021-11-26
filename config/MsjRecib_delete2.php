<?php
session_start();
include("bd.php");//conexion
echo $idRegistros = $_REQUEST['IdMsj'];
//echo $idRegistros=$_SESSION['idd'];

$sentenciaSQL3 = $conexion->prepare("DELETE FROM mensaje WHERE IdMsj = :IdMensaje ");  
$sentenciaSQL3->bindParam(':IdMensaje',$idRegistros);
$sentenciaSQL3->execute();   
?>