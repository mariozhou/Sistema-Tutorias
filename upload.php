<?php
session_start();
include('config/conexion.php');
include('config/bd.php');
$nombre=$_SESSION['nombre'];



$sentenciaSQL1= $conexion->prepare("SELECT IdTutorado FROM `tutorados` WHERE NombreTutorado = :nombre");
$sentenciaSQL1->bindParam(':nombre',$nombre);
$sentenciaSQL1->execute();
$id=($sentenciaSQL1->fetchColumn());
$_SESSION['id']=$id;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $con->real_escape_string(htmlentities($_POST['title']));
    $description = $con->real_escape_string(htmlentities($_POST['description']));

    $file_name = $id.$title;

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = 'files/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                
            }
        }   
    }

    $ins = $con->query("INSERT INTO files(title,descripction,url,IdTutorado) VALUES ('$title','$description','$new_name_file','$id')");
    
    if ($ins) {
        echo 'Subido';
    } else {
        echo 'Error';
    }
} else {
    echo 'Error';
}
