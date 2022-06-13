<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
            <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
            <link rel="stylesheet" type="text/css" href="../Js/CSS/tablas.css" media="screen, tv, projection, print" />
        <script type="text/javascript">
            window.history.forward();
            function sinVueltaAtras() {
                window.history.forward();
            }
        </script>
        <script>
            document.onkeydown = function (e) {
                tecla = (document.all) ? e.keyCode : e.which;
                alert("No puedes actualizar pagina :)")
                if (tecla = 116) {
                    return false;
                }
            }
        </script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">


        <?php
        session_start();
                   
        require("../Conex.php");
        setlocale(LC_TIME, "es_ES");
        //Consulta para obtener el ultimo Id de campo IdDocente
        $sqlUltimoId =  "SELECT MAX(`IdDocente`) AS `IdDocente`FROM `docente`";
        if ($resultado = mysqli_query($con, $sqlUltimoId)) {
            while ($ValorFila = mysqli_fetch_row($resultado)) {
                $IdUltimo = $ValorFila[0];
            }
        }
        //Variable guardamos el ulitmo id y le sumamos uno;
        $CorrelativoDocente = $IdUltimo + 1;
        //Variables Obtenidas del Formulario
        /* @var $_POST type */
        $NomDocente = ($_POST['NomDocen']);
        $Pri_ApeDocente = ($_POST['PriApeDocen']);
        $Seg_ApeDocente = ($_POST['SegApeDocen']);
        $DUIDocente = ($_POST['DUIDocen']);
        $PassDocente = ($_POST['PassDocen']);
        $EmailDocente = ($_POST['EmailDocen']);
        $TeleMovDocente = ($_POST['TelMovDocen']);
        $GeneroDocente = ($_POST['SexoDocen']);
        //Apellidos Completos
        $ApellidosCompleDocente = $Pri_ApeDocente . " " . $Seg_ApeDocente;
        //Obtengo Iniciales de Apellidos   
        $PriIniApe = substr($Pri_ApeDocente, 0, 1);
        $SegIniApe = substr($Seg_ApeDocente, 0, 1);
        //Formato a numero de Telefono Movil
        $FormatTelefonoMov = ($Digitos4Primeros = substr($TeleMovDocente, 0, 4)) . "-" . ($Digitos4Segundos = substr($TeleMovDocente, 3, 4));
        //Fecha de Ingreso de Docente
        $FechaIngreDocente = date("d-m-y");
        //Obtengo el año
        $anioRegisDocente = date("Y");
        //Creamos Codigo de Docente
        $CodigoDocente = $PriIniApe . $SegIniApe . $anioRegisDocente . $CorrelativoDocente."-1";
        //Agregamos tipo de usuario para manejo de sesiones 1=docente
        $TipoUsuario=1;
        //Sentecia y codigo para realizar una seleccion y evitar duplicidad en la BD
        $SqlSelecDuplicado = "SELECT *  FROM `docente` WHERE `DUIDocente` = '$DUIDocente' AND `EmailDocente` = '$EmailDocente'";
        $ObtenerDupli = mysqli_query($con, $SqlSelecDuplicado);
        $RegistroDupli = mysqli_num_rows($ObtenerDupli);
        if ($RegistroDupli == 0) {
            //Sentencia y codigo para realizar el INSERT del estudiante
            $sqlInsertDocente = "INSERT INTO `docente` (`NombresDocente`, `ApellidosDocente`, `DUIDocente`, "
                    . "`PassDocente`, `EmailDocente`, `FechaIngreDocente`, "
                    . "`Sexo`, `CodigoDocente`, `TipoUser`) "
                    . "VALUES ('$NomDocente', '$ApellidosCompleDocente', '$DUIDocente', "
                    . "'$PassDocente', '$EmailDocente', '$FechaIngreDocente', '$GeneroDocente','$CodigoDocente',$TipoUsuario)";
            if ($con->query($sqlInsertDocente) === TRUE) {
                echo "Verificar datos de " . $CodigoDocente . "<br>";
                ?> 
                    <script>
                                setTimeout(function () {
                                    window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formInicioSesionDocente.php";
                                }, 4000);
                            </script>
                <?php
            } else {
                echo "Error: " . $sqlInsertDocente . "<br>" . $con->error;
            }
            ?>
            <table id='TablaHDP'>
                <tr><th colspan="2">Datos Ingresado del Docente</th></tr>
                <tr><td>Nombre del Docente</td><td><?php echo $NomDocente; ?></td></tr>
                <tr><td>Apellidos del Docente</td><td><?php echo $ApellidosCompleDocente; ?></td></tr>
                <tr><td>Codigo del Docente</td><td><?php echo $CodigoDocente; ?></td></tr>
                <tr><td>Email</td><td><?php echo $EmailDocente; ?></td></tr>
                <tr><td>Fecha de Ingreso</td><td><?php echo $FechaIngreDocente; ?></td></tr>
                <tr><td>Genero</td><td><?php
                        if ($GeneroDocente == 'M') {
                            echo 'MASCULINO';
                        } else {
                            echo 'FEMENINO';
                        }
                        ?></td></tr>
            </table>
            <?php
        } else {
            echo "YA ESTA REGISTRADO ";
            ?> 
                    <script>
                                setTimeout(function () {
                                    window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formInicioSesionDocente.php";
                                }, 2000);
                            </script>
                <?php
            
        }
        
        mysqli_close($con);
        ?>

    </body>

</html>
