<?php include("template/cabecera.php"); ?>

 <div class="cambioTutor">  
    <form action="" class="form-cambioT" id="formulario" method="post">
        <label class="textoT">Tutor Actual</label>
        <input type="text" class="InputTutor"><br>
        <label class= "textoMotivos">Menciona tus motivos de cambiar de tutor: </label><br>
        <textarea type="text" class="InputMotivos"></textarea><br>
        <input class="botones" type="submit" value="Solicitar cambio">
        <input class="botones" type="submit" id="regresar" value="Regresar">
    </form>
</div> 


<?php include("template/pie.php"); ?>