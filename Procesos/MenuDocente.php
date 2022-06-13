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
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            ?>
            <a href="../Form/formRegistroMateria.php">Registro Materia</a><br>
            <a href="../Form/formRegistroMateriaEstudiantes.php">Registro de Materias a Estudiante</a><br>
            <a href="../Form/formRegistroNotas.php">Registro Notas</a><br>
            <a href="../Form/formAsistenciaMaterias.php">Registro Asistencia</a><br>
            <?php
        } else {
            echo "<p>No tienes permisos de gestion</>";
        }
        ?>
    </body>
</html>
