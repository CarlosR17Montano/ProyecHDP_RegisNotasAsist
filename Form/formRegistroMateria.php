    
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>FORMULARIO DE INGRESO DE MATERIA</title>
        <script type="text/javascript" src="../Js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
         <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <h2>FORMULARIO DE INGRESO DE MATERIA</h2>
            <?php
        session_start();
        if ($_SESSION["TipUser"] == 1) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["Codigo"] . " " . $_SESSION["NombreDocen"] . " " . $_SESSION["ApellidosDocen"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            ?>

        <form name="formMateriaAgregar" action="../Procesos/ProcesoRegistroMateria.php" method="POST">
            <fieldset>
                <legend>Datos de Materia</legend>
                <label for="NomMat">Nombre de la Materia:</label><br>
                <input type="text" class=":required" id="NomMat" name="NomMat" value="" required><br>
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
