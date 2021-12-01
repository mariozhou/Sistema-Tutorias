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
$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor as Tutor,SUM(r.deserto) as Deserto, 
SUM(r.Acredito) as Acredito, SUM(r.Noacredito) as Noacredito,  
r.deserto + r.Acredito + r.Noacredito as total,
r.HoraSesionIndiv, r.HoraSesionGrup, SUM(r.Psicologia+r.Asesoria) as cana, 
SUM(r.Conferencias) as Conferencias, SUM(r.Talleres) as Talleres FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor  Group BY m.NombreTutor ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL2 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, reporte.Psicologia,
reporte.Asesoria, reporte.Actividad, reporte.Conferencias,
reporte.Talleres, reporte.HoraSesionIndiv,  
(reporte.HoraSesionGrup + reporte.HoraSesionIndiv +  reporte.Psicologia +  reporte.Asesoria + reporte.Actividad +  reporte.Conferencias + reporte.Talleres) as Total,
reporte.HoraSesionGrup, reporte.EvaValor, reporte.EvalNivel, 
tutorados.Estatus FROM tutorados 
JOIN reporte ON tutorados.IdTutorado = reporte.IdTutorado where reporte.IdTutor=:idtutor
ORDER BY NombreTutorado ASC");  
$sentenciaSQL2->bindParam(':idtutor',$id);
$sentenciaSQL2->execute();
$alumno = $sentenciaSQL2->fetchAll(PDO::FETCH_OBJ);
$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, canalizacion.Tipo,
Canalizacion.HoraAtend FROM tutorados 
JOIN canalizacion ON tutorados.IdTutorado = canalizacion.IdTutorado 
ORDER BY tutorados.NombreTutorado ASC");  
$sentenciaSQL1->execute();
$atendidas = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, canalizacion.Tipo,
impact.AssDep FROM tutorados 
JOIN canalizacion ON tutorados.IdTutorado = canalizacion.IdTutorado 
JOIN impact ON canalizacion.idTutorado = impact.idTutorado
ORDER BY tutorados.NombreTutorado ASC");  
$sentenciaSQL1->execute();
$Impacto = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);



//actualizar tabla alumnos
     if(isset($_POST['opcion'])){
           $opcion = $_POST['opcion'];
        }else{
            $opcion = '';
        } 



//tutor con nombre retrun id 
//SELECT IdTutor FROM `tutor` WHERE NombreTutor = 'blanca ramirez' 
// agregar tutor
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//
?>  

<body>
    <form class="form-radio" method="post" >
        <p>
            <h4 class="titulo-boton">Reportes Tutoria</h4>
            <h4 class="titulo-boton2">Reportes de Canalizacion</h4>
    </form>
    <form class="reportes" method="post" >
                <input type="submit" name="opcion" value="tutores" class="btn btn-primary" <?php if($opcion == "tutores") echo "checked"; ?>> 
            
                <input type="submit" id="opcion" name="opcion" value="tutorados" class="btn btn-primary" <?php if($opcion == "tutorados") echo "checked"; ?>> 
                <input type="submit" name="opcion" value="Atendidas" class="btn btn-primary" <?php if($opcion == "Atendidas") echo "checked"; ?>> 
                 <input type="submit" name="opcion" value="Impacto" class="btn btn-primary" <?php if($opcion == "Impacto") echo "checked"; ?>> 
                 </form>
                </p>
   
    <form class="form-tutorado" method="post" >

        <div  div class="table-responsive">
            <table id = "example" class="table table-bordered table-striped table-hover"  width="100%">
           
            
                <thead>
                <?php if($opcion == 'tutores') {
                    echo"<tr>
                        <th >Nombre Del Tutor</th>
                        <th>Desertaron</th>
                        <th>Acreditaron</th>
                        <th>No Acreditaron</th>
                        <th>Total De Estudiantes Atendidos</th>
                        <th>Tutoria Individual</th>
                        <th>Tutoria Grupal</th>
                        <th>Numero de estudiantes Canalizados</th>
                        <th>Conferencias</th>
                        <th>Talleres</th>
                    </tr>";
                    }else if($opcion == 'tutorados'){
                        echo"<tr>
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
                        <th>Estatus</th>
                        <th>Nivel Numerico</th>
                        <th>Nivel De Desempeño</th>

                    </tr>";
                    }else if($opcion == 'Atendidas'){
                        echo"<tr>
                        <th >Nombre Del Alumno</th>
                        <th>No. Control</th>
                        <th>Tipo de Canalizacion</th>
                        <th>Horas Atendidas</th>
                        </tr>";
                    }else if($opcion == 'Impacto'){
                        echo"
                        <th >Nombre Del Tutorado</th>
                        <th>No. Control</th>
                        <th>Tipo de Canalizacion</th>
                        <th>Impacto</th>
    
                    </tr>";
    
                  }else{
                        echo"<tr>
                        <th >Nombre Del Tutor</th>
                        <th>Desertaron</th>
                        <th>Acreditaron</th>
                        <th>No Acreditaron</th>
                        <th>Total De Estudiantes Atendidos</th>
                        <th>Tutoria Individual</th>
                        <th>Tutoria Grupal</th>
                        <th>Numero de estudiantes Canalizados</th>
                        <th>Conferencias</th>
                        <th>Talleres</th>
                    </tr>";
                    }
                ?>
                </thead>
                <tbody>

                 <?php if($opcion == "tutores") {
                 foreach($tutor as $result)  
                echo "<tr>
                <td>".$result -> Tutor."</td>
                <td>".$result -> Deserto."</td>
                <td>".$result -> Acredito."</td>
                <td>".$result -> Noacredito."</td>
                <td>".$result -> total."</td>
                <td>".$result -> HoraSesionIndiv."</td>
                <td>".$result -> HoraSesionGrup."</td>
                <td>".$result -> cana."</td>
                <td>".$result -> Conferencias."</td>
                <td>".$result -> Talleres."</td>
                    </tr>"; 
                 }else
                     if($opcion == "tutorados"){
                    foreach($alumno as $result)  
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
                    <td>".$result -> Estatus."</td>
                    <td>".$result -> EvaValor."</td>
                    <td>".$result -> EvalNivel."</td>
                    </tr>"; 

                    }else if($opcion == 'Impacto'){
                        foreach($Impacto as $result)  
                    echo "<tr>
                    <td>".$result -> NombreTutorado."</td>
                    <td>".$result -> IdTutorado."</td>
                    <td>".$result -> Tipo."</td>
                    <td>".$result -> AssDep."</td>
    
                    </tr>"; 
                     }else if($opcion == 'Atendidas'){
                        foreach($atendidas as $result)  
                    echo "<tr>
                    <td>".$result -> NombreTutorado."</td>
                    <td>".$result -> IdTutorado."</td>
                    <td>".$result -> Tipo."</td>
                    <td>".$result -> HoraAtend."</td>
    
                    </tr>"; 
                     }else{
                        foreach($tutor as $result)  
                        echo "<tr>
                        <td>".$result -> Tutor."</td>
                        <td>".$result -> Deserto."</td>
                        <td>".$result -> Acredito."</td>
                        <td>".$result -> Noacredito."</td>
                        <td>".$result -> total."</td>
                        <td>".$result -> HoraSesionIndiv."</td>
                        <td>".$result -> HoraSesionGrup."</td>
                        <td>".$result -> cana."</td>
                        <td>".$result -> Conferencias."</td>
                        <td>".$result -> Talleres."</td>
                            </tr>"; 
                   }
                   
                    
                ?>

                
                </tbody>

            </table>
        </div>
        <br>

    </form>

        <a id="boton" href="menuJD.php" >
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-lg" id="botones">Regresar</button>
                </div>
            </div>
    </div>
        </a>
      
     <!-- jQuery, Popper.js, Bootstrap JS -->
 


</body>




<?php include("template/pie.php"); ?>