<?php include("template/cabeceraAlumno-SubirExpediente.php"); ?>
<?php
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$myfile=(isset($_FILES['myfile']['name']))?$_FILES['myfile']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

echo   $txtNombre."<br/>";
echo   $myfile."<br/>";
echo   $accion."<br/>";

$host="localhost"; //esto lo cambia zhou
$bd="sitio";
$usuario="root";
$contraseña="";



switch($accion){
    case "Guardar":
        //insert into 'tabla' ('id', 'nombre', 'documento') values (null, 'Jose Luis', 'encuestaXD.docx');
        echo "Presionado boton guardar";
        break;
    case "Regresar":
        echo "Presionado boton Regresar";
        break;
    //case "seleccionar":
    //    echo "Presionado boton seleccionar";
    //    break;
    case "Borrar":
        echo "Presionado boton guardar";
        break;        
}

?>
<div class="ren-arriba">
    <h2>Links disponibles</h2>
    <a href="https://www.google.com/">Expediente</a>
    
</div>
<div class="col-izq">
    <div class="card">
        <div class="card-header">
            Subir Archivos
        </div>
        <div class="card-body">
            <form class="form-subirExpediente" method="POST" enctype="multipart/form-data">
                <label for="txtNombre">Nombre</label><br>
                <input type="text" name="txtNombre" class="txt-input" ><br>

                <label for="txtID">Documento</label><br>
                <input type="file" id="myfile" name="myfile">
                <div>
                    <button class="botones" name="accion" type="submit" value="Regresar">Regresar</button>
                    <button class="botones" name="accion" type="submit" value="Guardar">Guardar</button>
                </div>
            </form>
        </div>
        
    </div>
    
</div>
<div class="col-der">
    <div class="tableFixHead">
        <table> 
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Expediente</td>
                    <td>XD</td>
                    <td>

                        <form method="post">
                            <input type="submit" name="accion" value="Borrar" class="btn-tabla"/>
                            <input type="submit" name="accion" value="Mostrar" class="btn-tabla"/>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
         
       
        
<?php include("template/pie.php"); ?>