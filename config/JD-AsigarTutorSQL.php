<?php
include("bd.php");//conexion
  
// $nom=$_POST['Nombre'];
 //$rfc=$_POST['RFC'];
/*
 $sentenciaSQL1 = $conexion->prepare("INSERT INTO `usuario`(`IdUser`, `Nombre`, `Password`, `TipoUser`,cambio) VALUES (:rfc,:nombre,'123456','Tutor','1')" );  
 $sentenciaSQL1->bindParam(':nombre',$nom);
 $sentenciaSQL1->bindParam(':rfc',$rfc);
 $sentenciaSQL1->execute();

 $sentenciaSQL2 = $conexion->prepare("INSERT INTO `tutor`(`IdTutor`, `NombreTutor`) VALUES (:rfc,:nombre)" );  
 $sentenciaSQL2->bindParam(':nombre',$nom);
 $sentenciaSQL2->bindParam(':rfc',$rfc);
 $sentenciaSQL2->execute();
*/
//UPDATE usuario SET TipoUser = null where TipoUser='Tutor'

foreach( $_POST['check'] AS $value  ){
    $sentenciaSQL2 = $conexion->prepare("UPDATE usuario SET TipoUser='Tutor' WHERE IdUser= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$value);
    echo '123'.$value;
    //$sentenciaSQL2->bindParam(':tutor',$asigtutor);
    $sentenciaSQL2->execute();
}

if(  $sentenciaSQL2 ){   

   echo "<script> alert('correcto');
    location.href = '../JD-AsignarTutor.php';
   </script>";

}else{
    echo "<script> alert('incorrecto');
    location.href = '../JD-AsignarTutor.php';
    </script>";
}
    
?>