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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/cssHorizontal.css" media="screen, tv, projection, print" />
        <!--<link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />-->
        <meta charset="UTF-8">
        <script type="text/javascript">

            $(document).ready(function () {
                //Calculos para el primer bloque de notas 1 
                $('#Nota1').on('keyup', function () {
                    var Nota1 = $('#Nota1').val();
                    $('#Porcentaje1').on('keyup', function () {
                        var Porcentaje1 = $('#Porcentaje1').val();
                        NotaFinl = (parseFloat(Nota1) * parseFloat(Porcentaje1)) / 100;
                        $('#NotaFinal1').val((NotaFinl).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 2 
                $('#Nota2').on('keyup', function () {
                    var Nota2 = $('#Nota2').val();
                    $('#Porcentaje2').on('keyup', function () {
                        var Porcentaje2 = $('#Porcentaje2').val();
                        NotaFin2 = (parseFloat(Nota2) * parseFloat(Porcentaje2)) / 100;
                        $('#NotaFinal2').val((NotaFin2).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 3
                $('#Nota3').on('keyup', function () {
                    var Nota3 = $('#Nota3').val();
                    $('#Porcentaje3').on('keyup', function () {
                        var Porcentaje3 = $('#Porcentaje3').val();
                        NotaFin3 = (parseFloat(Nota3) * parseFloat(Porcentaje3)) / 100;
                        $('#NotaFinal3').val((NotaFin3).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 4
                $('#Nota4').on('keyup', function () {
                    var Nota4 = $('#Nota4').val();
                    $('#Porcentaje4').on('keyup', function () {
                        var Porcentaje4 = $('#Porcentaje4').val();
                        NotaFin4 = (parseFloat(Nota4) * parseFloat(Porcentaje4)) / 100;
                        $('#NotaFinal4').val((NotaFin4).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 5
                $('#Nota5').on('keyup', function () {
                    var Nota5 = $('#Nota5').val();
                    $('#Porcentaje5').on('keyup', function () {
                        var Porcentaje5 = $('#Porcentaje5').val();
                        NotaFin5 = (parseFloat(Nota5) * parseFloat(Porcentaje5)) / 100;
                        $('#NotaFinal5').val((NotaFin5).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 6
                $('#Nota6').on('keyup', function () {
                    var Nota6 = $('#Nota6').val();
                    $('#Porcentaje6').on('keyup', function () {
                        var Porcentaje6 = $('#Porcentaje6').val();
                        NotaFin6 = (parseFloat(Nota6) * parseFloat(Porcentaje6)) / 100;
                        $('#NotaFinal6').val((NotaFin6).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 7
                $('#Nota7').on('keyup', function () {
                    var Nota7 = $('#Nota7').val();
                    $('#Porcentaje7').on('keyup', function () {
                        var Porcentaje7 = $('#Porcentaje7').val();
                        NotaFin7 = (parseFloat(Nota7) * parseFloat(Porcentaje7)) / 100;
                        $('#NotaFinal7').val((NotaFin7).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 8
                $('#Nota8').on('keyup', function () {
                    var Nota8 = $('#Nota8').val();
                    $('#Porcentaje8').on('keyup', function () {
                        var Porcentaje8 = $('#Porcentaje8').val();
                        NotaFin8 = (parseFloat(Nota8) * parseFloat(Porcentaje8)) / 100;
                        $('#NotaFinal8').val((NotaFin8).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 9
                $('#Nota9').on('keyup', function () {
                    var Nota9 = $('#Nota9').val();
                    $('#Porcentaje9').on('keyup', function () {
                        var Porcentaje9 = $('#Porcentaje9').val();
                        NotaFin9 = (parseFloat(Nota9) * parseFloat(Porcentaje9)) / 100;
                        $('#NotaFinal9').val((NotaFin9).toFixed(2));
                    });
                });
                //Calculos para el segundo bloque de notas 10
                $('#Nota10').on('keyup', function () {
                    var Nota10 = $('#Nota10').val();
                    $('#Porcentaje10').on('keyup', function () {
                        var Porcentaje10 = $('#Porcentaje10').val();
                        NotaFin10 = (parseFloat(Nota10) * parseFloat(Porcentaje10)) / 100;
                        $('#NotaFinal10').val((NotaFin10).toFixed(2));
                    });
                });

            });
            //fin documentary


        </script>
        <title>FORMULARIO DE INGRESO DE NOTAS</title>
    </head>
    <body>
        <h2>FORMULARIO DE INGRESO DE NOTAS A ESTUDIANTE</h2>
        <form name="formDocenteAgregar" action="../Procesos/ProcesoRegistroNotas.php" method="POST">
            <fieldset>
                <legend>Formulario de Ingreso de Notas</legend>
                <fieldset>
                    <label for="DatoIngreNotaEstu">Seleccione Registro del Estudiante</label><br>
                    <select id="personal" name="RegisNotasCodigoEstu" class=":required">
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
                    <select id="personal" name="CodRegisNotasMater" class=":required">
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
                    <label for="Nota">Actividad 1:</label>
                    <input type="text"  id="Actividad1" class=":required :nulo" name="Actividad1" value="" >
                    <label for="Nota">Nota 1:</label>
                    <input type="text" id="Nota1" class=":number :float :Valnulo" name="Nota1" value="" >
                    <label for="Nota">Porcentaje 1:</label>
                    <input type="text"  id="Porcentaje1" class=":number :integer :Valnulo" name="Porcentaje1" value="" >
                    <label for="Nota">Nota Final 1:</label>
                    <input type="text"  id="NotaFinal1" name="NotaFinal1" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 2:</label>
                    <input type="text"  id="Actividad2" class=":required :nulo" name="Actividad2" value="" >
                    <label for="Nota">Nota 2:</label>
                    <input type="text" id="Nota2" name="Nota2" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 2:</label>
                    <input type="text" id="Porcentaje2" name="Porcentaje2" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 2:</label>
                    <input type="text" id="NotaFinal2" name="NotaFinal2" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 3:</label>
                    <input type="text"  id="Actividad3" class=":required :nulo" name="Actividad3" value="" >
                    <label for="Nota">Nota 3:</label>
                    <input type="text" id="Nota3" name="Nota3" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 3:</label>
                    <input type="text" id="Porcentaje3" name="Porcentaje3" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 3:</label>
                    <input type="text" id="NotaFinal3" name="NotaFinal3" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 4:</label>
                    <input type="text"  id="Actividad4" class=":required :nulo" name="Actividad4" value="" >
                    <label for="Nota">Nota 4:</label>
                    <input type="text" id="Nota4" name="Nota4" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 4:</label>
                    <input type="text" id="Porcentaje4" name="Porcentaje4" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 4:</label>
                    <input type="text" id="NotaFinal4" name="NotaFinal4" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 5:</label>
                    <input type="text"  id="Actividad5" class=":required :nulo" name="Actividad5" value="" >
                    <label for="Nota">Nota 5:</label>
                    <input type="text" id="Nota5" name="Nota5" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 5:</label>
                    <input type="text" id="Porcentaje5" name="Porcentaje5" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 5:</label>
                    <input type="text" id="NotaFinal5" name="NotaFinal5" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 6:</label>
                    <input type="text"  id="Actividad6" class=":required :nulo" name="Actividad6" value="" >
                    <label for="Nota">Nota 6:</label>
                    <input type="text" id="Nota6" name="Nota6" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 6:</label>
                    <input type="text" id="Porcentaje6" name="Porcentaje6" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 6:</label>
                    <input type="text" id="NotaFinal6" name="NotaFinal6" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 7:</label>
                    <input type="text"  id="Actividad7" class=":required :nulo" name="Actividad7" value="" >
                    <label for="Nota">Nota 7:</label>
                    <input type="text" id="Nota7" name="Nota7" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 7:</label>
                    <input type="text" id="Porcentaje7" name="Porcentaje7" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 7:</label>
                    <input type="text" id="NotaFinal7" name="NotaFinal7" value=""  readonly=""><br>
                </fieldset>
               	<fieldset>
                    <label for="Nota">Actividad 8:</label>
                    <input type="text"  id="Actividad8" class=":required :nulo" name="Actividad8" value="" >
                    <label for="Nota">Nota 8:</label>
                    <input type="text" id="Nota8" name="Nota8" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 8:</label>
                    <input type="text" id="Porcentaje8" name="Porcentaje8" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 8:</label>
                    <input type="text" id="NotaFinal8" name="NotaFinal8" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 9:</label>
                    <input type="text"  id="Actividad9" class=":required :nulo" name="Actividad9" value="" >
                    <label for="Nota">Nota 9:</label>
                    <input type="text" id="Nota9" name="Nota9" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 9:</label>
                    <input type="text" id="Porcentaje9" name="Porcentaje9" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 9:</label>
                    <input type="text" id="NotaFinal9" name="NotaFinal9" value=""  readonly=""><br>
                </fieldset>
                <fieldset>
                    <label for="Nota">Actividad 10:</label>
                    <input type="text"  id="Actividad10" class=":required :nulo" name="Actividad10" value="" >
                    <label for="Nota">Nota 10:</label>
                    <input type="text" id="Nota10" name="Nota10" class=":number :float :Valnulo" value="" >
                    <label for="Nota">Porcentaje 10:</label>
                    <input type="text" id="Porcentaje10" name="Porcentaje10" class=":number :integer :Valnulo" value="" >
                    <label for="Nota">Nota Final 10:</label>
                    <input type="text" id="NotaFinal10" name="NotaFinal10" value=""  readonly=""><br>
                </fieldset>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
