<!DOCTYPE html>
<html lang="en">
    <?php 
    session_start();
    $tipo=$_SESSION['tipo'];
    $nombre=$_SESSION['nombre'];

    include("config/bd.php");//conexion
    $sentenciaSQL = $conexion->prepare("SELECT * FROM `usuario` Where Nombre=:nombre ");  
    $sentenciaSQL->bindParam(':nombre',$nombre);    
    $sentenciaSQL->execute();
    $id1 = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    $id=$_SESSION['id']= $id1["IdUser"];
    $idtutor=$_SESSION['idtutor']= $id1["IdUser"];
    ?>
   
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorias</title>
    <link rel="stylesheet" href="./css/Tablas.css">
    <link rel="stylesheet" href="./css/cabecera.css" >
    

</head>
<body>
    <header class="header">
        <div class="containercab">
            <div class="logo">
                <img src="img/logo-TecNM.png" alt="logo" >    
            </div>  
            <div class="titulos">
                <h2 class="titulo">Tecnológico Nacional de México</h2>
                <h2 class="titulo2">Instituto Tecnologico de Tepic</h2> 
             <h3 class="titulo3">Plataforma de tutorias</h3>
            </div>
            <div class="logo2"> 
                <img src="img/escudo_itt_grande.png" alt="logo2" >
            </div>
        </div>
    </header>

    <div class="container-fluid" style="background-color: #2140AE;">
        <div class="row">
            <div class="col-2 mt-3">
                <a class="btn btn-primary" href="CerrarSesion.php" role="button">Cerrar Sesión</a>
            </div>
            <div class="col-3 mt-3">
                <a class="btn btn-primary " role="button" href="CambiarContra.php">Cambiar Contraseña</a> 
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <h4 class="text-right" style="color:white;"> <?php
                            echo  htmlspecialchars($nombre);
                            ?> </h4>
                        </div>
                        <div class="col">
                            <p class="text-right" style="color:white;">  <?php echo htmlspecialchars($tipo) ?> </p>
                        </div>

                    </div>
                    <div class="float-right">
                        <img src="img/foto-perfil.jpg" class="img-fluid mt-1 mr-1" alt="foto-perfil">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    