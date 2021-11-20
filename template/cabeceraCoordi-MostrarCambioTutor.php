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

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cabecera.css" type="text/css">
    <link rel="stylesheet" href="./css/Tablas.css" type="text/css">
    <link rel="stylesheet" href="./css/Coordinador-MostrarCambioTutor.css" type="text/css">
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="img/logo-TecNM.png" alt="logo" >    
        </div>  
        <h2 class="titulo">Tecnologico Nacional de Mexico</h2>
        <h2 class="titulo2">Instituto Tecnologico de Tepic</h2> 
        <h3 class="titulo3">Plataforma de tutorias</h3>

        <div class="logo2"> 
            <img src="img/escudo_itt_grande.png" alt="logo2" >
        </div>
    </header>
    <div class="menu">
            <img src="img/menu.jpg" alt="imgmenu">
            
            <div>
            <h4> <?php
                echo  htmlspecialchars($nombre);
                ?> </h4>
                <p>  <?php echo htmlspecialchars($tipo) ?> </p>
                <img src="img/foto-perfil.jpg" alt="foto-perfil">
            </div>
    </div>
<main>