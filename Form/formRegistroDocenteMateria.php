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
        <h2>FORMULARIO DE ASIGNACION DE DOCENTE A MATERIA</h2>
        <?php
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            ?>
            <form name="formDocenteAgregar" action="../Procesos/ProcesoAsignacionMateriaDocente.php" method="POST">
                <fieldset>
                    <label for="DatoIngreNotaEstu">Seleccione Registro del Docente</label><br>
                    <select id="personal" name="AsigDocenMateria" class=":required">
                        <option value="" selected="selected">Seleccionar Codigo Docente</option>
                        <?php
                        $sqlDatosDocente = "SELECT `NombresDocente`,`ApellidosDocente`,`CodigoDocente` FROM `docente`";
                        $resultDatoDocente = mysqli_query($con, $sqlDatosDocente) or die("database error:" . mysqli_error($con));
                        while ($DatoDocen = mysqli_fetch_assoc($resultDatoDocente)) {
                            ?>
                            <option value="<?php echo $DatoDocen["CodigoDocente"]; ?>"><?php echo $DatoDocen["NombresDocente"] . " " . $DatoDocen["ApellidosDocente"] . "-" . $DatoDocen["CodigoDocente"]; ?></option>
                        <?php } ?>
                    </select><br>
                    <label for="DatoIngreNotaEstu">Seleccione Materia </label><br>
                    <select id="personal" name="IdAsignMateria" class=":required">
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
