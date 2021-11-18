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
$sentenciaSQL = $conexion->prepare("SELECT m.NombreTutor as Tutor,Count(r.deserto) as Deserto, 
Count(r.Acredito) as Acredito, Count(r.Noacredito) as Noacredito,  
r.deserto + r.Acredito + r.Noacredito as total,
r.HoraSesionIndiv, r.HoraSesionGrup, Count(r.Psicologia+r.Asesoria) as cana, 
Count(r.Conferencias) as Conferencias, Count(r.Talleres) as Talleres FROM tutor as m 
Join reporte as r ON m.IdTutor = r.Idtutor  Group BY m.NombreTutor ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
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
                        <th>Acreditaron</th>
                        <th>No Acreditaron</th>
                        <th>Total De Estudiantes Atendidos</th>
                        <th>Tutoria Individual</th>
                        <th>Tutoria Grupal</th>
                        <th>Numero de estudiantes Canalizados</th>
                        <th>Conferencias</th>
                        <th>Talleres</th>
 
                    </tr>
                </thead>
                <tbody>

                 <?php foreach($tutor as $result) { 
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
            <button type="button" class="btn btn-primary">Regresar</button>
        </a>
      
     <!-- jQuery, Popper.js, Bootstrap JS -->
 


</body>




<?php include("template/pie.php"); ?>