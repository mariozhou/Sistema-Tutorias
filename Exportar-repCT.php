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
$sentenciaSQL1 = $conexion->prepare("SELECT * FROM `tutor`  ORDER BY  NombreTutor ASC");  
$sentenciaSQL1->execute();
$tutor = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);

//datos de los tutorados de un tutor
$sentenciaSQL2 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, reporte.Psicologia,
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
$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor as Tutor,SUM(r.deserto) as Deserto, 
SUM(r.Acredito) as Acredito, SUM(r.Noacredito) as Noacredito,  
r.deserto + r.Acredito + r.Noacredito as total,
r.HoraSesionIndiv, r.HoraSesionGrup, SUM(r.Psicologia+r.Asesoria) as cana, 
SUM(r.Conferencias) as Conferencias, SUM(r.Talleres) as Talleres FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor  Group BY m.NombreTutor ASC");  
$sentenciaSQL->execute();
$tutores = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

?>  

<body>
<form class="form-radio" method="post" >
        <p>
         <button type="submit" name="opcion" value="tutores" class="btn btn-primary" <?php if($opcion == "tutores") echo "checked"; ?>> 
            Todos los tutores
        </button>
        </p>

    <div class="form-group">       
      <br>
      <label for="No.Control"><h5>Seleccionar Tutor</h5></label>
       <br>
      <select class="form-select col-md-6" name="select" id="inputGroupSelect01" onChange="this.form.submit()">
      <option selected> <?php if(isset($_POST['select']) ){echo $id; }else{echo 'Tutor'; } ?> </option>
      <?php foreach($tutor as $row): //llenar combobox con Tutores?>  
                <option value="<?php echo$idsq= $row->IdTutor;?>"> 
                <?php echo $select =$row->NombreTutor.' '.$row->IdTutor; $_POST['idsql']=$select;?>
                
                </option>
            <?php endforeach ?>  
            <?php   ?>
      </select>
    </div>
    </form>

    <form class="form-tutorado" method="post" >
        <div  max-width="1400px">
            <table id="example" class="table table-bordered" max-width="1400px"> 

                
                    <?php if($opcion == 'tutores') {
                   echo"<thead>
                    <tr><th >Nombre Del Tutor</th>
                        <th>Desertaron</th>
                        <th>Acreditaron</th>
                        <th>No Acreditaron</th>
                        <th>Total De Estudiantes Atendidos</th>
                        <th>Tutoria Individual</th>
                        <th>Tutoria Grupal</th>
                        <th>Numero de estudiantes Canalizados</th>
                        <th>Conferencias</th>
                        <th>Talleres</th></tr>
                </thead>
                <tbody>";
                  foreach($tutores as $result) { 
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
                <td>".$result -> Talleres."</td></tr>"; }      
                
                echo "</tbody>";
            }else if (isset($_POST['select']) ) {
                
                echo "<thead>
                    <tr><th >Nombre Del Tutorado</th>
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
                <tbody>";

                  foreach($alumno as $result) { 
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
                   } ?>
                    
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