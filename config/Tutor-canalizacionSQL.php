<?php
include("bd.php");//conexion
session_start();
$id=$_SESSION['id'];
$idcanal=(isset($_POST['check']))?$_POST['check']:"";
$respuesta=(isset($_POST['respuesta']))?$_POST['respuesta']:"";

$nombre=$_SESSION['nombre'];
$idtutor=$_SESSION['idtutor'];

//UPDATE `canalizacion` SET `Respuesta`='[value-7]' WHERE 1
$sentenciaSQL1 = $conexion->prepare("UPDATE canalizacion SET `Respuesta`='respondida' WHERE IdCanal = :idcanal");  
$sentenciaSQL1->bindParam(':idcanal',$idcanal);
$sentenciaSQL1->execute();

$sentenciaSQL1 = $conexion->prepare("SELECT * FROM `canalizacion` WHERE IdCanal = :idcanal");  
$sentenciaSQL1->bindParam(':idcanal',$idcanal);
$sentenciaSQL1->execute();
$idtutorado = $sentenciaSQL1->fetch(PDO::FETCH_ASSOC);


 $sentenciaSQL2 = $conexion->prepare("INSERT INTO `mensaje`( `Remitente`, `IdDestino`, `Mensaje`) VALUES ('Tutor',:idtutorado,:respuesta)");  
 //$sentenciaSQL2->bindParam(':id',$idcanal);
 $sentenciaSQL2->bindParam(':respuesta',$respuesta);
 $sentenciaSQL2->bindParam(':idtutorado',$idtutorado['IdTutorado']);
 $sentenciaSQL2->execute();

if( $sentenciaSQL2 ){   
   echo "<script> alert('Enviado');
    location.href = '../Tutor-canalizacion.php';
   </script>";

}else{
    echo "<script> alert('Error');
    location.href = '../Tutor-canalizacion.php';
    </script>";
}

?>