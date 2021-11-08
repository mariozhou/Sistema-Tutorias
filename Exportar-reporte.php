<?php include("template/cabeceraTablas.php"); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css\Tablas.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatable\datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatable\DataTables-1.11.3\css\dataTables.bootstrap4.min.css">
        <!--font awesome con CDN-->  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
<?php
 $rango=(isset($_POST['range-semestre']))?$_POST['range-semestre']:"";
 echo '  tutor:'.$asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
 echo ' noc2'.$noct2=(isset($_POST['Ncontrol']))?$_POST['Ncontrol']:"";

 
//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where TipoUser='Tutor' ORDER BY Nombre ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
$btnbuscar2 = (isset($_POST["btnbuscar2"]));
$asignar = (isset($_POST["btnasignar"]));
$sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");  
$sentenciaSQL1->execute();
$alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
//actualizar tabla alumnos
if($rango == 0  And (isset($_POST["btnbuscar1"]))){
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 1) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 1 and 5 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 2 And (isset($_POST["btnbuscar1"]))) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 6 and 8 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 3 And (isset($_POST["btnbuscar1"]))) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres >= 9 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ( strlen($noct2) > 1 And $btnbuscar2  )  { //buscar por noctol
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE  IdUser=:noctl ");  
    $sentenciaSQL1->bindParam(':noctl',$noct2);
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
   $btnbuscar2="";
}elseif ( strlen($noct2) > 1 And (isset($_POST["btnquitar"])) ) { //quiar alumno por noctol
    echo $asd ='quitar';
    $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor ='' ) WHERE IdTutorado= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$noct2);
    //$sentenciaSQL2->bindParam(':tutor',$asigtutor);
    $sentenciaSQL2->execute();
}elseif (  $asignar ) { //quiar alumno por noctol
    echo $asd ='asignar';
    $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$noct2);
    $sentenciaSQL2->bindParam(':tutor',$asigtutor);
    $sentenciaSQL2->execute();
    $asignar ="";
    //$alumno = $sentenciaSQL2->fetchAll(PDO::FETCH_OBJ);
    //$noct2="";
}

echo ' novt2:'.$noct2;
//tutor con nombre retrun id 
//SELECT IdTutor FROM `tutor` WHERE NombreTutor = 'blanca ramirez' 
// agregar tutor
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//
?>  

<body>
    <form class="form-tutorado" method="post" >

        <div class="tableFixHead">
            <table id="example" class="table table-bordered" > 
                <thead>
                    <tr>
                        <th >Nombre</th>
                        <th>No.Control</th>
                        <th>Semestre</th>
                    </tr>
                </thead>
                <tbody>

                 <?php foreach($alumno as $result) { 
            echo "<tr>
                    <td>".$result -> Nombre."</td>
                    <td>".$result -> IdUser."</td>
                    <td>".$result -> Semestres."</td>
                </tr>"; }      
                ?>
                </tbody>
            </table>
        </div>
        <br>
        
    </form>
    
        <a id="boton" href="menuJD.php">
            <button class="botones" type="submit" value="Regresar">Regresar</button>
        </a>
      
     <!-- jQuery, Popper.js, Bootstrap JS -->
     <script src="datatable/jquery/jquery-3.3.1.min.js"></script>
    <script src="datatable/popper/popper.min.js"></script>
    <script src="datatable/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatable/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatable/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>    
    <script src="datatable/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatable/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <!-- código JS propìo-->    
    <script type="text/javascript" src="js\main.js"></script>  

</body>




<?php include("template/pie.php"); ?>