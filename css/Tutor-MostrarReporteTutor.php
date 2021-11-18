<?php include("template/cabeceraTutor-MostrarReporteTutor.php"); ?>
<div class="container"> 
  <form action="" method="post" class="form-group">
    
    <div class="form-group">
      <br>
      <label for="alumno">Alumno</label>
      <input type="text" class="form-control col-md-6">
      
      <select class="form-select col-md-6" id="inputGroupSelect01">
      <option selected>Alumnos</option>
      <option value="1">zhou</option>
      <option value="2">jholauss</option>
      <option value="3">Juan</option>
  </select>
    </div>

    <div class="form-group">
      <label for="No.Control">No.Control</label>
      <div class="form-inline">
        <input type="text" class="form-control col-md-4">
        <div class="form-group">
          <div class="col-md-1">
            <button type="button" class="btn btn-primary">Buscar</button>
          </div>
            
        </div>
        
      </div>
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>Número de sesiones con el tutor (Hora/Sesión)</p>
      <div class="form-inline" >
        <label for="invidual" class="control-label col-md-3">Sesiones Individuales</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="grupal" class="control-label col-md-3">Sesiones Grupales</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">
      </div>
      
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>PARTICIPACIÓN EN ACTIVIDADES DE APOYO (NÚMERO DE HORAS DE LA ACTIVIDAD)</p>
      <div class="form-inline" >
        <label for="integradora" class="control-label col-md-3">Actividad Integradora (max. 4 horas)</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="grupal" class="control-label col-md-3">Conferencias</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="grupal" class="control-label col-md-3">Talleres</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">
      </div>
      
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>CANALIZACIÓN (NÚMERO DE HORA/SESIÓN)</p>
      <div class="form-inline"  ID="marco">
        <label for="integradora" class="control-label col-md-3" id="letra">PSICOLOGIA</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="grupal" class="control-label col-md-3" id="letra">ASESORIA</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="grupal" class="control-label col-md-3" id="letra2">TOTAL DE HORAS CUMPLIDAS</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">
      </div>
    </div>
      
    <div class="form-group form-horizontal">
      <br><br><p>ESTATUS EN EL PROGRAMA</p>
      <div class="radio">
        <label for="radio1"  class="radio-inline col-md-4">
          <input type="radio" name="opcion" class="col-md-2"  id="radio1" class="">Acreditó
        </label>

        <label for="radio2" class="radio-inline col-md-4">
          <input type="radio" name="opcion" class="col-md-2" id="radio2" class="">No Acreditó
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="radio">
          <label for="radio3"  class="radio-inline col-md-4">
            <input type="radio" name="opcion" id="radio3" class="col-md-2" class="">Desertó
          </label>

          <label for="radio4" class="radio-inline col-md-4">
            <input type="radio" name="opcion" id="radio4" class="col-md-2" class="">Acreditado en seguimiento
          </label>
      </div>      
    </div>

    <div class="form-group form-horizontal">
      <br><br><p>EVALUACIÓN DEL TUTORADO*</p>
      <div class="form-inline" >
        <label for="NUMERICO" class="control-label col-md-3">VALOR NUMERICO</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <label for="DESEMPEÑO" class="control-label col-md-3">VALOR DE DESEMPEÑO</label>
        <input type="text" class="form-control col-md-1" placeholder="Horas">

        <div class="col-md-3">
        <LABEL class="">4. Excelente</LABEL>
        <label class="">3. Notable</label>
        <label class="">2. Bueno</label>
        <label class="">1. Suficiente</label>
        <label class="">0. Insuficiente/No Acreditado</label>
        </div>
      </div>
    </div>
    
    <div class="container" id="partebaja">
      <div class="row align-items-start">
        <div class="col">
          <button type="submit" class="btn btn-primary btn-lg" id="botones">Aceptar</button>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary btn-lg" id="botones">Regresar</button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php include("template/pie.php"); ?>