<?php
session_start();
include('config/conexion.php');
include('config/bd.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $con->real_escape_string(htmlentities($_POST['title']));
    //$description = $con->real_escape_string(htmlentities($_POST['description']));

    $file_name = $title;

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
     
            $dir = 'repot/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . 'xlsx';
           // $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                
            }
        
    }

    $ins = $con->query("INSERT INTO `reportefile`(  `url`, `title`) VALUES ( '$new_name_file', '$title')");
   //INSERT INTO `reportefile`( `Periodo`, `url`, `title`) VALUES ($description, $new_name_file, $title)
   //$ins = $con->query("INSERT INTO `actividades`( `Actividad`, `Des`, `Semestres`, `url`, `type`) VALUES (,'[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')");
   if ($ins) {
        echo 'Subido';
        
    } else {
        echo 'Errorasd';
    }
} else {
    echo 'Error';
}
