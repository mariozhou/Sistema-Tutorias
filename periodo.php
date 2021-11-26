

<?php
include("config/bd.php");//conexion
$sentenciaSQL3= $conexion->prepare("SELECT `activo`, `Idperiodo` FROM `periodo` WHERE 1");
$sentenciaSQL3->execute();
$idact=($sentenciaSQL3->fetchColumn());

if($idact=='1' ){
    $sentenciaSQL3= $conexion->prepare("UPDATE `periodo` SET `activo`='0' WHERE 1");
    $sentenciaSQL3->execute();
    $idact=($sentenciaSQL3->fetchColumn());
}elseif ($idact=='0') {
    $sentenciaSQL3= $conexion->prepare("UPDATE `periodo` SET `activo`='1' WHERE 1");
    $sentenciaSQL3->execute();
    $idact=($sentenciaSQL3->fetchColumn());
}

//UPDATE `periodo` SET `activo`='1' WHERE 1
?>