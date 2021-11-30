
<?php include("./template/cabecera.php"); ?>
<?php

include("config/bd.php");//conexion
$sentenciaSQL3= $conexion->prepare("SELECT `activo`, `Idperiodo` FROM `periodo` WHERE 1");
$sentenciaSQL3->execute();
$idact=($sentenciaSQL3->fetchColumn());

?>
<body>

    <div class="container">   
                <a  <?php if($idact=='1'){echo 'href="Tutor-MostrarReporteTutor.php"'; }else{}  ?>  style="text-decoration:none"> 
                <div class="card">
                    <img src="./img/reporte-de-negocios.png" >
                    <h4></br>Realizar Reporte</h4>
                </div>
                </a>
                
                <a href="Tutor-verExpediente.php" style="text-decoration:none">
                <div class="card">
                    <img src="img/libro.png" >
                    <h4>Expediente</h4>
                    
                </div>
                </a>

                <a href="Tutor-canalizacion.php"  style="text-decoration:none">
                <div class="card">
                    <img src="img/resumen.png" >
                    <h4>Canalizacion</h4>
                </div>
                </a>

                <!--
                <div class="card">
                    <img src="img/vision.png" >
                    <h4>Visualizar Encuestas</h4>
                    <a href=""></a>
                </div>
                -->
                <a href="Exportar-repT.php" style="text-decoration:none">
                <div class="card">
                    <img src="img/exportar.png" >
                    <h4>Visualizar / Exportar Reporte</h4>
                </div>
                </a>

                <a href="Tutor-tutorado.php" style="text-decoration:none">
                <div class="card">
                    <img src="img/alumno.png" >
                    <h4>Tutorados</h4>
                </div>
                </a>
        
    </div>

</body>

<?php include("template/pie.php"); ?>