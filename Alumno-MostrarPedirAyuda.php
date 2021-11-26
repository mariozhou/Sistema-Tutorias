<?php include("template/cabeceraAlumno-MostrarPedirAyuda.php"); ?>
<?php
 include("config/bd.php");//conexion
 $nombre=$_SESSION['nombre'];
 $sentenciaSQL1= $conexion->prepare("SELECT IdTutorado FROM `tutorados` WHERE NombreTutorado = :nombre");
 $sentenciaSQL1->bindParam(':nombre',$nombre);
 $sentenciaSQL1->execute();
 $id=($sentenciaSQL1->fetchColumn());
 $guardar=null;
  '  Guardar:'.$guardar=(isset($_POST['opciones']))?$_POST['opciones']:"";
  '  comentarios:'.$comentario=(isset($_POST['motivo']))?$_POST['motivo']:"";
  $tipo=(isset($_POST['opciones']))?$_POST['opciones']:"";
  $btn=(isset($_POST['accion']))?$_POST['accion']:"";
?>

<div class="ren-arriba">
        <h3>Por favor seleccione una opcion. Pronto se atenderá su solicitud</h3>
    </div>
    <div class="contenido">
        <form action="config/Alumno-MostrarPedirAyudaSQL.php"  method="post"  required>
            <div class="colum-izq">
                <div>
                    <input type="radio" id="opciones" name="opciones" value="Psicologico" required>
                    <label for="ayuda">Deseo solicitar ayuda psicologica</label>
                    
                </div>

                <div>
                    <input type="radio" id="opciones" name="opciones" value="Asesorias Departamental" required> 
                    <label for="asesoria">Ocupo Asesorias Departamental</label>
                       
                </div>
                    
                <div>
                    <input type="radio" id="opciones" name="opciones" value="Asesorias de Ciencias Basicas" required>    
                    <label for="problema">Ocupo Asesorias de Ciencias Basicas</label>
                </div>

                <div>
                    <input type="radio" id="opciones" name="opciones" value="Inconveniente con maestro" required>    
                    <label for="problema">Tengo un inconveniente con maestro</label>
                </div>
    
                <div>
                    <input type="radio" id="opciones" name="opciones" value="Dudas" required>    
                    <label for="problema">Solicitar información/Dudas</label>
                </div>
            </div>       

            <div class="colum-der">   
            <br>
                <label  >Ingresar Materia si es necesario</label>
                <input class="materia" type="text" id="materia" name="materia" placeholder="Materia">  
            <br>
                <textarea required type="text" placeholder="Motivo del asunto" name="motivo" id="asunto" cols="5" rows="10"></textarea>
            </div>
           
            <div class="ren-abajo">

                
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col">
                            <a id="boton" href="menuAlumno.php" >
                                <button type="button" class="btn btn-primary btn-lg" id="botones">Regresar</button>
                            </a>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-lg" name="accion" id="accion">Guardar</button>
                            </div>
                        </div>
                    </div>
            </div>  
        </form> 
    </div>  

<?php include("template/pie.php");
?>