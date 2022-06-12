<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />
        <meta charset="UTF-8">
        <script type="text/javascript">
            $(document).ready(function () {
                $('#Nota1').on('keyup', function () {
                    var Nota1 = $('#Nota1').val();
                    $('#Porcentaje1').on('keyup', function () {
                        var Porcentaje1 = $('#Porcentaje1').val();
                        NotaFinl = (parseFloat(Nota1) * parseFloat(Porcentaje1)) / 100;
                        $('#NotaFinal1').val((NotaFinl).toFixed(2));
                        //Calculos para el primer bloque de notas 1 
                   });
                });
                
            });
            
            $(function () {
                    $("#id_categoria").change(function () {
                        if ($(this).val() === "1") {
                            $("#Actividad1").prop("disabled", true);
                            $("#Actividad1").val("");
                            $("#Nota1").prop("disabled", true);
                            $("#Nota1").val("");
                            $("#Porcentaje1").prop("disabled", true);
                            $("#Porcentaje1").val("");
                            $("#NotaFinal1").val("");
                        } else {
                            $("#Actividad1").prop("disabled", false);
                            $("#Nota1").prop("disabled", false);
                            $("#Porcentaje1").prop("disabled", false);
                        }
                    });
                });
        </script>
        <title>FORMULARIO DE INGRESO DE NOTAS</title>
    </head>
    <body>
        <form name="formDocenteAgregar" action="../Procesos/ProcesoRegistroDocente.php" method="POST">
            <fieldset>
                <legend>Ingreso de Notas</legend>
                <select id='id_categoria'>
                    <option value="1" selected>Desactivador</option>
                    <option value="2">Activar</option>
                </select>
                <label for="Nota">Actividad 1:</label>
                <input type="text"  id="Actividad1"  name="Activiidad" value="" disabled="">
                <label for="Nota">Nota 1:</label>
                <input type="text"  id="Nota1" name="Nota" value=""  disabled="">
                <label for="Nota">Porcentaje 1:</label>
                <input type="text" class="" id="Porcentaje1" name="Nota" value="" disabled="">
                <label for="Nota">Nota Final 1:</label>
                <input type="text" class="" id="NotaFinal1" name="Nota" value="" disabled=""><br>

            </fieldset>
            <input type="submit" value="Enviar">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
