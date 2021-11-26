<?php
include("bd.php");//conexion
session_start();
$id=$_SESSION['id'];
$tipo=(isset($_POST['opciones']))?$_POST['opciones']:"";
$comentario=(isset($_POST['motivo']))?$_POST['motivo']:"";
$materia=(isset($_POST['materia']))?$_POST['materia']:"";
$nombre=$_SESSION['nombre'];
$idtutor=$_SESSION['idtutor'];

 $sentenciaSQL2 = $conexion->prepare("INSERT INTO `canalizacion`( `IdTutorado`,Tipo, `Comentarios`,IdTutor,Respuesta,Materia) VALUES (:id,:tipo,:comentario,:idtutor,'pendientes de respuesta',:materia)");  
 $sentenciaSQL2->bindParam(':id',$id);
 $sentenciaSQL2->bindParam(':tipo',$tipo);
 $sentenciaSQL2->bindParam(':materia',$materia);
 $sentenciaSQL2->bindParam(':comentario',$comentario);
 $sentenciaSQL2->bindParam(':idtutor',$idtutor);
 $sentenciaSQL2->execute();

if( $sentenciaSQL2 ){   
   echo "<script> alert('Enviado');
    location.href = '../Alumno-MostrarPedirAyuda.php';
   </script>";

}else{
    echo "<script> alert('Error');
    location.href = '../Alumno-MostrarPedirAyuda.php';
    </script>";
}

?>