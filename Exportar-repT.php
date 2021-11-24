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
    <script src="datatable/Buttons-1.5.6/js/dataTables.buttons.min.js"></script> 
        <script src="datatable/jquery/jquery-3.3.1.min.js"></script>
    <script src="datatable/popper/popper.min.js"></script>
    <script src="datatable/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatable/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    
    <script src="datatable/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatable/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <!-- código JS propìo-->    
    <script type="text/javascript" src="js\main.js"></script>  
        <!--font awesome con CDN-->  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
<?php
 $rango=(isset($_POST['range-semestre']))?$_POST['range-semestre']:"";
  $asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
  $noct2=(isset($_POST['Ncontrol']))?$_POST['Ncontrol']:"";
 echo $idtutor;
 
//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where TipoUser='Tutor' ORDER BY Nombre ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, reporte.Psicologia,
reporte.Asesoria, reporte.Actividad, reporte.Conferencias,
reporte.Talleres, reporte.HoraSesionIndiv,  
reporte.HoraSesionGrup, reporte.EvaValor, reporte.EvalNivel, 
reporte.Acredito,reporte.Noacredito,reporte.Deserto,
reporte.AcreditadoSegui FROM tutorados 
JOIN reporte ON tutorados.IdTutorado = reporte.IdTutorado where reporte.IdTutor=:idtutor
ORDER BY NombreTutorado ASC");  
$sentenciaSQL1->bindParam(':idtutor',$idtutor);
$sentenciaSQL1->execute();
$alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
//actualizar tabla alumnos

//tutor con nombre retrun id 
//SELECT IdTutor FROM `tutor` WHERE NombreTutor = 'blanca ramirez' 
// agregar tutor
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//
?>  

<body>

    
    <form class="form-tutorado" method="post" >

        <div  max-width="1400px">
            <table id="example" class="table table-bordered" max-width="1400px"> 

                <thead>
                    <tr>
                    <th >Nombre Del Tutorado</th>
                        <th>No. Control</th>
                        <th>Sesiones Individuales</th>
                        <th>Sesiones  Grupales</th>
                        <th>Actividad  Integradora  (Max. 4 hrs)</th>
                        <th>Conferencias</th>
                        <th>Talleres</th>
                        <th>Psicologia</th>
                        <th>Asesoria</th>
                        <th>Total de horas  Cumplidas</th>
                        <th>Acredito</th>
                        <th>No Acredito</th>
                        <th>Deserto</th>
                        <th>Acredito</th>
                        <th>Ac. En Seguimiento</th>
                        <th>Nivel Numerico</th>
                        <th>Nivel De Desempeño</th>
                    </tr>
                </thead>
                <tbody>

                 <?php foreach($alumno as $result) { 
                echo "<tr>
                <td>".$result -> NombreTutorado."</td>
                <td>".$result -> IdTutorado."</td>
                <td>".$result -> HoraSesionIndiv."</td>
                <td>".$result -> HoraSesionGrup."</td>
                <td>".$result -> Actividad."</td>
                <td>".$result -> Conferencias."</td>
                <td>".$result -> Talleres."</td>
                <td>".$result -> Psicologia."</td>
                <td>".$result -> Asesoria."</td>
                <td>".$result -> Asesoria."</td>
                <td>".$result -> Acredito."</td>
                <td>".$result -> Noacredito."</td>
                <td>".$result -> Deserto."</td>
                <td>".$result -> Asesoria."</td>
             
                <td>".$result -> AcreditadoSegui."</td>
                <td>".$result -> EvaValor."</td>
                <td>".$result -> EvalNivel."</td>
                </tr>"; }      
                ?>
    
                </tbody>
    
            </table>
        </div>
        <br>

    </form>
    <a id="boton" href="menuTutor.php" >
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg" id="botones">Regresar</button>
            </div>
        </div>
    </div>
    </a>                
    
</body>
<?php include("template/pie.php"); ?>