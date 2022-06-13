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
        require("../Conex.php");
        setlocale(LC_TIME, "es_ES");
        //Consulta para obtener el ultimo Id de campo IdEstudiante
        $sqlUltimoId = "SELECT MAX(`IdEstudiante`) AS `IdEstudiante` FROM `estudiante`";
        if ($resultado = mysqli_query($con, $sqlUltimoId)) {
            while ($ValorFila = mysqli_fetch_row($resultado)) {
                $IdUltimo = $ValorFila[0];
            }
        }
        //Variable guardamos el ulitmo id y le sumamos uno;
        $CorrelativoEstudiante = $IdUltimo + 1;
        //Variables Obtenidas del Formulario
        /* @var $_POST type */
        $NomEstudiante = ($_POST['NomEstu']);
        $Pri_ApeEstudiante = ($_POST['PriApeEstu']);
        $Seg_ApeEstudiante = ($_POST['SegApeEstu']);
        $DUIEstudiante = ($_POST['DUIEstu']);
        $PassEstudiante = ($_POST['PassEstu']);
        $EmailEstudiante = ($_POST['EmailEstu']);
        $TeleMovEstudiante = ($_POST['TelMovEstu']);
        $GeneroEstudiante = ($_POST['SexoEstu']);
        //Apellidos Completos
        $ApellidosCompleEstudiante = $Pri_ApeEstudiante . " " . $Seg_ApeEstudiante;
        //Obtengo Iniciales de Apellidos   
        $PriIniApe = substr($Pri_ApeEstudiante, 0, 1);
        $SegIniApe = substr($Seg_ApeEstudiante, 0, 1);
        //Formato a numero de Telefono Movil
        $FormatTelefonoMov = ($Digitos4Primeros = substr($TeleMovEstudiante, 0, 4)) . "-" . ($Digitos4Segundos = substr($TeleMovEstudiante, 3, 4));
        //Fecha de Ingreso de Estudiante
        $FechaIngreEStudiante = date("d-m-y");
        //Obtengo el año
        $anioRegisEstudiante = date("Y");
        //Creamos Codigo de Estudiante
        $CodigoEstudiante = $anioRegisEstudiante . $PriIniApe . $SegIniApe . $CorrelativoEstudiante;
        $TipoUsuario=2;
        //Sentecia y codigo para realizar una seleccion y evitar duplicidad en la BD
        $SqlSelecDuplicado = "SELECT *  FROM `estudiante` WHERE `DUIEstudiante` = '$DUIEstudiante' AND `EmailEstudiante` = '$EmailEstudiante'";
        $ObtenerDupli = mysqli_query($con, $SqlSelecDuplicado);
        $RegistroDupli = mysqli_num_rows($ObtenerDupli);
        if ($RegistroDupli == 0) {
            //Sentencia y codigo para realizar el INSERT del estudiante
            $sqlInsertEstudiante = "INSERT INTO `estudiante` (`NombresEstudiante`, `ApellidosEstudiente`, "
                    . "`DUIEstudiante`, `CodigoEstudiante`, `PassEstudiante`, `EmailEstudiante`, "
                    . "`Telefono`, `FechaIngresoEstudiante`, `Sexo`, `TipoUser`) "
                    . "VALUES ('$NomEstudiante', '$ApellidosCompleEstudiante', '$DUIEstudiante', '$CodigoEstudiante', "
                    . "'$PassEstudiante', '$EmailEstudiante', '$TeleMovEstudiante', '$FechaIngreEStudiante', '$GeneroEstudiante',$TipoUsuario)";
            if ($con->query($sqlInsertEstudiante) === TRUE) {
                echo "Verificar datos de " . $CodigoEstudiante . "<br>";
                ?> 
               <script>
                                setTimeout(function () {
                                    window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formInicioSesionEstudiante.php";
                                }, 4000);
                            </script>
                <?php
            } else {
                echo "Error: " . $sqlInsertEstudiante . "<br>" . $con->error;
            }
            ?>
             <table id='TablaHDP'>
                <tr><th colspan="2">Datos Ingresado del Estudiante</th></tr>
                <tr><td>Nombre del Estudiante</td><td><?php echo $NomEstudiante; ?></td></tr>
                <tr><td>Apellidos del Estudiante</td><td><?php echo $ApellidosCompleEstudiante; ?></td></tr>
                <tr><td>Codigo del Estudiante</td><td><?php echo $CodigoEstudiante; ?></td></tr>
                <tr><td>Email</td><td><?php echo $EmailEstudiante; ?></td></tr>
                <tr><td>Fecha de Ingreso</td><td><?php echo $FechaIngreEStudiante; ?></td></tr>
                <tr><td>Genero</td><td><?php
                        if ($GeneroEstudiante == 'M') {
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
                                    window.location.href = "http://localhost/ProyecHDP_RegisNotasAsist/Form/formInicioSesionEstudiante.php";
                                }, 2000);
                            </script>
                <?php
            
        }
        mysqli_close($con);
        ?>

    </body>

</html>
