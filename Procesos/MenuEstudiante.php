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
        if ($_SESSION["TipUser"] == 2) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["CodigoEstu"] . " " . $_SESSION["NombreEstu"] . " " . $_SESSION["ApellidosEstu"];
             echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            $CodigoNotaEstudiante = $_SESSION["CodigoEstu"];
            ?>
        <a href="../Procesos/MostrarNotasEstudiante.php">Registro Notas</a><br>
            <?php
        } else {
            echo "<p>No tienes permisos de gestion</>";
        }
        ?>
    </body>
</html>
