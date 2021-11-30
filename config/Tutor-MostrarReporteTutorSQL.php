<?php
include("bd.php");//conexion
session_start();
$idsql=$_SESSION['id'];
$idtutor=$_SESSION['idtutor'];

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


 $psi=(isset($_POST['psix']))?$_POST['psix']:"";
 $assdep=(isset($_POST['assdep']))?$_POST['assdep']:"";
 $assbc=(isset($_POST['assbc']))?$_POST['assbc']:"";


//nivel de desempeno
 switch ($vnum2 ) {
    case 0:
        $vdes2 ="Insuficiente";
        break;
    case 1:
        $vdes2 ="Suficiente";
        break;
    case 2:
        $vdes2 ="Bueno";
        break;
    case 3:
        $vdes2 ="Notable";
        break;
    case 4:
        $vdes2 ="Excelente";
        break;    
}

switch ($estatus2 ) {
    case "Acreditó":
        $acre=1;
        $noacre=0;
        $deser=0;
        $acrese=0;
        break;
    case "No Acreditó":
        $acre=0;
        $noacre=1;
        $deser=0;
        $acrese=0;
        break;
    case "Desertó":
        $acre=0;
        $noacre=0;
        $deser=1;
        $acrese=0;
        break;
    case "Acreditado en Seguimiento":
        $acre=0;
        $noacre=0;
        $deser=0;
        $acrese=1;
        break;  
}
if ( $estatus2=="Acreditó" ) {
   $estatus2="Tutoría de seguimiento";
}

 $sentenciaSQL1 = $conexion->prepare("UPDATE `reporte` SET IdTutor=:idtutor, `Psicologia`=:psi2,Acredito = :acre, Noacredito=:noacre, Deserto=:deser, AcreditadoSegui=:acrese,`Asesoria`=:ase2,`Actividad`=:act2,`Conferencias`=:conf2,`Talleres`=:taller2,`Estatus`=:estatus2,`HoraSesionIndiv`=:ssinv2,`HoraSesionGrup`=:ssgru2,`EvaValor`=:vnum2,`EvalNivel`=:vdes2 WHERE IdTutorado=:idsql ");  
 $sentenciaSQL1->bindParam(':idsql',$idsql);
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

 $sentenciaSQL1->bindParam(':acre',$acre);   
 $sentenciaSQL1->bindParam(':noacre',$noacre);
 $sentenciaSQL1->bindParam(':deser',$deser);
 $sentenciaSQL1->bindParam(':acrese',$acrese);

 $sentenciaSQL1->bindParam(':idtutor',$idtutor);
 //Acredito = :acre, Noacredito=:noacre, Deserto=:deser, AcreditadoSegui=:acrese
 $sentenciaSQL1->execute();

 $sentenciaSQL2 = $conexion->prepare("UPDATE `impact` SET `Psi`=:psi,`AssDep`=:assdep,`AssBC`=:assbc WHERE IdTutorado=:idsql");  
 $sentenciaSQL2->bindParam(':psi',$psi);
 $sentenciaSQL2->bindParam(':assdep',$assdep);
 $sentenciaSQL2->bindParam(':assbc',$assbc);
 $sentenciaSQL2->bindParam(':idsql',$idsql);
 $sentenciaSQL2->execute();

if( $sentenciaSQL1){   
     'sd'.$idsql;
     echo "<script> alert('correcto');
    location.href = '../Tutor-MostrarReporteTutor.php';
   </script>";

}else{
  
    echo"<script> alert('incorrecto');
    location.href = '../Tutor-MostrarReporteTutor.php';
    </script>";
}

?>