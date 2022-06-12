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
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/cssHorizontal.css" media="screen, tv, projection, print" />
        <!--<link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />-->

        <script language="JavaScript">
// Convertir en mayusculas
            function aMays(e, elemento) {
                tecla = (document.all) ? e.keyCode : e.which;
                elemento.value = elemento.value.toUpperCase();
            }
//Activacion de input para cuotas

            function Mayusculas() {
                var x = document.getElementById("MayTextarea");
                x.value = x.value.toUpperCase();
            }


            //Activar input con datepicker
//funcion del Datepicker
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            $(function () {
                $("#datepicker1").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker3").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker4").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker5").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker6").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker7").datepicker({dateFormat: 'yy-mm-dd', });
                $("#datepicker8").datepicker({dateFormat: 'yy-mm-dd', });

            });



        </script>

    </head>
    <body>
        <h2>FORMULARIO DE ASISTENCIA DE ESTUDIANTE</h2>
        <form name="formDocenteAgregar" action="../Procesos/ProcesoAsistenciaEstudiante.php" method="POST">
            <fieldset>
                <legend>Formulario de Ingreso de Notas</legend>
                <fieldset>
                    <label for="DatoIngreNotaEstu">Seleccione Registro del Estudiante</label><br>
                    <select id="personal" name="AsistenciaCodigoEstu" class=":required">
                        <option value="" selected="selected">Seleccionar Codigo Estudiante</option>
                        <?php
                        $sqlDatosEstudiante = "SELECT `NombresEstudiante`,`ApellidosEstudiente`,`CodigoEstudiante` FROM `estudiante`";
                        $resultDatoEstudiante = mysqli_query($con, $sqlDatosEstudiante) or die("database error:" . mysqli_error($con));
                        while ($DatoEstu = mysqli_fetch_assoc($resultDatoEstudiante)) {
                            ?>
                            <option value="<?php echo $DatoEstu["CodigoEstudiante"]; ?>"><?php echo $DatoEstu["NombresEstudiante"] . " " . $DatoEstu["ApellidosEstudiente"] . "-" . $DatoEstu["CodigoEstudiante"]; ?></option>
                        <?php } ?>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <label for="DatoIngreNotaEstu">Seleccione Materia </label><br>
                    <select id="personal" name="CodAsistenciaMater" class=":required">
                        <option value="" selected="selected">Seleccionar Materia</option>
                        <?php
                        $sqlDatosMateria = "SELECT IdMateria,`NombreMateria`,`CodMateriaAnio` FROM `materia`";
                        $resultDatoMateria = mysqli_query($con, $sqlDatosMateria) or die("database error:" . mysqli_error($con));
                        while ($DatoMate = mysqli_fetch_assoc($resultDatoMateria)) {
                            ?>
                            <option value="<?php echo $DatoMate["CodMateriaAnio"]; ?>"><?php echo $DatoMate["CodMateriaAnio"] . "-" . $DatoMate["NombreMateria"]; ?></option>
                        <?php } ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia1">Clase 1:</label>
                    <input type="text" id="datepicker1" class=":required :nulo" name="Fecha1" value="" >
                    <label for="SelectFecha1">Seleccionar:</label>
                    <select id="SelectFecha1" name="Asistencia1">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
        <fieldset>
                    <label for="Asistencia2">Clase 2:</label>
                    <input type="text" id="datepicker2" class=":required :nulo" name="Fecha2" value="" >
                    <label for="SelectFecha2">Seleccionar:</label>
                    <select id="SelectFecha2" name="Asistencia2">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia3">Clase 3:</label>
                    <input type="text" id="datepicker3" class=":required :nulo" name="Fecha3" value="" >
                    <label for="SelectFecha3">Seleccionar:</label>
                    <select id="SelectFecha3" name="Asistencia3">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia4">Clase 4:</label>
                    <input type="text" id="datepicker4" class=":required :nulo" name="Fecha4" value="" >
                    <label for="SelectFecha4">Seleccionar:</label>
                    <select id="SelectFecha4" name="Asistencia4">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia5">Clase 5:</label>
                    <input type="text" id="datepicker5" class=":required :nulo" name="Fecha5" value="" >
                    <label for="SelectFecha5">Seleccionar:</label>
                    <select id="SelectFecha5" name="Asistencia5">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia6">Clase 6:</label>
                    <input type="text" id="datepicker6" class=":required :nulo" name="Fecha6" value="" >
                    <label for="SelectFecha6">Seleccionar:</label>
                    <select id="SelectFecha6" name="Asistencia6">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia7">Clase 7:</label>
                    <input type="text" id="datepicker7" class=":required :nulo" name="Fecha7" value="" >
                    <label for="SelectFecha7">Seleccionar:</label>
                    <select id="SelectFecha7" name="Asistencia7">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Asistencia8">Clase 8:</label>
                    <input type="text" id="datepicker8" class=":required :nulo" name="Fecha8" value="" >
                    <label for="SelectFecha8">Seleccionar:</label>
                    <select id="SelectFecha8" name="Asistencia8">
                        <option value="0">-</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </fieldset>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
