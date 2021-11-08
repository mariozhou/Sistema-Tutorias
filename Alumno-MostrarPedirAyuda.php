<?php include("template/cabeceraAlumno-MostrarPedirAyuda.php"); ?>
<?php
 include("config/bd.php");//conexion
 $nombre=$_SESSION['nombre'];
 $sentenciaSQL1= $conexion->prepare("SELECT IdTutorado FROM `tutorados` WHERE NombreTutorado = :nombre");
 $sentenciaSQL1->bindParam(':nombre',$nombre);
 $sentenciaSQL1->execute();
 echo $id=($sentenciaSQL1->fetchColumn());
 echo '  Guardar:'.$guardar=(isset($_POST['opciones']))?$_POST['opciones']:"";
 echo '  comentarios:'.$comentario=(isset($_POST['motivo']))?$_POST['motivo']:"";


 if($guardar == "problema" ){//problema con tutor
    $sentenciaSQL2 = $conexion->prepare("INSERT INTO `cambiartutor`( `IdTutorado`, `Mensaje`) VALUES (:id,:comentario)");  
     $sentenciaSQL2->bindParam(':id',$id);
     $sentenciaSQL2->bindParam(':comentario',$comentario);
     $sentenciaSQL2->execute();
}elseif ($guardar == "psicologico" ) {
     $sentenciaSQL3 = $conexion->prepare("INSERT INTO `canalizacion`( `IdTutorado`,`Tipo`, `Comentarios`) VALUES (:id,'psicologico',:comentario)");  
     $sentenciaSQL3->bindParam(':id',$id);
     $sentenciaSQL3->bindParam(':comentario',$comentario);
     $sentenciaSQL3->execute();
}elseif ($guardar == "asesoria") {
    $sentenciaSQL3 = $conexion->prepare("INSERT INTO `canalizacion`( `IdTutorado`,`Tipo`, `Comentarios`) VALUES (:id,'asesorias',:comentario)");  
    $sentenciaSQL3->bindParam(':id',$id);
    $sentenciaSQL3->bindParam(':comentario',$comentario);
    $sentenciaSQL3->execute();
}
?>
    

<div class="ren-arriba">
        <h3>Por favor seleccione el tipo de ayuda que desea solicitar. Pronto se atenderá su solicitud</h3>
    </div>
    <div class="contenido">
        <form action=""  method="post">
            <div class="colum-izq">
                <div>
                    <input type="radio" id="opciones" name="opciones" value="psicologico">
                    <label for="ayuda">Deseo solicitar ayuda psicologica</label>
                    
                </div>

                <div>
                    <input type="radio" id="opciones" name="opciones" value="asesorias">
                    <label for="asesoria">Ocupo Asesorias para una materia</label>
                    
                </div>
                
                <div>
                    <input type="radio" id="opciones" name="opciones" value="problema">    
                    <label for="problema">Tengo un inconveniente con maestro/tutor</label>
                </div>
            </div>    

            <div class="colum-der">
                <label for="asunto">Motivo del asunto</label><br>
                <textarea name="motivo" id="asunto" cols="30" rows="10"></textarea>
            </div>
           
            <div class="ren-abajo">
  
                <button class="botones" name="accion"value="Regresar" >
                    <a style="text-decoration:none" href="menuAlumno.php">Regresar</a>
                </button>
                <button class="botones" name="accion" type="submit" value="Guardar">Guardar</button>
            </div>  
        </form> 
    </div>  

<?php include("template/pie.php");
//<a href="Alumno-MostrarPedirAyuda.php">
?>