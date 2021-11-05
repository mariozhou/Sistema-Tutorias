<?php include("template/cabecera.php"); ?>

<?php
 $rango=(isset($_POST['range-semestre']))?$_POST['range-semestre']:"";
 echo '  tutor:'.$asigtutor=(isset($_POST['tutor']))?$_POST['tutor']:"";
 echo ' noc2'.$noct2=(isset($_POST['Ncontrol']))?$_POST['Ncontrol']:"";

 
//cosulta tutores 
include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where TipoUser='Tutor' ORDER BY Nombre ASC");  
$sentenciaSQL->execute();
$tutor = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
$btnbuscar2 = (isset($_POST["btnbuscar2"]));
$asignar = (isset($_POST["btnasignar"]));
//actualizar tabla alumnos
if($rango == 0  And (isset($_POST["btnbuscar1"]))){
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 1) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 1 and 5 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 2 And (isset($_POST["btnbuscar1"]))) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres BETWEEN 6 and 8 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ($rango == 3 And (isset($_POST["btnbuscar1"]))) {
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE tutorados.Semestres >= 9 ORDER BY Nombre ASC");  
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
}elseif ( strlen($noct2) > 1 And $btnbuscar2  )  { //buscar por noctol
    $sentenciaSQL1 = $conexion->prepare("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser WHERE  IdUser=:noctl ");  
    $sentenciaSQL1->bindParam(':noctl',$noct2);
    $sentenciaSQL1->execute();
    $alumno = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);
   $btnbuscar2="";
}elseif ( strlen($noct2) > 1 And (isset($_POST["btnquitar"])) ) { //quiar alumno por noctol
    echo $asd ='quitar';
    $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor ='' ) WHERE IdTutorado= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$noct2);
    //$sentenciaSQL2->bindParam(':tutor',$asigtutor);
    $sentenciaSQL2->execute();
}elseif (  $asignar ) { //quiar alumno por noctol
    echo $asd ='asignar';
    $sentenciaSQL2 = $conexion->prepare("UPDATE tutorados SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado= :noctl ");  
    $sentenciaSQL2->bindParam(':noctl',$noct2);
    $sentenciaSQL2->bindParam(':tutor',$asigtutor);
    $sentenciaSQL2->execute();
    $asignar ="";
    //$alumno = $sentenciaSQL2->fetchAll(PDO::FETCH_OBJ);
    //$noct2="";
}

echo ' novt2:'.$noct2;
//tutor con nombre retrun id 
//SELECT IdTutor FROM `tutor` WHERE NombreTutor = 'blanca ramirez' 
// agregar tutor
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//UPDATE `tutorados` SET `IdTutor`=(SELECT IdTutor FROM `tutor` WHERE NombreTutor =:tutor ) WHERE IdTutorado = :noctl
//
?>  

<body>
    <form class="form-tutorado" method="post" >
        <label> Tutor</label>
        <select name="tutor">
        <option >Tutores</option>
            <?php foreach($tutor as $row): //llenar combobox con Tutores 
                 ?>  
                <option value="<?php echo $row->Nombre; ?>">
                <?php echo $row->Nombre; ?>
                </option>
            <?php endforeach ?> 
        </select> <br>

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
        <button class="botones" name="btnbuscar2" type="submit" value="Buscar">Buscar</button><br>

        <div class="tableFixHead">
            <table style="width:100%"> 
                <thead>
                    <tr>
                        <th style="width:70%">Nombre</th>
                        <th>No.Control</th>
                        <th>Semestre</th>
                    </tr>
                </thead>
                <tbody>

                 <?php foreach($alumno as $result) { 
            echo "<tr>
                    <td>".$result -> Nombre."</td>
                    <td>".$result -> IdUser."</td>
                    <td>".$result -> Semestres."</td>
                </tr>"; }      
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <button class="botones" type="submit" value="Regresar">Regresar</button>
            <button class="botones" name="btnasignar" type="submit" value="Asignar">Asignar</button>
            <button class="botones" name="btnquitar" type="submit" value="Quitar">Quitar</button>
        </div>
    </form>
</body>

<?php include("template/pie.php"); ?>