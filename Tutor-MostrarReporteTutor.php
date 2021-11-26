<?php include("template/cabeceraTutor-MostrarReporteTutor.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<?php

$idtutor=$_SESSION['idtutor'];

include("config/bd.php");//conexion
$sentenciaSQL = $conexion->prepare("SELECT * FROM `tutorados` WHERE IdTutor = :idtutor ORDER BY  NombreTutorado ASC");  
$sentenciaSQL->bindParam(':idtutor',$idtutor);
$sentenciaSQL->execute();
$alumno = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);


   $id=(isset($_POST['select']))?$_POST['select']:"";
   $_POST['idsql']=$id;

  
$_SESSION['id']=$id;
?>


<div class="container"> 
  <form action="" method="post" class="form-group">
      
    <div class="form-group">          
      <br>
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
   
        <?php
          //SELECT * FROM `reporte` WHERE IdTutorado = ?
          //echo ' id:'.$_POST['idsql'];
      
          $sentenciaSQL1 = $conexion->prepare("SELECT * FROM `reporte` WHERE IdTutorado = :id ");  
          $sentenciaSQL1->bindParam(':id',$id);
          $sentenciaSQL1->execute();
          $tutorado = $sentenciaSQL1->fetchAll(PDO::FETCH_OBJ);   
          foreach($tutorado as $datos);

          //variables para los campos
          $ssInv = $datos->HoraSesionIndiv;
          $ssGru= $datos->HoraSesionGrup;
          $act = $datos->Actividad;
          $conf = $datos->Conferencias;
          $taller = $datos->Talleres;
          $psi = $datos->Psicologia;
          $ase = $datos->Asesoria;
          $vnum = $datos->EvaValor;
          $vdes = $datos->EvalNivel;
          
          $estatus = $datos->Estatus;

          $acre1=$datos->Acredito;
          $noacre1=$datos->Noacredito;
          $deser1=$datos->Deserto;
          $acrese1=$datos->AcreditadoSegui;

          $sentenciaSQL2 = $conexion->prepare("SELECT * FROM `impact` WHERE IdTutorado = :id ");  
          $sentenciaSQL2->bindParam(':id',$id);
          $sentenciaSQL2->execute();
          $tutorado = $sentenciaSQL2->fetchAll(PDO::FETCH_OBJ);   
          foreach($tutorado as $impact);
          $psix= $impact->Psi;
          $assdep= $impact->AssDep;
          $assbc= $impact->AssDep;

         // echo '<script type="text/javascript">', 'desahbilitar();', '</script>';
          switch ($estatus ) {
            case "Acredito":
              
            echo  'dis:'.$dis = "false";
           //   echo '<script type="text/javascript"> document.getElementById("estatus").disabled=true; </script>';
           //  echo '<script type="text/javascript"> document.getElementById("estatus1").disabled=true; </script>';
           //  echo '<script type="text/javascript"> var funcion ="si"; </script>';

             echo "Acredito";
             // $dis= "false";
                break;
            case "Tutoría de seguimiento":
              echo  'dis:'.$dis = "false";
              echo "Tutoría de seguimiento";
                break;
            case "NoAcredito":
              echo "NoAcredito";
                break;
            case "Deserto":
              echo "Deserto";
                break;
            case "AcreditoSeg":
              echo "AcreditoSeg";
                break;  
        }       
    
        
        ?>

   <script type="text/javascript"> 
  
  function desahbilitar() {
    alert("sdsd");
var radios = document.getElementsByTagName('estatus1');
for (var i=0;i<radios.length;i++) {
radios[i].disabled = true;
}
document.getElementById("estatus1").disabled=false;

}
  
</script>
<?php
 //echo $id=$_GET['select'];


 $ssinv2=(isset($_POST['ssinv2']))?$_POST['ssinv2']:"";
 $ssgru2=(isset($_POST['ssgru']))?$_POST['ssgru']:"";
 $act2=(isset($_POST['act']))?$_POST['act']:"";
 $conf2=(isset($_POST['conf']))?$_POST['conf']:"";
 $taller2=(isset($_POST['taller']))?$_POST['taller']:"";
 $psi2=(isset($_POST['psi']))?$_POST['psi']:"";
 $ase2=(isset($_POST['ase']))?$_POST['ase']:"";
 $estatus2=(isset($_POST['estatus']))?$_POST['estatus']:"";
 $vnum2=(isset($_POST['vnum']))?$_POST['vnum']:"";
 $vdes2=(isset($_POST['vdes']))?$_POST['vdes']:"";
 
//config/Tutor-MostrarReporteTutorSQL.php
/*
if(  (isset($_POST['botones'])) ){

  $sentenciaSQL1 = $conexion->prepare("UPDATE `reporte` SET `Psicologia`=:psi2,`Asesoria`=:ase2,`Actividad`=:act2,`Conferencias`=:conf2,`Talleres`=:taller2,`Estatus`=:estatus2,`HoraSesionIndiv`=:ssinv2,`HoraSesionGrup`=:ssgru2,`EvaValor`=:vnum2,`EvalNivel`=:vdes2 WHERE IdTutorado=:idsql ");  
  $sentenciaSQL1->bindParam(':idsql',$id);
  $sentenciaSQL1->bindParam(':ssinv2',$ssinv2);
  $sentenciaSQL1->bindParam(':ssgru2',$ssgru2);
  $sentenciaSQL1->bindParam(':act2',$act2);
  $sentenciaSQL1->bindParam(':conf2',$conf2);
  $sentenciaSQL1->bindParam(':taller2',$taller2);
  $sentenciaSQL1->bindParam(':psi2',$psi2);
  $sentenciaSQL1->bindParam(':ase2',$ase2);
  $sentenciaSQL1->bindParam(':estatus2',$estatus2);
  $sentenciaSQL1->bindParam(':vnum2',$vnum2);
  $sentenciaSQL1->bindParam(':vdes2',$vdes2);
  $sentenciaSQL1->execute();

}*/
?>



</form>
<form action="config/Tutor-MostrarReporteTutorSQL.php" method="post" class="form-group">

<div class="form-group form-horizontal">
<br>
<br>
      <h6> <?php //echo 'Alumno: '.$_POST['idsql']; ?></h6>
      <p>Número de sesiones con el tutor (Hora/Sesión)</p>
      <div class="form-inline" >
        <label for="invidual" class="control-label col-md-3">Sesiones Individuales</label>
        <input type="text" name="ssinv2" class="form-control col-md-1" value="<?php echo $ssInv; ?>" >

        <label for="grupal" class="control-label col-md-3">Sesiones Grupales</label>
        <input type="text" name="ssgru" class="form-control col-md-1" value="<?php echo $ssGru; ?>">
      </div>
      
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>PARTICIPACIÓN EN ACTIVIDADES DE APOYO (NÚMERO DE HORAS DE LA ACTIVIDAD)</p>
      <div class="form-inline" >
        <label for="integradora" class="control-label col-md-3">Actividad Integradora (max. 4 horas)</label>
        <input type="text" name="act" class="form-control col-md-1" value="<?php echo $act; ?>">

        <label for="grupal" class="control-label col-md-3">Conferencias</label>
        <input type="text" name="conf" class="form-control col-md-1" value="<?php echo $conf; ?>">

        <label for="grupal" class="control-label col-md-3">Talleres</label>
        <input type="text"  name="taller" class="form-control col-md-1" value="<?php echo $taller; ?>">
      </div>
      
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>CANALIZACIÓN (NÚMERO DE HORA/SESIÓN)</p>
      <div class="form-inline"  ID="marco">
        <label for="integradora" class="control-label col-md-3" id="letra">PSICOLOGIA</label>
        <input type="text" name="psi" class="form-control col-md-1" value="<?php echo $psi; ?>">

        <label for="grupal" class="control-label col-md-3" id="letra">ASESORIA</label>
        <input type="text" name="ase" class="form-control col-md-1" value="<?php echo $ase; ?>">

        <label for="grupal" class="control-label col-md-3" id="letra">Horas sumados</label>
        <input disabled="»disabled»" type="text" name="" class="form-control col-md-1" value="<?php echo $ase+$psi; ?>">
       </div>
    </div>  
      
    <div class="form-group form-horizontal">
      <br><br><p>ESTATUS EN EL PROGRAMA: <?php echo $estatus; ?></p>
      <select class="form-select col-md-6"  name="estatus" id="estatus" <?php if($estatus=="Acreditó" or $estatus== "Tutoría de seguimiento" ){echo 'disabled="»disabled»"'; } ?>  >
                <option hidden selected>Selecciona un estatus</option>
                <option > Acreditó </option>  
                <option > No Acreditó </option> 
                <option > Desertó </option> 
                <option > Acreditado en Seguimiento </option> 
    </select>

    <div class="form-group form-horizontal">
      <br><br><p>EVALUACIÓN DEL TUTORADO*</p>
      <div class="form-inline" >
        <label for="NUMERICO" class="control-label col-md-3">VALOR NUMERICO</label>
        <input type="text"  name="vnum" class="form-control col-md-1" value="<?php echo $vnum; ?>">

        <label for="DESEMPEÑO" class="control-label col-md-3">VALOR DE DESEMPEÑO</label>
        <input type="text" disabled="»disabled»" name="vdes" class="form-control col-md-1" value="<?php echo $vdes; ?>">

        <div class="col-md-3">
        <LABEL class="">4. Excelente</LABEL>
        <label class="">3. Notable</label>
        <label class="">2. Bueno</label>
        <label class="">1. Suficiente</label>
        <label class="">0. Insuficiente/No Acreditado</label>
        </div>
        
                <div>
                  <br>
                <label for="DESEMPEÑO" class="control-label col-md-3">Psicologica</label>
                <textarea  type="text" placeholder="" name="psi" id="psi" cols="40" rows="5"><?php echo $psix; ?></textarea>
                </div>
                <div>
                <label for="DESEMPEÑO" class="control-label col-md-5">Asesoria Departamental</label>
                <textarea  type="text" placeholder="" name="assdep" id="assdep" cols="40" rows="5"><?php echo $assdep; ?></textarea>
                </div>
                <div>
                <label for="DESEMPEÑO" class="control-label col-md-6">Asesoria de Ciencia Basicas</label>
                <textarea  type="text" placeholder="" name="assbc" id="assbc" cols="40" rows="5" > <?php echo $assbc; ?></textarea>
                </div>

        </div>


    </div>
    
    <div class="container" id="partebaja">

  

      <div class="row align-items-start">
        <div class="col">
        <a id="boton" href="menuTutor.php">
          <button type="button" class="btn btn-primary btn-lg"  id="botones">Regresar</button>
                 </a>
          
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary btn-lg" name="botones" id="botones">Aceptar</button>
        </div>

      </div>
    </div>


  </form>
</div>
<?php include("template/pie.php"); ?>