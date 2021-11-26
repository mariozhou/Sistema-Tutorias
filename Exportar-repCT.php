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
//actualizar tabla 
$id=(isset($_POST['select']))?$_POST['select']:"";
$_POST['idsql']=$id;




if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
 }else{
     $opcion = '';
 } 
 
 //para el combobox de tutor


//datos de los tutorados de un tutor
$sentenciaSQL2 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, reporte.Psicologia, reporte.Psicologia + reporte.Conferencias + reporte.Talleres as total,
reporte.Asesoria, reporte.Actividad, reporte.Conferencias,
reporte.Talleres, reporte.HoraSesionIndiv,  
reporte.HoraSesionGrup, reporte.EvaValor, reporte.EvalNivel, 
reporte.Acredito,reporte.Noacredito,reporte.Deserto,
reporte.AcreditadoSegui FROM tutorados 
JOIN reporte ON tutorados.IdTutorado = reporte.IdTutorado where reporte.IdTutor=:idtutor
ORDER BY NombreTutorado ASC");  
$sentenciaSQL2->bindParam(':idtutor',$id);
$sentenciaSQL2->execute();
$alumno = $sentenciaSQL2->fetchAll(PDO::FETCH_OBJ);

//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor as Tutor,Count(r.deserto) as Deserto, 
Count(r.Acredito) as Acredito, Count(r.Noacredito) as Noacredito,  
r.deserto + r.Acredito + r.Noacredito as total,
r.HoraSesionIndiv, r.HoraSesionGrup, Count(r.Psicologia+r.Asesoria) as cana, 
Count(r.Conferencias) as Conferencias, Count(r.Talleres) as Talleres FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor  where r.IdTutor=:idtutor
 Group BY m.NombreTutor ASC");  
$sentenciaSQL->bindParam(':idtutor',$id);
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor as Tutor,Count(r.deserto) as Deserto, 
Count(r.Acredito) as Acredito, Count(r.Noacredito) as Noacredito,  
r.deserto + r.Acredito + r.Noacredito as total,
r.HoraSesionIndiv, r.HoraSesionGrup, Count(r.Psicologia+r.Asesoria) as cana, 
Count(r.Conferencias) as Conferencias, Count(r.Talleres) as Talleres FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor
 Group BY m.NombreTutor ASC");  
$sentenciaSQL->execute();
$tutor1 = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, canalizacion.Tipo,
Canalizacion.Materia FROM tutorados 
JOIN canalizacion ON tutorados.IdTutorado = canalizacion.IdTutorado 
ORDER BY IdTutorado ASC");  
$sentenciaSQL1->execute();
$asesoria = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);


$sentenciaSQL = $conexion->prepare("SELECT * FROM `tutor`  ORDER BY  NombreTutor ASC");  
$sentenciaSQL->execute();
$tutor2 = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

?>  

<body>
<form class="form-radio" method="post" >
        <p>
         <button type="submit" name="opcion" value="tutores" class="btn btn-primary" <?php if($opcion == "tutores") echo "checked"; ?>> 
            Todos los tutores
        </button>
        </p>
        <input type="submit" name="opcion" value="Canalizacion" class="btn btn-primary" <?php if($opcion == "Canalizacion") echo "checked"; ?>> 


    <div class="form-group">       
      <br>
      <label for="No.Control"><h5>Seleccionar Tutor</h5></label> <br>

      <select type='submit' class="form-select col-md-6" name="select" id="inputGroupSelect01" onChange="this.form.submit()">
      <option selected> <?php if(isset($_POST['select']) ){echo $id; }else{echo 'Tutores'; } ?> </option>
      <?php foreach($tutor2 as $row): //llenar combobox con Tutores?>  
                <option value="<?php echo$idsq= $row->IdTutor;?>"> 
                                <?php echo $select =$row->NombreTutor.' '.$row->IdTutor; $_POST['idsql']=$select; ?>


                </option>
            <?php endforeach ?>  
            <?php   ?>
      </select>
    </div>
    </form>

    <form class="form-tutorado" method="post" >
        <div  max-width="1400px">
            <table id="example" class="table table-bordered" max-width="1400px"> 

                <thead>
                    <?php if($opcion == 'tutores'){
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
                
                    }else  if($opcion == 'Canalizacion'){
                    echo"<tr>
                    <th >Nombre Del Alumno</th>
                    <th>No. Control</th>
                    <th>Tipo de Canalizacion</th>
                    <th>Materia</th>
                    </tr>";
                     }else {
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
                        <th>Acredito</th>
                        <th>No Acredito</th>
                        <th>Deserto</th>
                        <th>Ac. En Seguimiento</th>
                        <th>Nivel Numerico</th>
                        <th>Nivel De Desempeño</th>

                    </tr>";}           
                ?>
                </thead>
                <tbody>
                    <?php

                if($opcion == 'Canalizacion'){
                    foreach($asesoria as $result)  
                echo "<tr>
                <td>".$result -> NombreTutorado."</td>
                <td>".$result -> IdTutorado."</td>
                <td>".$result -> Tipo."</td>
                <td>".$result -> Materia."</td>

                </tr>"; 
                 }else if($opcion == "tutores") {
                    foreach($tutor1 as $result)  
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
                
                    foreach($alumno as $result)  {
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
                    <td>".$result -> total."</td>
                    <td>".$result -> Acredito."</td>
                    <td>".$result -> Noacredito."</td>
                    <td>".$result -> Deserto."</td>
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

        <a id="boton" href="menuCT.php">
            <button type="button" class="btn btn-primary">Regresar</button>
        </a>
      
     <!-- jQuery, Popper.js, Bootstrap JS -->
 

</body>

<?php include("template/pie.php"); ?>