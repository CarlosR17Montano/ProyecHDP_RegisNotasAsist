<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require("../Conex.php");
?>
<html>
    <head>
        <script type="text/javascript" src="../Js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            ?>
         <h2>FORMULARIO DE REGISTRO DE MATERIA PARA ESTUDIANTES</h2>
         <form name="formDocenteAgregar" action="../Procesos/ProcesoRegistrarMateriaEstudiante.php" method="POST">
            <fieldset>
                <label for="DatoIngreNotaEstu">Seleccione Registro del Estudiante</label><br>
                <select id="personal" name="RegisMaterCodigoEstu" class=":required">
                    <option value="" selected="selected">Seleccionar Codigo Estudiante</option>
                    <?php
                    $sqlDatosEstudiante = "SELECT `NombresEstudiante`,`ApellidosEstudiente`,`CodigoEstudiante` FROM `estudiante`";
                    $resultDatoEstudiante = mysqli_query($con, $sqlDatosEstudiante) or die("database error:" . mysqli_error($con));
                    while ($DatoEstu = mysqli_fetch_assoc($resultDatoEstudiante)) {
                        ?>
                        <option value="<?php echo $DatoEstu["CodigoEstudiante"]; ?>"><?php echo $DatoEstu["NombresEstudiante"] . " " . $DatoEstu["ApellidosEstudiente"] . "-" . $DatoEstu["CodigoEstudiante"]; ?></option>
                    <?php } ?>
                </select><br>
                <label for="DatoIngreNotaEstu">Seleccione Materia </label><br>
                <select id="personal" name="IdMaterRegis" class=":required">
                    <option value="" selected="selected">Seleccionar Materia</option>
                    <?php
                    $sqlDatosMateria = "SELECT IdMateria,`NombreMateria`,`CodMateriaAnio` FROM `materia`";
                    $resultDatoMateria = mysqli_query($con, $sqlDatosMateria) or die("database error:" . mysqli_error($con));
                    while ($DatoMate = mysqli_fetch_assoc($resultDatoMateria)) {
                        ?>
                        <option value="<?php echo $DatoMate["IdMateria"]; ?>"><?php echo $DatoMate["CodMateriaAnio"] . "-" . $DatoMate["NombreMateria"]; ?></option>
                    <?php } ?>
                </select>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
         <?php
        } else {
            echo "<p>No tienes permisos de gestion</>";
        }
        ?>     
    </body>
</html>
