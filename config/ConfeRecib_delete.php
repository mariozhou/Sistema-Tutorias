<?php
session_start();
include("bd.php");//conexion
echo $idRegistros = $_REQUEST['IdAct'];
//echo $idRegistros=$_SESSION['idd'];

$sentenciaSQL3 = $conexion->prepare("DELETE FROM actividades WHERE IdAct = :IdAct ");  
$sentenciaSQL3->bindParam(':IdAct',$idRegistros);
$sentenciaSQL3->execute();   
?>
