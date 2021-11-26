<?php include("./template/cabeceraTutor-MostrarReporteTutor.php"); ?>
<?php


//$sel = $con->query("SELECT * FROM tutorados JOIN usuario ON tutorados.IdTutorado = usuario.IdUser ORDER BY Nombre ASC");
include("config/bd.php");//conexion
$sentenciaSQL1 = $conexion->prepare("SELECT * FROM `tutor` WHERE IdTutor = (SELECT IdTutor FROM `tutorados` WHERE IdTutorado =:idalu)" );  
$sentenciaSQL1->bindParam(':idalu',$iduser);
$sentenciaSQL1->execute();
$tutor = $sentenciaSQL1->fetch(PDO::FETCH_ASSOC);
$_SESSION['iduser']= $iduser;
$_SESSION['nombreTutor']= $tutor["NombreTutor"];
$nombre;

//echo $tutore=(isset($_POST['idtutor']))?$_POST['idtutor']:"";
//$_t=$tutor['IdTutor'];
//echo $_SESSION['idtutor'];
?>
<div class="container" id= "containerCambioTutor">  
    <form action="config/mostrarCambioTutorSQL.php" class="form-group" id="formulario" method="post">

        <div class="form-group">
            <br><br>
            <div class="form-inline" >
                <label for="invidual" class="control-label col-md-3" id="tutor" >Tutor</label>
                <input type="text" disabled="»disabled»" class="form-control col-md-6" placeholder="Nombre" value="<?php echo $tutor['IdTutor'].'  '.$tutor['NombreTutor']; ?> ">
            </div>
        </div>

        <div class="form-group">
            <br><br>
            <label for="motivos" >Menciona tus motivos de cambiar de tutor: </label>
            <div class="form-inline">
                <textarea type="text" class="form-control col-md-11" id="motivos" name="motivos"rows="5" ></textarea>  
            </div>
        </div>

        <div class="container">
            
                <div class="row align-items-start" >
                    <div class="col" >
                        <a href="menuAlumno.php">
                        <button type="button" class="btn btn-primary btn-lg" id="botones">Regresar</button>
                        </a>
                    </div>

                    <div class="col" >
                        <a href="">
                        <button type="submit" class="btn btn-primary btn-lg" >Aceptar</button>
                        </a>
                    </div>
                </div>
        </div>
    </form>
</div> 


<?php include("template/pie.php"); ?>