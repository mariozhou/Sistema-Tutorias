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



 
//cosulta tutores 
include("config/bd.php");//conexion
if(isset($_POST['select'])){
$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor, r.IdTutorado, Count(r.deserto), 
Count(r.Acredito), Count(r.Noacredito), r.deserto + r.Acredito + r.Noacredito,
r.HoraSesionIndiv, r.HoraSesionGrup, Count(r.Psicologia+r.Asesoria), 
Count(r.Conferencias), Count(r.Talleres) FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor  Group BY m.NombreTutor ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
}
//actualizar tabla alumnos
$sentenciaSQL = $conexion->prepare("SELECT * FROM `tutor`  ORDER BY  NombreTutor ASC");  
$sentenciaSQL->execute();
$alumno = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$sentenciaSQL1 = $conexion->prepare("SELECT tutorados.NombreTutorado,
tutorados.IdTutorado, canalizacion.Tipo,
Canalizacion.Materia, FROM tutorados 
JOIN canalizacion ON tutorados.IdTutorado = canalizacion.IdTutorado 
ORDER BY NombreTutorado ASC");  
$sentenciaSQL1->execute();
$asesoria = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);


$id=(isset($_POST['select']))?$_POST['select']:"";
$_POST['idsql']=$id;




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
            Elige una opcion<br>
            
                 <input type="submit" name="opcion" value="Canalizacion" class="btn btn-primary" <?php if($opcion == "Canalizacion") echo "checked"; ?>> 
        </p>
    </form>
    <form action="" method="post" class="form-group">
     <div class="form-group">       

      <br>
      <label for="No.Control"><h5>Seleccionar Tutor</h5></label> <br>
      <select class="form-select col-md-6" name="select" id="inputGroupSelect01" onChange="this.form.submit()">
      <option selected> <?php if(isset($_POST['select']) ){echo $id; }else{echo 'Tutor'; } ?> </option>
      <?php foreach($alumno as $row): //llenar combobox con Tutores 
                 ?>  
                <option value="<?php echo$idsq= $row->IdTutor;?>"> 
                <?php echo $select =$row->NombreTutor.' '.$row->IdTutor; $_POST['idsql']=$select;?>
                
                </option>
            <?php endforeach ?>  
            <?php   ?>
      </select>
    </div>
    </form>     

        <div  max-width="1400px">
            <table id="example" class="table table-bordered" max-width="1400px"> 
            <?php if($opcion == 'Canalizacion'){
                        echo"<tr>
                        <th >Nombre Del Alumno</th>
                        <th>No. Control</th>
                        <th>Tipo de Canalizacion</th>
                        <th>Materia</th>
                        </tr>";
                    }else{
                <thead>
                    echo"<tr>
                    <th >Nombre Del Tutor</th>
                    <th >Nombre Del Tutorado</th>
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
                  } ?>
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
                 }else 
                 if(isset($_POST['select'])){
                     foreach($tutor as $result) { 
                echo "<tr>
                <td>".$result -> NombreTutor."</td>
                <td>".$result -> NombreTutorado."</td>
                <td>".$result -> Deserto."</td>
                <td>".$result -> Acredito."</td>
                <td>".$result -> Noacredito."</td>
                <td>".$result -> Noacredito."</td>
                <td>".$result -> HoraSesionIndiv."</td>
                <td>".$result -> HoraSesionGrup."</td>
                <td>".$result -> Conferencias."</td>
                <td>".$result -> Talleres."</td>
                <td>".$result -> Psicologia."</td>

                  
                    </tr>"; }
                }      
                ?>

                
                </tbody>
                <tbody>




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