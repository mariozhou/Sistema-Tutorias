<?php include("template/cabeceraJD-AsignarTutor.php"); ?>

<?php

//cosulta tutores 

$tmp = array();
$res = array();
include('config/conexion.php');
$sel = $con->query("SELECT * FROM `usuario` Where TipoUser='Tutor' Or TipoUser='' ORDER BY Nombre ASC");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
    
}

$nom=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
$rfc=(isset($_POST['RFC']))?$_POST['RFC']:"";
$select=(isset($_POST['select']))?$_POST['select']:"";
if( (isset($_POST["Nombre"])) ){

/*
 $sentenciaSQL1 = $conexion->prepare("INSERT INTO `usuario`(`IdUser`, `Nombre`, `Password`, `TipoUser`) VALUES (:rfc,:nombre,'123456','Tutor')" );  
 $sentenciaSQL1->bindParam(':nombre',$nom);
 $sentenciaSQL1->bindParam(':rfc',$rfc);
 $sentenciaSQL1->execute();

*/
}else{
     $si="noo";
}
  
   
?>
        

    <form action="config\JD-AsigarTutorSQL.php" class="form-tutor" method="post">
       <h2 style="text-align:center;">Asignar Tutor</h2><br>
     <!--    <label for="">Nombre</label>
        <input type="text" name="Nombre" required>

        <label for="" style="margin-left:10px;">Usuario</label>
        <input type="text" name="RFC" required> <br>
-->
        <div class="tableFixHead">
            <table style="width:100%"> 
                <thead>
                    <tr><th>#</th>
                        <th style="width:70%">Nombre</th>
                        <th>Usuario</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($res as $val) { 
                     $id= $val['IdUser']; ?>
                    
                                <tr>
                                <td><input type='checkbox' name='check[]' value='<?php echo $id ?>'></></td> 
                                    <td><?php echo $val['Nombre']  ?></td>
                                    <td><?php echo $val['IdUser']  ?></td>
                                    <td><?php echo $val['TipoUser'] ?></td>
                                    
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>

        <div>
        <a id="boton" href="menuJD.php">
            <button class="botones" type="button" value="Regresar">Regresar</button>
                </a>
            <button class="botones" type="submit" value="Guardar" onclick="doUnset()";>Guardar</button>
       <!--     <button class="botones" type="submit" value="Eliminar">Eliminar</button> -->
            
        </div>
    </form> 


<?php include("template/pie.php"); ?>