<?php include("template/cabeceraAlumno-SubirExpediente.php");

include("config/bd.php");//conexion
    $sentenciaSQL = $conexion->prepare("SELECT * FROM `tutorados` WHERE IdTutor = :idtutor ORDER BY  NombreTutorado ASC");  
    $sentenciaSQL->bindParam(':idtutor',$idtutor);
    $sentenciaSQL->execute();
    $alumno = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
    
       $id=(isset($_POST['select']))?$_POST['select']:"";
       $_POST['idsql']=$id;
    
    $_SESSION['id']=$id;

 if(isset($_POST['select'])){
    include('config/conexion.php');
    $tmp = array();
    $res = array();
    $sel = $con->query("SELECT * FROM `files` WHERE IdTutorado =$id ");
    while ($row = $sel->fetch_assoc()) {
        $tmp = $row;
        array_push($res, $tmp);
    }
 }   


?>       
<div class="container">
    <form action="" method="post" class="form-group">
     <div class="form-group">            
      <br>
      <label for="No.Control"><h5>Seleccionar Alumno</h5></label> <br>
      <select class="form-select col-md-6" name="select" id="inputGroupSelect01" onChange="this.form.submit()">
      <option selected> <?php if(isset($_POST['select']) ){echo $id; }else{echo 'Alumnos'; } ?> </option>
      <?php foreach($alumno as $row): //llenar combobox con Tutores 
                 ?>  
                <option value="<?php echo$idsq= $row->IdTutorado;?>"> 
                <?php echo $select =$row->IdTutorado.' '.$row->NombreTutorado; $_POST['idsql']=$select;?>
                
                </option>
            <?php endforeach ?>  
            <?php   ?>
      </select>
    </div>
    </form>     


<br>
    <h1 style="text-align: center;">Expediente</h1>
         
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped mb-0"> 
            <thead>
                <tr>
             
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col" style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                
                <?php 
                if(isset($_POST['select'])){
                foreach ($res as $val) { ?>
                    <tr>
                        <td><?php echo $val['title'] ?> </td>
                        <td><?php echo $val['descripction'] ?> </td>
                      
                        <td>
                        
                            <div class="container">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo Modal</button>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Sistema-Tutorias/' . $val['url']; ?>" >Ver Archivo pagina</a>
                                    </div>
                                </div>
                            </div>    

                        </td>
                                
                    </tr>        
                <?php } }?>
            </tbody>
        </table> 
    </div> 
        
<br>
<br>
<br>
<a id="boton" href="menuTutor.php" >
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg" id="botones">Regresar</button>
            </div>
        </div>
    </div>
</a>

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
<?php include("template/pie.php"); ?>