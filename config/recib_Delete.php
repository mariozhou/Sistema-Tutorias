<?php
session_start();
include("bd.php");//conexion
echo $idRegistros = $_REQUEST['id'];
//echo $idRegistros=$_SESSION['idd'];

$sentenciaSQL3 = $conexion->prepare("DELETE FROM files WHERE id = :id ");  
$sentenciaSQL3->bindParam(':id',$idRegistros);
$sentenciaSQL3->execute();   
?>
