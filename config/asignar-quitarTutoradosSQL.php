<?php
include("bd.php");//conexion
$asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
 $date =(isset($_POST['demo']))?$_POST['demo']:"";
 
 $latitud = isset($_POST['latitud'])?$_POST['latitud']:null;
 $longitud = isset($_POST['longitud'])?$_POST['longitud']:null;
if( !(isset($_POST["btnquitar"])) ){

    if( isset($_POST['check']) And !($asigtutor == "Tutores") ){

    foreach( $_POST['check'] AS $value  ){
        echo '123'.$value;
        $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado= :noctl ");  
        $sentenciaSQL2->bindParam(':noctl',$value);
        $sentenciaSQL2->bindParam(':tutor',$asigtutor);
        $sentenciaSQL2->execute();
    }
    echo $value.$asigtutor."<script> alert('Se asigno correcto');
    location.href = '../asignar-quitarTutorados.php';
   </script>";


}else{
    echo 'sdsd'.$date."<script> alert('No eligio un Tutor o Alumno');
    location.href = '../asignar-quitarTutorados.php';
   </script>";
 
}
}elseif( (isset($_POST["check"])) ){
    foreach( $_POST['check'] AS $value  ){
        $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor ='' ) WHERE IdTutorado= :noctl ");  
        $sentenciaSQL2->bindParam(':noctl',$value);
        $sentenciaSQL2->execute();
        }

    echo "<script> alert('Se quitor tutor correcto');
    location.href = '../asignar-quitarTutorados.php';
   </script>";
}else{
    echo "<script> alert('No eligio un Alumno');
    location.href = '../asignar-quitarTutorados.php';
   </script>";
  
}


/*
if( $sentenciaSQL2 ){   
   echo "<script> alert('correcto');
    location.href = '../asignar-quitarTutorados.php';
   </script>";

}else{
    echo "<script> alert('incorrecto');
    location.href = '../asignar-quitarTutorados.php';
    </script>";
}
*/

?>