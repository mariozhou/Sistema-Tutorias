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
 echo $asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
 echo $noct2=(isset($_POST['Ncontrol']))?$_POST['Ncontrol']:"";

 
//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where TipoUser='Tutor' ORDER BY Nombre ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado, reporte.Asesoria,
reporte.Actividad, reporte.Conferencias, reporte.Talleres,reporte.IdTutorado, reporte.HoraSesionIndiv,  
reporte.HoraSesionGrup, reporte.Acredito, reporte.EvaValor, reporte.EvalNivel FROM tutorados 
JOIN reporte ON tutorados.IdTutorado = reporte.IdTutorado ORDER BY NombreTutorado ASC");  
$sentenciaSQL1->execute();
$alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
$sentenciaSQL1 = $conexion->prepare("SELECT HoraSesionIndiv, HoraSesionGrup, EvaValor, EvalNivel FROM reporte JOIN usuario ON reporte.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");  
$sentenciaSQL1->execute();
$reporte = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
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
                        <th >Nombre Del Tutor</th>
                        <th>Desertaron</th>
                       
                        <th>Acreditacion</th>
                        <th>No Acreditaron</th>
                        <th>Total Estudiantes Atendidos</th>
                        <th>Tutoria individual</th>
                        <th>Tutoria Grupal</th>
                        <th>Numero de Estudiantes Canalizados</th>
                        <th>Conferencias</th>
                        
                        <th>Talleres</th>
 
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
                    <td>".$result -> IdTutorado."</td>

                  
                    </tr>"; }      
                ?>

                
                </tbody>
                <tbody>




                </tbody>
            </table>
        </div>
        <br>

    </form>

        <a id="boton" href="menuCT.php">
            <button class="botones" type="submit" value="Regresar">Regresar</button>
        </a>
      
     <!-- jQuery, Popper.js, Bootstrap JS -->
 


</body>




<?php include("template/pie.php"); ?>