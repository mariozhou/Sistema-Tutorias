<?php include("template/cabeceraAlumno-MostrarPedirAyuda.php"); ?>
    <div class="ren-arriba">
        <h3>Por favor seleccione el tipo de ayuda que desea solicitar. Pronto se atenderá su solicitud</h3>
    </div>
    <div class="contenido">
        <form action="" method="post">
            <div class="colum-izq">
                <div>
                    <input type="radio" id="ayuda" name="opciones" value="psicologico">
                    <label for="ayuda">Deseo solicitar ayuda psicologica</label>
                    
                </div>

                <div>
                    <input type="radio" id="asesoria" name="opciones" value="asesorias">
                    <label for="asesoria">Ocupo Asesorias para una materia</label>
                    
                </div>
                
                <div>
                    <input type="radio" id="problema" name="opciones" value="problema">    
                    <label for="problema">Tengo un inconveniente con maestro/tutor</label>
                </div>
            </div>    

            <div class="colum-der">
                <label for="asunto">Motivo del asunto</label><br>
                <textarea name="motivo" id="asunto" cols="30" rows="10"></textarea>
            </div>
            <div class="ren-abajo">
                <button class="botones" name="accion" type="submit" value="Regresar">Regresar</button>
                <button class="botones" name="accion" type="submit" value="Guardar">Guardar</button>
            </div>  
        </form> 
    </div>  
<?php include("template/pie.php"); ?>