<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          require("../Conex.php");
          $codigoEstudiante='2022AM5';
          echo 'Este es el carnet ficticio '.$codigoEstudiante.'<br>';
          
        $SqlSelecDuplicado = "SELECT * FROM `estudiante` WHERE `CodigoEstudiante` = '$codigoEstudiante'";
        $ObtenerDupli = mysqli_query($con, $SqlSelecDuplicado);
        $RegistroDupli = mysqli_num_rows($ObtenerDupli);
        if ($RegistroDupli == 0) {
            echo "Aqui ingresa el registro";
        } else {
            echo "YA ESTA REGISTRADO " . $RegistroDupli['NombresEstudiante'];
        }

        mysqli_close($con);

