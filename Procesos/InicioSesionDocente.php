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
        $CodDocente = ($_POST['NomUsuario']);
        $PassDocente = ($_POST['PassUsuario']);

        $sqlSelectSesionDocente = "SELECT * FROM `docente` WHERE `PassDocente` = '$PassDocente' AND `CodigoDocente` = '$CodDocente'";
        $EstadoSesion = mysqli_query($con, $sqlSelectSesionDocente);

        if (mysqli_num_rows($EstadoSesion) > 0) {
            // output data of each row
            while ($DatosDocen = mysqli_fetch_assoc($EstadoSesion)) {
                $TipoUser = $DatosDocen['TipoUser'];
                echo "Valor usuario " . $TipoUser."<br>";
                echo "Bienvenido " . $DatosDocen['NombresDocente'] . " " . $DatosDocen['ApellidosDocente'] . " " . $DatosDocen['CodigoDocente'] . "<br>";
                     echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
                if ($TipoUser == 1) {
                    header('Location:http://localhost/ProyecHDP_RegisNotasAsist/Procesos/MenuDocente.php');
                    $_SESSION['Codigo'] = $DatosDocen['CodigoDocente'];
                    $_SESSION['NombreDocen'] = $DatosDocen['NombresDocente'];
                    $_SESSION['ApellidosDocen'] = $DatosDocen['ApellidosDocente'];
                    $_SESSION['TipUser'] = $TipoUser;
                    
                }
            }
        } else {
            echo "LO SIENTO NO ERES DOCENTE";
        }
        ?>
    </body>
</html>
