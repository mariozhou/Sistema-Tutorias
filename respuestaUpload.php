<?php
session_start();
include('config/conexion.php');
include('config/bd.php');

echo $tipo=$_SESSION['Tipo1'];
echo $tutorado=$_SESSION['IdTutorado1'];
echo $tutor=$_SESSION['idtutor1'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msj = $con->real_escape_string(htmlentities($_POST['mensaje']));


    //$ins = $con->query("INSERT INTO `actividades`(`Actividad`,`Des`,Semestres,`url`) VALUES ('$title','$description','$semestres','$new_name_file')");
   //INSERT INTO `mensaje`(`IdMsj`, `Remitente`, `IdDestino`, `Mensaje`, `Asunto`, `Fecha`) VALUES ('[value-1]','[value-2]','$msj','[value-4]','[value-5]','[value-6]')
   //$ins = $con->query("INSERT INTO `actividades`( `Actividad`, `Des`, `Semestres`, `url`, `type`) VALUES (,'[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')");
   if ($ins) {
        echo 'Enviado';
    } else {
        echo 'Error';
    }
} else {
    echo 'Error';
}