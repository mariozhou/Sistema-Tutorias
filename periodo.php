

<?php
include("config/bd.php");//conexion
$sentenciaSQL3= $conexion->prepare("SELECT `activo`, `Idperiodo` FROM `periodo` WHERE 1");
$sentenciaSQL3->execute();
$idact=($sentenciaSQL3->fetchColumn());
//Update ayuda Set      Tipo = null
if($idact=='1' ){
    $sentenciaSQL3= $conexion->prepare("UPDATE `periodo` SET `activo`='0' WHERE 1");
    $sentenciaSQL3->execute();
    $idact=($sentenciaSQL3->fetchColumn());
    //borrar todo los tutor de tutorados
    $sentenciaSQL4= $conexion->prepare("UPDATE tutorados SET IdTutor = null");
    $sentenciaSQL4->execute();

    $sentenciaSQL4= $conexion->prepare("UPDATE reporte SET IdTutor = null");
    $sentenciaSQL4->execute();    

    $sentenciaSQL4= $conexion->prepare("UPDATE usuario SET TipoUser = null where TipoUser='Tutor' ");
    $sentenciaSQL4->execute(); 

    echo "<script> alert('Cerrando periodo');
    location.href = 'Exportar-reporte.php';
    </script>";
    
}elseif ($idact=='0') {
    $sentenciaSQL3= $conexion->prepare("UPDATE `periodo` SET `activo`='1' WHERE 1");
    $sentenciaSQL3->execute();
    $idact=($sentenciaSQL3->fetchColumn());

    echo "<script> alert('Abrindo periodo');
    location.href = 'Exportar-reporte.php';
    </script>";
   // header("location:Exportar-reporte.php");
}

//UPDATE `periodo` SET `activo`='1' WHERE 1
?>