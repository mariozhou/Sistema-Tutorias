<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<?php include("template/cabecera.php"); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
$asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
$noct2=(isset($_POST['Ncontrol']))?$_POST['Ncontrol']:"";
 $date =(isset($_POST['demo']))?$_POST['demo']:"";

//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where TipoUser='Tutor' ORDER BY Nombre ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
$asignar = (isset($_POST["btnasignar"]));
$buscar =(isset($_POST["btnbuscar1"]));

//tabla estudiante
$tmp = array();
$res = array();
include('config/conexion.php');
$sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
    $if = "0";
}


//actualizar tabla alumnos
if($rango == 0  And (isset($_POST["btnbuscar1"])) ){
$tmp = array();
$res = array();
$sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);}

}elseif ($rango == 1) {
    $tmp = array();
    $res = array();
    $sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 1 and 5 ORDER BY Nombre ASC");
    while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);}

}elseif ($rango == 2 And (isset($_POST["btnbuscar1"]))) {
    $tmp = array();
    $res = array();
    $sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 6 and 8 ORDER BY Nombre ASC");
    while ($row = $sel->fetch_assoc()) {
        $tmp = $row;
        array_push($res, $tmp);}

}elseif ($rango == 3 And (isset($_POST["btnbuscar1"])) ) {
    $tmp = array();
    $res = array();
    $sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres >= 9 ORDER BY Nombre ASC");
    while ($row = $sel->fetch_assoc()) {
        $tmp = $row;
        array_push($res, $tmp);}

}elseif ( strlen($noct2) > 1  And isset($_POST["btnbuscar2"]) )  { //buscar por noctol

$tmp = array();
$res = array();
$sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE  IdUser=$noct2");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);}

}elseif (  (isset($_POST["btnquitar"])) ) { //quiar alumno por noctol
   /* echo $asd ='quitar';
    foreach( $_POST['check'] AS $value  ){
    $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor ='' ) WHERE IdTutorado= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$value);
    $sentenciaSQL2->execute();
    }*/
}elseif (  isset($_POST["btnasignar"])  ) { //quiar alumno por noctol
   /* if( isset($_POST['check'] ) ) {
        echo $asd ='asignar';
        foreach( $_POST['check'] AS $value  ){
            $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado= :noctl ");  
            $sentenciaSQL2->bindParam(':noctl',$value);
            $sentenciaSQL2->bindParam(':tutor',$asigtutor);
            $sentenciaSQL2->execute();
            
        }
    }else{
       echo "<br />"."No Seleciona Ningun Alumnos";
    }
   */
}

//tutor con nombre retrun id 
//SELECT IdTutor FROM `tutor` WHERE NombreTutor = 'blanca ramirez' 
// agregar tutor
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//

?>  



<body>
    <form class="form-tutorado" method="post" >
        <label  style= "margin-top: 30px; margin-left: 50px; margin-bottom: 30px;"> Tutorados </label><br>
        <label> Rango de semestres</label>
        <select name="range-semestre" id="range-semestre" onchange="myFunction()">  
            <option value=0>Todos</option>    
            <option value=1>1-5</option>
            <option value=2>6-8</option>
            <option value=3>8-12 o mas</option>
            
        </select>
        <button class="botones" name="btnbuscar1" type="submit" value="Buscar">Buscar</button><br>
        <label for="" style= "margin-left: 50px;"> No. Control</label>
        <input type="text" name="Ncontrol" id="Ncontrol" >
        <button class="botones" name="btnbuscar2" type="submit" value="Buscar2">Buscar</button><br>
            </form>
                
            <form class="form-tutorado" method="post" action="config/asignar-quitarTutoradosSQL.php">
                
        <label>Tutor</label style= "margin-left: 60px;"> 
        <select name="tutor" >
        <option >Tutores</option>
            <?php foreach($tutor as $row): //llenar combobox con Tutores 
                 ?>  
                <option value="<?php echo $row->Nombre; ?>">
                <?php echo $row->Nombre.'  '.$row->IdUser; ?>
                </option>
            <?php endforeach ?> 
        </select> 
        <label style= "margin-left: 50px;">Periodo: <a id="demo"></a>
        </label>        
            <script type="text/javascript">
                const d = new Date();
                let day = d.getMonth() +1
            
                if(day == 8 || day == 9 || day == 10 || day == 11 || day == 12 ){
                    document.getElementById("demo").innerHTML = "Agosto-Diciembre";
                   // javascript_to_php(2)
                }else {
                    document.getElementById("demo").innerHTML = "Febrero-Julio";
                   // javascript_to_php(1)
                }

                var variableLongitud = -34.6033415;
                var variableLatitud = -58.3815275;
                $.ajax({
                    type: 'POST',
                    url: 'asignar-quitarTutoradosSQL',
                    dataType: 'html',
                    data: {latitud:variableLatitud, longitud:variableLongitud},
                    success: function(data) {
                        alert('datos enviados a php correctamente!');
                    }
                });
            </script>
        
   
        <div class="tableFixHead">
            <table style="width:100%" id="example" class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>#</th>    
                        <th style="width:70%">Nombre</th>
                        <th>No.Control</th>
                        <th>Semestre</th>    
                        <th>Tutor</th>  
                    </tr>
                </thead>
                <tbody>

                        <?php foreach ($res as $val) {
                            $id= $val['IdTutorado']; ?>
                                <tr>
                                    <td><input type='checkbox' name='check[]' value='<?php echo $id ?>'></></td>    
                                    <td><?php echo $val['Nombre'] ?> </td>
                                    <td><?php echo $val['IdTutorado'] ?></td>
                                    <td><?php echo $val['Semestres'] ?></td>
                                    <td><?php echo $val['IdTutor'] ?></td>
                    
                                </tr>
                                    <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('config/ModalEliminar.php'); ?>
                            <?php } ?>

                </tbody>
            </table>
        </div>
        <br>
        <div>
            <a id="boton" href="menuCT.php">
            <button  class="botones"  type="button" value="Regresar">Regresar</button>
                 </a>
            <button class="botones" name="btnasignar" type="submit" value="Asignar">Asignar</button>
            <button class="botones" name="btnquitar" type="submit" value="Quitar">Quitar</button>
        </div>
    </form>

      <!-- jQuery, Popper.js, Bootstrap JS -->
      <script src="datatable/jquery/jquery-3.3.1.min.js"></script>
    <script src="datatable/popper/popper.min.js"></script>
    <script src="datatable/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatable/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    
    
</body>

<?php include("template/pie.php"); ?>