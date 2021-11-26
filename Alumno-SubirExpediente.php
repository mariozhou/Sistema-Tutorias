<?php include("template/cabeceraAlumno-SubirExpediente.php");


include('config/conexion.php');
$tmp = array();
$res = array();
$sel = $con->query("SELECT * FROM files Where IdTutorado = '$id' ");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
}

//"DELETE FROM `files` WHERE `files`.`id` = 2"          
?>       
<br>                      
<div class="container">
    <h2>Entregables</h2>
  <!--  <a href="http://localhost/Sistema-Tutorias/act/Diasgnostico%20inicial.pdf">Diasgnostico Inicial</a><br>-->
    <a href="./files/ficha-de-identificacion.docx">Ficha</a><br>
    <a href="./files/entrevista.docx">Encuesta</a><br>
</div>
<br>
<div class="container">
    <div class="row align-items-start ">   
        <div class="col">
            <h4 style="text-align: right;">Subir Archivos</h4>   
        </div>
        <div class="col">
            <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo
            </button>       
        </div>
            
    </div>
</div>
<br>
    

<div class="row justify-content-md-center">
    <div class="col-8">
        <table class="table">
        
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                 <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                            <?php foreach ($res as $val) { ?>
                                <tr>
                                    <td><?php echo $val['id'] ?> </td>
                                    <td><?php echo $val['title'] ?></td>
                                    <td><?php echo $val['descripction'] ?></td>
                                    <td>
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo Ventana Emergente</button>
                                        <a class="btn btn-primary" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Sistema-Tutorias/' . $val['url']; ?>" >Ver Archivo pagina</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $val['id']; ?>">
                                  Eliminar
                              </button>
                                    </td>
                                </tr>
                                    <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('config/ModalEliminar.php'); ?>
                            <?php } ?>
                            
                        </tbody>
        </table>
   
               
      
          <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="description">archivo</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
                            function onSubmitForm() {
                                var frm = document.getElementById('form1');
                                var data = new FormData(frm);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4) {
                                        var msg = xhttp.responseText;
                                        if (msg == 'success') {
                                            alert(msg);
                                            $('#exampleModal').modal('hide')
                                        } else {
                                            alert(msg);
                                        }

                                    }
                                };
                                xhttp.open("POST", "upload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }

                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Sistema-Tutorias/'; ?>'+url);
                            }
        </script>
    </div>
</div>
         
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });

//Ocultar mensaje
    setTimeout(function () {
        $("#contenMsjs").fadeOut(1000);
    }, 3000);



    $('.btnBorrar').click(function(e){
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id='+ id;
        url = "config/recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="Alumno-SubirExpediente.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>
<br>
<a id="boton" href="menuAlumno.php" >
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg" id="botones">Regresar</button>
            </div>
        </div>
    </div>
</a>
<br>

        
<?php include("template/pie.php"); ?>