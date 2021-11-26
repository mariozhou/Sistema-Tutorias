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


    
    if( !(isset($_SESSION['iduser']))  ){
        header("location:menuPrincipal.php");
    }

    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorias</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/cabecera.css" type="text/css">
    <link rel="stylesheet" href="./css/diseñoasignar-quitarTutorados.css" type="text/css">
    <link rel="stylesheet" href="./css/Menu.css" type="text/css">
    <link rel="stylesheet" href="./css/mostrarCambioTutor.css" type="text/css">

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
    <div class="menu">

            <div class="cerrar_sesion">
                <a class="btn btn-primary btn-lg" href="CerrarSesion.php" role="button">Cerrar Sesión</a>
            </div>
            
            <div class="cambiar_contra">
                <a class="btn btn-primary btn-lg" role="button" href="CambiarContra.php">Cambiar Contraseña</a> 
            </div>
            
            <div>            
                <h4> <?php

                echo  htmlspecialchars($nombre);
                ?> </h4>
                <p>  <?php echo htmlspecialchars($tipo) ?> </p>
                <img src="img/foto-perfil.jpg" alt="foto-perfil">
            </div>

    </div>
</body>