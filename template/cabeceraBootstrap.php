<!DOCTYPE html>
<html lang="en">
    <?php 
    session_start();
    $tipo=$_SESSION['tipo'];
    $nombre=$_SESSION['nombre'];
    $iduser=$_SESSION['iduser'];

    
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
    <link rel="stylesheet" href="./css/Tablas.css">
    
</head>
<body>
    <header>
        <div class="container-fluid" style="background-color:#3768A7;">
            <div class="row">
                <div class="col-2 mt-4">
                   <img src="img/logo-TecNM.png" class="img-fluid rounded" alt="logo" width="200"> 
                </div>
                <div class="col-8">
                    <div class="col">
                        <h2 class="titulo text-center" style="color:white;">Tecnologico Nacional de Mexico</h2>
                    </div>
                    <div class="col">
                        <h2 class="titulo2 text-center" style="color:white;">Instituto Tecnologico de Tepic</h2> 
                    </div>
                    <div class="col">
                        <h3 class="titulo3 text-center" style="color:white;">Plataforma de tutorias</h3>
                    </div>
                </div>
                <div class="col-2">
                   <img src="img/escudo_itt_grande.png" class="img-fluid rounded pb-1" alt="logo2" width="180" >
                </div>
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
<main>