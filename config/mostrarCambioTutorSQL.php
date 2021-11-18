<?php
include("bd.php");//conexion
session_start();
  $iduser=$_SESSION['iduser'];
  $idtutor=$_SESSION['nombreTutor'];
  $tutorado=$_SESSION['nombre'];
 //echo$idtutor=$_POST['idtutor'];
  $motivos=$_POST['motivos'];

 $sentenciaSQL1 = $conexion->prepare("INSERT INTO `cambiartutor`(`IdTutorado`, `NombreTutor`, `Mensaje`,NombreTutorado) VALUES (:iduser,:idtutor,:motivos,:tutorado)" );  
 $sentenciaSQL1->bindParam(':iduser',$iduser);
 $sentenciaSQL1->bindParam(':idtutor',$idtutor);
 $sentenciaSQL1->bindParam(':motivos',$motivos);
 $sentenciaSQL1->bindParam(':tutorado',$tutorado);
 $sentenciaSQL1->execute();

if( $sentenciaSQL1){   
   echo "<script> alert('Se enviar correctamente');
    location.href = '../mostrarCambioTutor.php';
   </script>";

}else{
    echo "<script> alert('Error');
    location.href = '../mostrarCambioTutor.php';
    </script>";
}
