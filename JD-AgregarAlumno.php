<?php include("template/cabeceraJD-AsignarTutor.php"); ?>

<?php

//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `tutorados`  ORDER BY NombreTutorado ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

$nom=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
$rfc=(isset($_POST['RFC']))?$_POST['RFC']:"";
$semestres=(isset($_POST['semestres']))?$_POST['semestres']:"";

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
    <form action="config\JD-AgregarAlumnoSQL.php" class="form-tutor" method="post">

        <h2 style="text-align:center;">Agregar Alumno</h2><br>
        <label for="">Nombre</label>
        <input type="text" name="Nombre" required>

        <label for="" style="margin-left:30px;">Usuario</label>
        <input type="text" name="RFC" required> <br>

        <label for="" style="margin-left:20px;">Semestres</label>
        <input type="number" name="semestres" required> <br>

        <div class="tableFixHead">
            <table style="width:100%"> 
                <thead>
                    <tr>
                        <th style="width:60%">Nombre</th>
                        <th>Usuario</th>
                        <th>Semestres</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tutor as $val) { 
                    ?>
                                <tr>
                           <!--     <td><input type='checkbox' name='check[]' value='<?//php $val -> IdUser ?>'></></td>  -->
                                    <td><?php echo $val -> NombreTutorado ?></td>
                                    <td><?php echo $val -> IdTutorado  ?></td>
                                    <td><?php echo $val -> Semestres  ?></td>
                             
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