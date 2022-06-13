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
        $CodEstudiante = ($_POST['NomUsuario']);
        $PassEstudiante = ($_POST['PassUsuario']);

        $sqlSelectSesionEstu = "SELECT *  FROM `estudiante` WHERE `CodigoEstudiante` = '$CodEstudiante' AND `PassEstudiante` = '$PassEstudiante'";
        $EstadoSesion = mysqli_query($con, $sqlSelectSesionEstu);

        if (mysqli_num_rows($EstadoSesion) > 0) {
            // output data of each row
            while ($DatosEstu = mysqli_fetch_assoc($EstadoSesion)) {
                $TipoUser = $DatosEstu['TipoUser'];
                echo "Valor usuario " . $TipoUser . "<br>";
                echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
                echo "Bienvenido " . $DatosEstu['NombresEstudiante'] . " " . $DatosEstu['ApellidosEstudiente'] . " " . $DatosEstu['CodigoEstudiante'] . "<br>";
                if ($TipoUser == 2) {
                    header('Location:http://localhost/ProyecHDP_RegisNotasAsist/Procesos/MenuEstudiante.php');
                    $_SESSION["CodigoEstu"] = $DatosEstu['CodigoEstudiante'];
                    $_SESSION["NombreEstu"] = $DatosEstu['NombresEstudiante'];
                    $_SESSION["ApellidosEstu"] = $DatosEstu['ApellidosEstudiente'];
                    $_SESSION["TipUser"] = $TipoUser;
                    

                 
                }
            }
        } else {
            echo "LO SIENTO NO ERES ESTUDIANTE";
        }
        ?>
    </body>
</html>
