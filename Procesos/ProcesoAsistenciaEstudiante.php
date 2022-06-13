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
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/tablas.css" media="screen, tv, projection, print" />
    </head>
    <body>
        <?php
        require("../Conex.php");
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";

            $CodAsistenciaEstudiante = ($_POST['AsistenciaCodigoEstu']);
            $CodAsistenciaMateria = ($_POST['CodAsistenciaMater']);

            $Fecha1Asistencia = ($_POST['Fecha1']);
            $ValAsistencia1 = ($_POST['Asistencia1']);
            if ($Fecha1Asistencia == '-') {
                $Fecha1Asistencia = '1900-01-01';
            } else {
                $Fecha1Asistencia = ($_POST['Fecha1']);
            }
            $Fecha2Asistencia = ($_POST['Fecha2']);
            $ValAsistencia2 = ($_POST['Asistencia2']);
            if ($Fecha2Asistencia == '-') {
                $Fecha2Asistencia = '1900-01-01';
            } else {
                $Fecha2Asistencia = ($_POST['Fecha2']);
            }
            $Fecha3Asistencia = ($_POST['Fecha3']);
            $ValAsistencia3 = ($_POST['Asistencia3']);
            if ($Fecha3Asistencia == '-') {
                $Fecha3Asistencia = '1900-01-01';
            } else {
                $Fecha3Asistencia = ($_POST['Fecha3']);
            }
            $Fecha4Asistencia = ($_POST['Fecha4']);
            $ValAsistencia4 = ($_POST['Asistencia4']);
            if ($Fecha4Asistencia == '-') {
                $Fecha4Asistencia = '1900-01-01';
            } else {
                $Fecha4Asistencia = ($_POST['Fecha4']);
            }
            $Fecha5Asistencia = ($_POST['Fecha5']);
            $ValAsistencia5 = ($_POST['Asistencia5']);
            if ($Fecha5Asistencia == '-') {
                $Fecha5Asistencia = '1900-01-01';
            } else {
                $Fecha5Asistencia = ($_POST['Fecha5']);
            }
            $Fecha6Asistencia = ($_POST['Fecha6']);
            $ValAsistencia6 = ($_POST['Asistencia6']);
            if ($Fecha6Asistencia == '-') {
                $Fecha6Asistencia = '1900-01-01';
            } else {
                $Fecha6Asistencia = ($_POST['Fecha6']);
            }
            $Fecha7Asistencia = ($_POST['Fecha7']);
            $ValAsistencia7 = ($_POST['Asistencia7']);
            if ($Fecha7Asistencia == '-') {
                $Fecha7Asistencia = '1900-01-01';
            } else {
                $Fecha7Asistencia = ($_POST['Fecha7']);
            }
            $Fecha8Asistencia = ($_POST['Fecha8']);
            $ValAsistencia8 = ($_POST['Asistencia8']);
            if ($Fecha8Asistencia == '-') {
                $Fecha8Asistencia = '1900-01-01';
            } else {
                $Fecha8Asistencia = ($_POST['Fecha8']);
            }

            //Validar que no se ingrese dos veces el mismo estudiante en la misma materia
            $SqlSelecAsistenciaDuplicado = "SELECT *  FROM `asistenciamateria` WHERE `CodAsisteEstudiante` = '$CodAsistenciaEstudiante' AND `CodAsisteMateria` = '$CodAsistenciaMateria'";
            $ObtenerDupliAsistencia = mysqli_query($con, $SqlSelecAsistenciaDuplicado);
            $RegistroDupliAsistencia = mysqli_num_rows($ObtenerDupliAsistencia);
            if ($RegistroDupliAsistencia == 0) {



                $sql = "INSERT INTO `asistenciamateria` ("
                        . "`AsisPorcentaje1`, `FechaAsistencia1`, "
                        . "`AsisPorcentaje2`, `FechaAsistencia2`, "
                        . "`AsisPorcentaje3`, `FechaAsistencia3`, "
                        . "`AsisPorcentaje4`, `FechaAsistencia4`, "
                        . "`AsisPorcentaje5`, `FechaAsistencia5`, "
                        . "`AsisPorcentaje6`, `FechaAsistencia6`, "
                        . "`AsisPorcentaje7`, `FechaAsistencia7`, "
                        . "`AsisPorcentaje8`, `FechaAsistencia8`, "
                        . "`CodAsisteEstudiante`, `CodAsisteMateria`) "
                        . "VALUES ("
                        . "$ValAsistencia1,'$Fecha1Asistencia', "
                        . "$ValAsistencia2,'$Fecha2Asistencia', "
                        . "$ValAsistencia3,'$Fecha3Asistencia', "
                        . "$ValAsistencia4,'$Fecha4Asistencia', "
                        . "$ValAsistencia5,'$Fecha5Asistencia', "
                        . "$ValAsistencia6,'$Fecha6Asistencia', "
                        . "$ValAsistencia7,'$Fecha7Asistencia', "
                        . "$ValAsistencia8,'$Fecha8Asistencia', "
                        . "'$CodAsistenciaEstudiante', '$CodAsistenciaMateria')";
                if (mysqli_query($con, $sql)) {
                    echo "Asistencia agregada";
                    ?>
                    <table id='TablaHDP'>
                        <tr><th colspan="2">Asistencia del Estudiante</th></tr>
                        <tr><td>Fecha 1</td><td><?php echo $Fecha1Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 1</td><td><?php echo $ValAsistencia1 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 2</td><td><?php echo $Fecha2Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 2</td><td><?php echo $ValAsistencia2 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 3</td><td><?php echo $Fecha3Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 3</td><td><?php echo $ValAsistencia3 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 4</td><td><?php echo $Fecha4Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 4</td><td><?php echo $ValAsistencia4 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 5</td><td><?php echo $Fecha5Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 5</td><td><?php echo $ValAsistencia5 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 6</td><td><?php echo $Fecha6Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 6</td><td><?php echo $ValAsistencia6 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 7</td><td><?php echo $Fecha7Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 7</td><td><?php echo $ValAsistencia7 == 1 ? 'SI' : 'NO'; ?></td></tr>
                        <tr><td>Fecha 8</td><td><?php echo $Fecha8Asistencia; ?></td></tr>
                        <tr><td>Tipo Asistencia 8</td><td><?php echo $ValAsistencia8 == 1 ? 'SI' : 'NO'; ?></td></tr>


                    </table>
                    <?php
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Asistencia ya registrada " . $RegistroDupliAsistencia['CodAsisteEstudiante'];
            }
        } else {
            echo "<p>No tienes permisos de gestion</>";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
