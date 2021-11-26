<?php include("template/cabeceraCoordi-MostrarCambioTutor.php"); 

include('config/conexion.php');
$tmp = array();
$res = array();
$sel = $con->query("SELECT * FROM `canalizacion` Join tutorados  WHERE canalizacion.IdTutorado = tutorados.IdTutorado AND tutorados.IdTutor = $idtutor ORDER BY  Fecha DESC ");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
}
?>


<div class="container">
<form action="config/Tutor-canalizacionSQL.php"  method="post"  required>
    <br><br>
    <h4>Canalizaciones</h4>
    <br><br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">      
        <table class="table table-bordered table-striped mb-0">    
            <thead>
                <tr>
                    <th>#</th>
                    <th>Alumno</th>
                    <th>Tipo</th>
                    <th>Materia</th>
                    <th>Motivos</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
               <!--     <th>Accion</th>  -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $val) { ?>
                                <tr>
                                    <td><input type='radio' name='check' value='<?php echo $val['IdCanal'] ?>' required></td> 
                                    <td><?php echo $val['IdTutorado'].' - '.$val['NombreTutorado'] ?> </td>
                                    <td><?php echo $val['Tipo'] ?> </td>
                                    <td><?php echo $val['Materia'] ?> </td>
                                    <td><?php echo $val['Comentarios'] ?></td>
                                    <td><?php echo $val['Respuesta'] ?></td>
                                    <td><?php echo $val['Fecha'] ?></td>  
                            <!--        <td>
                                    <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Atender
                                    </button>   
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $val['IdCanal']; ?>">
                                        Eliminar
                                    </button> 
                            </td> -->
                                </tr>   
                             <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('config/ModalEliCanal.php'); ?>  
                            <?php } ?>
             
            </tbody>
        </table>
        
    </div>
    <br>
    <div class="">     
                <label >Respuesta</label><br>
                <textarea required type="text" name="respuesta" id="respuesta" cols="40" rows="4"></textarea>
                <div class="container">
                    <br>
        
            <div class="row align-items-start" >
                <div class="col" >
                    <button type="submit" class="btn btn-primary btn-lg" id="botones">Enviar</button>
                </div>
            </div>
        
    </div>
    </div>            
    </form>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atender solicitud</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">


                            <div class="form-group">
                                <label for="title">Mensaje</label>
                               
                                <?php echo $_SESSION['Tipo1']=$val['Tipo'] ?>
                                <?php echo $_SESSION['IdTutorado1']=$val['IdTutorado'] ?>
                                <?php echo $_SESSION['idtutor1']=$idtutor ?>

                                <textarea  class="form-control" id="mensaje" name="mensaje"> </textarea>
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
                                xhttp.open("POST", "respuestaUpload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }
        </script>                    
 
    <br>
    <div class="container">
        <a href="menuTutor.php">
            <div class="row align-items-start" >
                <div class="col" >
                    <button type="button" class="btn btn-primary btn-lg" id="botones">Regresar</button>
                </div>
            </div>
</a>
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
        var IdMensaje = $(this).attr("id");

        var dataString = 'IdMensaje='+ IdMensaje;
        url = "config/CanalRecib_delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="Tutor-canalizacion.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>
<?php include("template/pie.php"); ?>