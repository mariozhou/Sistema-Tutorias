<?php
session_start();
include("bd.php");//conexion
echo $idRegistros = $_REQUEST['Idreport'];
//echo $idRegistros=$_SESSION['idd'];

$sentenciaSQL3 = $conexion->prepare("DELETE FROM reportefile WHERE Idreport = :id");  
$sentenciaSQL3->bindParam(':id',$idRegistros);
$sentenciaSQL3->execute();   
?>
