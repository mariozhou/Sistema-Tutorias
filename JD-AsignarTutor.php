<?php include("template/cabeceraJD-AsignarTutor.php"); ?>
    
    <form action="" class="form-tutor">
        <h2 style="text-align:center;">Asignar/Eliminar Tutor</h2><br>
        <label for="">Nombre</label>
        <input type="text" name="Nombre">

        <label for="" style="margin-left:50px;">RFC</label>
        <input type="text" name="RFC"> <br>

        <div class="tableFixHead">
            <table style="width:100%"> 
                <thead>
                    <tr>
                        <th style="width:70%">Nombre</th>
                        <th>RFC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mariza</td>
                        <td>MAR650112RE</td>
                    </tr> 
                    <tr>
                        <td>Sonia</td>
                        <td>ALMA650112RE</td>
                    </tr>   
                </tbody>
            </table>
        </div>

        <div>
            <button class="botones" type="submit" value="Regresar">Regresar</button>
            <button class="botones" type="submit" value="Guardar">Guardar</button>
            <button class="botones" type="submit" value="Eliminar">Eliminar</button>
            
        </div>
    </form> 
<?php include("template/pie.php"); ?>