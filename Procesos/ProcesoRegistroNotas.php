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
            $CodRegisNotasEstudiante = ($_POST['RegisNotasCodigoEstu']);
            $CodRegisNotaMateria = ($_POST['CodRegisNotasMater']);
            //Variables de las notas
            $Activi1 = ($_POST['Actividad1']);
            $Porcen1 = floatval($_POST['Porcentaje1']);
            $Nota1 = floatval($_POST['Nota1']);
            $NotaFnl1 = floatval($_POST['NotaFinal1']);
            $Activi2 = ($_POST['Actividad2']);
            $Porcen2 = floatval($_POST['Porcentaje2']);
            $Nota2 = floatval($_POST['Nota2']);
            $NotaFnl2 = floatval($_POST['NotaFinal2']);
            $Activi3 = ($_POST['Actividad3']);
            $Porcen3 = floatval($_POST['Porcentaje3']);
            $Nota3 = floatval($_POST['Nota3']);
            $NotaFnl3 = floatval($_POST['NotaFinal3']);
            $Activi4 = ($_POST['Actividad4']);
            $Porcen4 = floatval($_POST['Porcentaje4']);
            $Nota4 = floatval($_POST['Nota4']);
            $NotaFnl4 = floatval($_POST['NotaFinal4']);
            $Activi5 = ($_POST['Actividad5']);
            $Porcen5 = floatval($_POST['Porcentaje5']);
            $Nota5 = floatval($_POST['Nota5']);
            $NotaFnl5 = floatval($_POST['NotaFinal5']);
            $Activi6 = ($_POST['Actividad6']);
            $Porcen6 = floatval($_POST['Porcentaje6']);
            $Nota6 = floatval($_POST['Nota6']);
            $NotaFnl6 = floatval($_POST['NotaFinal6']);
            $Activi7 = ($_POST['Actividad7']);
            $Porcen7 = floatval($_POST['Porcentaje7']);
            $Nota7 = ($_POST['Nota7']);
            $NotaFnl7 = floatval($_POST['NotaFinal7']);
            $Activi8 = ($_POST['Actividad8']);
            $Porcen8 = floatval($_POST['Porcentaje8']);
            $Nota8 = floatval($_POST['Nota8']);
            $NotaFnl8 = floatval($_POST['NotaFinal8']);
            $Activi9 = ($_POST['Actividad9']);
            $Porcen9 = floatval($_POST['Porcentaje9']);
            $Nota9 = floatval($_POST['Nota9']);
            $NotaFnl9 = floatval($_POST['NotaFinal9']);
            $Activi10 = ($_POST['Actividad10']);
            $Porcen10 = floatval($_POST['Porcentaje10']);
            $Nota10 = floatval($_POST['Nota10']);
            $NotaFnl10 = floatval($_POST['NotaFinal10']);

            //Valido que la nota no sea mayor a 10 como las notas finales son ReadOnly es posible que el porcentaje este
            //ingresado mal
            $SumaPorcentajes = ($Porcen1 + $Porcen2 + $Porcen3 + $Porcen4 + $Porcen5 + $Porcen6 + $Porcen7 + $Porcen8 + $Porcen9 + $Porcen10);
            if ($SumaPorcentajes > 100.00) {
                echo"<H1>Un estudiante no puede tener una nota mayor a 100% Por favor recibe los porcentajes</H1>";
            } else {
                //Validar que no se ingrese dos veces el mismo estudiante en la misma materia
                $SqlSelecNotasDuplicado = "SELECT *  FROM `notasmaterias` WHERE `CodEstudiante` = '$CodRegisNotasEstudiante' AND `CodMateria` = '$CodRegisNotaMateria'";
                $ObtenerDupliNotas = mysqli_query($con, $SqlSelecNotasDuplicado);
                $RegistroDupliNotas = mysqli_num_rows($ObtenerDupliNotas);
                if ($RegistroDupliNotas == 0) {


                    //Validamos que la nota global sea mayor a 6
                    $SumaNotas = ($NotaFnl1 + $NotaFnl2 + $NotaFnl3 + $NotaFnl4 + $NotaFnl5 + $NotaFnl6 + $NotaFnl7 + $NotaFnl8 + $NotaFnl9 + $NotaFnl10);
                    if ($SumaNotas >= 6.00) {
                        $EstadoNota = "APROBADO";
                    } else {
                        $EstadoNota = "REPROBADO";
                    }

                    // SQL para realizar el registro de las notas
                    $sql = "INSERT INTO `notasmaterias` ("
                            . "`Actividad1`, `Porcentaje1`, `Nota1`, `NotaFnl1`, "
                            . "`Actividad2`, `Porcentaje2`, `Nota2`, `NotaFnl2`, "
                            . "`Actividad3`, `Porcentaje3`, `Nota3`, `NotaFnl3`, "
                            . "`Actividad4`, `Porcentaje4`, `Nota4`, `NotaFnl4`, "
                            . "`Actividad5`, `Porcentaje5`, `Nota5`, `NotaFnl5`, "
                            . "`Actividad6`, `Porcentaje6`, `Nota6`, `NotaFnl6`, "
                            . "`Actividad7`, `Porcentaje7`, `Nota7`, `NotaFnl7`, "
                            . "`Actividad8`, `Porcentaje8`, `Nota8`, `NotaFnl8`, "
                            . "`Actividad9`, `Porcentaje9`, `Nota9`, `NotaFnl9`, "
                            . "`Actividad10`, `Porcentaje10`, `Nota10`, `NotaFnl10`, "
                            . "`EstadoMateria`, `CodEstudiante`, `CodMateria`) "
                            . "VALUES "
                            . "('$Activi1', $Porcen1, $Nota1, $NotaFnl1, "
                            . "'$Activi2', $Porcen2, $Nota2, $NotaFnl2, "
                            . "'$Activi3', $Porcen3, $Nota3, $NotaFnl3, "
                            . "'$Activi4', $Porcen4, $Nota4, $NotaFnl4, "
                            . "'$Activi5', $Porcen5, $Nota5, $NotaFnl5, "
                            . "'$Activi6', $Porcen6, $Nota6, $NotaFnl6, "
                            . "'$Activi7', $Porcen7, $Nota7, $NotaFnl7, "
                            . "'$Activi8', $Porcen8, $Nota8, $NotaFnl8, "
                            . "'$Activi9', $Porcen9, $Nota9, $NotaFnl9, "
                            . "'$Activi10', $Porcen10, $Nota10, $NotaFnl10, "
                            . "'$EstadoNota', '$CodRegisNotasEstudiante', '$CodRegisNotaMateria')";

                    if (mysqli_query($con, $sql)) {
                        echo "Las notas ha sido ingresadas para el estudiante con " . $CodRegisNotasEstudiante;
                        ?>
                        <table id='TablaHDP'>
                            <tr><th colspan="2">Notas Ingresadas para el Estudiante</th></tr>
                            <tr><td>NOTA FINAL</td><td><?php echo $SumaNotas; ?></td></tr>
                            <tr><td>Actividad 1</td><td><?php echo $Activi1; ?></td></tr>
                            <tr><td>Nota 1</td><td><?php echo $Nota1; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 1</td><td><?php echo $NotaFnl1; ?></td></tr>
                            <tr><td>Actividad 2</td><td><?php echo $Activi2; ?></td></tr>
                            <tr><td>Nota 2</td><td><?php echo $Nota2; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 2</td><td><?php echo $NotaFnl2; ?></td></tr>
                            <tr><td>Actividad 3</td><td><?php echo $Activi3; ?></td></tr>
                            <tr><td>Nota 3</td><td><?php echo $Nota3; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 3</td><td><?php echo $NotaFnl3; ?></td></tr>
                            <tr><td>Actividad 4</td><td><?php echo $Activi4; ?></td></tr>
                            <tr><td>Nota 4</td><td><?php echo $Nota4; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 4</td><td><?php echo $NotaFnl4; ?></td></tr>
                            <tr><td>Actividad 5</td><td><?php echo $Activi5; ?></td></tr>
                            <tr><td>Nota 5</td><td><?php echo $Nota5; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 5</td><td><?php echo $NotaFnl5; ?></td></tr>
                            <tr><td>Actividad 6</td><td><?php echo $Activi6; ?></td></tr>
                            <tr><td>Nota 6</td><td><?php echo $Nota6; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 6</td><td><?php echo $NotaFnl6; ?></td></tr>
                            <tr><td>Actividad 7</td><td><?php echo $Activi7; ?></td></tr>
                            <tr><td>Nota 7</td><td><?php echo $Nota7; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 7</td><td><?php echo $NotaFnl7; ?></td></tr>
                            <tr><td>Actividad 8</td><td><?php echo $Activi8; ?></td></tr>
                            <tr><td>Nota 8</td><td><?php echo $Nota8; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 8</td><td><?php echo $NotaFnl8; ?></td></tr>
                            <tr><td>Actividad 9</td><td><?php echo $Activi9; ?></td></tr>
                            <tr><td>Nota 9</td><td><?php echo $Nota9; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 9</td><td><?php echo $NotaFnl9; ?></td></tr>
                            <tr><td>Actividad 10</td><td><?php echo $Activi10; ?></td></tr>
                            <tr><td>Nota 10</td><td><?php echo $Nota10; ?></td></tr>
                            <tr><td>Porcentaje Obtenido 10</td><td><?php echo $NotaFnl10; ?></td></tr>

                        </table>
                        <?php
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                } else {
                    echo "<H1>YA EXISTEN NOTAS PARA EL ESTUDIANTE</H1>";
                }
                mysqli_close($con);
            }
        } else {
            echo "<p class='noAutorizado'>No tienes permisos de gestion</>";
        }
        ?>
    </body>
</html>
