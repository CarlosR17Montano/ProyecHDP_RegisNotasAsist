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
        $CodRegisMaterEstudiante = ($_POST['RegisMaterCodigoEstu']);
        $IdRegisMateria = ($_POST['IdMaterRegis']);
        //Validar donde se ha ingresado solo esa materia
        $sqlValidarRegisMatEstu = "SELECT * FROM `registromatestu` WHERE `RegisMat` = $IdRegisMateria  AND `RegisEstu` ='$CodRegisMaterEstudiante'";
        $ObteDupliRegi = mysqli_query($con, $sqlValidarRegisMatEstu);
        $RegisValDupli = mysqli_num_rows($ObteDupliRegi);
        if ($RegisValDupli == 0) {
            //Ingresamos la informacion
            $sqlRegisMatEstuInsert = "INSERT INTO `registromatestu` (`RegisMat`, `RegisEstu`) VALUES ('$IdRegisMateria', '$CodRegisMaterEstudiante')";
            if (mysqli_query($con, $sqlRegisMatEstuInsert)) {
                //Seleccionamos los materias inscritas para el estudiante
                $sqlSeleRegisMatEstu = "SELECT estudiante.NombresEstudiante,\n"
                        . "estudiante.ApellidosEstudiente,\n"
                        . "estudiante.CodigoEstudiante,\n"
                        . "materia.CodMateria,\n"
                        . "materia.NombreMateria,\n"
                        . "materia.CodMateriaAnio\n"
                        . "FROM (notas_asistencias_bd.registromatestu registromatestu\n"
                        . "INNER JOIN notas_asistencias_bd.materia materia\n"
                        . "ON (registromatestu.RegisMat = materia.IdMateria))\n"
                        . "INNER JOIN notas_asistencias_bd.estudiante estudiante\n"
                        . "ON (registromatestu.RegisEstu = estudiante.CodigoEstudiante)\n"
                        . "WHERE (estudiante.CodigoEstudiante = '$CodRegisMaterEstudiante')";

                echo "<h3>Se realizo el registro para la materia<h3>";
                ?>
                <table id='TablaHDP'>
                    <tbody>
                        <tr><th colspan="3">Datos Ingresado Materias Registradas</th></tr>
                        <tr>
                            <td>Codigo</td>
                            <td>Materia</td>
                            <td>Anio</td>
                        </tr>
                        <?php
                        $Regis = mysqli_query($con, $sqlSeleRegisMatEstu);
                        if (mysqli_num_rows($Regis) > 0) {
                            // output data of each row
                            while ($ValRegis = mysqli_fetch_assoc($Regis)) {
                                ?>
                                <tr>
                                    <td><?php echo $ValRegis["CodMateria"]; ?></td>
                                    <td><?php echo $ValRegis["NombreMateria"]; ?></td>
                                    <td><?php echo $ValRegis["CodMateriaAnio"]; ?></td>
                                    <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "No hay materias registradas";
                }
            } else {
                echo "Error: " . $sqlRegisMatEstuInsert . "<br>" . mysqli_error($con);
            }
        } else {
            ?>
            <table  id='TablaHDP'>
                <tbody>
                    <tr><th colspan="3">Datos Ingresados Materias Registradas</th></tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Materia</td>
                        <td>Anio</td>
                    </tr>
                    <?php
                    echo "<h3>La Materia ya se encuentra registrada</h3>";
                    $sqlSeleRegisMatEstu1 = "SELECT estudiante.NombresEstudiante,\n"
                            . "estudiante.ApellidosEstudiente,\n"
                            . "estudiante.CodigoEstudiante,\n"
                            . "materia.CodMateria,\n"
                            . "materia.NombreMateria,\n"
                            . "materia.CodMateriaAnio\n"
                            . "FROM (notas_asistencias_bd.registromatestu registromatestu\n"
                            . "INNER JOIN notas_asistencias_bd.materia materia\n"
                            . "ON (registromatestu.RegisMat = materia.IdMateria))\n"
                            . "INNER JOIN notas_asistencias_bd.estudiante estudiante\n"
                            . "ON (registromatestu.RegisEstu = estudiante.CodigoEstudiante)\n"
                            . "WHERE (estudiante.CodigoEstudiante = '$CodRegisMaterEstudiante')";
                    $Regis1 = mysqli_query($con, $sqlSeleRegisMatEstu1);
                    if (mysqli_num_rows($Regis1) > 0) {
                        // output data of each row
                        while ($ValRegis1 = mysqli_fetch_assoc($Regis1)) {
                            ?>
                            <tr>
                                <td><?php echo $ValRegis1["CodMateria"]; ?></td>
                                <td><?php echo $ValRegis1["NombreMateria"]; ?></td>
                                <td><?php echo $ValRegis1["CodMateriaAnio"]; ?></td>
                                <?php
                            }
                        }
                    }
                    mysqli_close($con);
                    ?>
        </table>
    </body>
</html>
