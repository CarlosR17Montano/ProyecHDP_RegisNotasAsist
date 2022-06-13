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
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            setlocale(LC_TIME, "es_ES");

            $NomMateria = ($_POST['NomMat']);
            //Variable para obtener la fecha del registro 
            $FechaIngreMateria = date("d-m-y");
            //Variable para obtener el año 
            $AnioMateria = date("Y");
            //Funcion nativa de php para contar el numero de palabras
            $IniMateria = str_word_count($NomMateria);

            $ArrayMatNombre = explode(" ", $NomMateria);
            $IniValMat = "";
            if (str_word_count($NomMateria) > 1) {
                foreach ($ArrayMatNombre as $Dato) {
                    $IniVal = str_split($Dato, 1);
                    $IniValMat = $IniValMat . $IniVal['0'];
                }
            } else {
                foreach ($ArrayMatNombre as $Dato) {
                    $IniVal = str_split($Dato, 3);
                    $IniValMat = $IniValMat . $IniVal['0'];
                }
            }
            $CodMatAnio = $IniValMat . $AnioMateria;

            $SqlSelecDuplicado = "SELECT * FROM `materia` WHERE `CodMateriaAnio` = '$CodMatAnio'";
            $ObtenerDupli = mysqli_query($con, $SqlSelecDuplicado);
            $RegistroDupli = mysqli_num_rows($ObtenerDupli);
            if ($RegistroDupli == 0) {


                $sqlInsertMateria = "INSERT INTO `materia` (`NombreMateria`, `CodMateria`, "
                        . "`CodMateriaAnio`, `FechaCreacionMateria`) "
                        . "VALUES ('$NomMateria', '$IniValMat', '$CodMatAnio', '$FechaIngreMateria')";
                if ($con->query($sqlInsertMateria) === TRUE) {
                    echo "Verificar datos de " . $CodMatAnio . "<br>";
                    ?> 
                                        <!--            <script>
                                                        setTimeout(function () {
                                                            window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formRegistroAlumno.html";
                                                        }, 4000);
                                                    </script>-->
                    <?php
                } else {
                    echo "Error: " . $sqlInsertMateria . "<br>" . $con->error;
                }
                ?>
                <table border="1">
                    <tr><th colspan="2">Datos Ingresado de la Materia</th></tr>
                    <tr><td>Nombre de la Materia</td><td><?php echo $NomMateria; ?></td></tr>
                    <tr><td>Codigo Materia</td><td><?php echo $AnioMateria; ?></td></tr>
                    <tr><td>Codigo Materia / Año</td><td><?php echo $CodMatAnio; ?></td></tr>
                    <tr><td>Fecha de Registro</td><td><?php echo $FechaIngreMateria; ?></td></tr>

                </table>
                <?php
            } else {
                echo "YA ESTA REGISTRADO " . $CodMatAnio;
            }
            //Codigo de validacion para no ingresar otro registro
            ?> 
    <!--                           <script>
                                setTimeout(function () {
                                    window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formRegistroAlumno.html";
                                }, 2000);
                            </script>-->
            <?php
        } else {
            echo "<p class='noAutorizado'>No tienes permisos de gestion</>";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
