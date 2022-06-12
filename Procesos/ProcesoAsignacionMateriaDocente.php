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
        $CodAsigMaterDocente = ($_POST['AsigDocenMateria']);
        $IdAsigMater = ($_POST['IdAsignMateria']);
        //Validamos que solo pueda tener dos materias asignadas
        $sqlSelecConteMaterDoce = "SELECT COUNT(`DocenteAsigMat`) FROM `registrodocentemat` WHERE  `DocenteAsigMat`='$CodAsigMaterDocente'";
        $ObteConteo = mysqli_query($con, $sqlSelecConteMaterDoce);
        $RegisConteo = mysqli_fetch_array($ObteConteo);
        if ($RegisConteo['COUNT(`DocenteAsigMat`)'] <= 2) {
            //Ingresamos la informacion
            $sqlAsigDocenMarInsert = "INSERT INTO `registrodocentemat` (`MatRegDocente`, `DocenteAsigMat`) VALUES ('$IdAsigMater', '$CodAsigMaterDocente')";
            if (mysqli_query($con, $sqlAsigDocenMarInsert)) {
                $sqlSeleRegisMatEstu = "SELECT docente.NombresDocente,
                                docente.ApellidosDocente,
                                docente.CodigoDocente,
                                materia.NombreMateria,
                                materia.CodMateria,
                                materia.CodMateriaAnio
                                FROM (notas_asistencias_bd.registrodocentemat registrodocentemat
                                INNER JOIN notas_asistencias_bd.docente docente
                                ON (registrodocentemat.DocenteAsigMat = docente.CodigoDocente))
                                INNER JOIN notas_asistencias_bd.materia materia
                                ON (registrodocentemat.MatRegDocente = materia.IdMateria)
                                WHERE (docente.CodigoDocente = '$CodAsigMaterDocente')";

                echo "<h3>REGISTRO INSERTADO HA SIDO ASIGNADO PARA LA MATERIA<h3>";
                ?>
                <table id='TablaHDP'>
                    <tbody>
                        <tr><th colspan="3">Datos Ingresado Materias RegistradasX</th></tr>
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
            echo "<h2>LOS DOCENTES NO PUEDEN TENER MAS DE DOS MATERIAS </h2>";
            ?>
            <table  id='TablaHDP'>
                <tbody>
                    <tr><th colspan="3">Datos Ingresados Materias Registradas </th></tr>
                    <tr><th colspan="3">Docente solo puede impartir dos materia en cada ciclo </th></tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Materia</td>
                        <td>Anio</td>
                    </tr>
                    <?php
                    echo "<h3>La Materia ya se encuentra registrada</h3>";
                    $sqlSeleRegisMatEstu1 = "SELECT docente.NombresDocente,
                                docente.ApellidosDocente,
                                docente.CodigoDocente,
                                materia.NombreMateria,
                                materia.CodMateria,
                                materia.CodMateriaAnio
                                FROM (notas_asistencias_bd.registrodocentemat registrodocentemat
                                INNER JOIN notas_asistencias_bd.docente docente
                                ON (registrodocentemat.DocenteAsigMat = docente.CodigoDocente))
                                INNER JOIN notas_asistencias_bd.materia materia
                                ON (registrodocentemat.MatRegDocente = materia.IdMateria)
                                WHERE (docente.CodigoDocente = '$CodAsigMaterDocente')";
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
