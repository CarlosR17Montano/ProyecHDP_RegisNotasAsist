<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>FORMULARIO DE INGRESO DE ESTUDIANTE</title>
        <script type="text/javascript" src="../Js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
         <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <h2>FORMULARIO DE INGRESO DE ESTUDIANTE</h2>

   
        <form name="formEstudianteAgregar" action="../Procesos/ProcesoRegistroEstudiante.php" method="POST">
     <fieldset>
                <legend>Datos del Estudiante</legend>
                <label for="NomEstu">Nombres del Estudiante:</label>
                <input type="text" class=":required :alpha" id="NomEstu" name="NomEstu" value="" required><br>
                <label for="PriApeEstu">Primer Apellido del Estudiante:</label>
                <input type="text" class=":required :alpha" id="ApeEstu" name="PriApeEstu" value="" required><br>
                <label for="SegApeEstu">Segundo Apellido del Estudiante:</label>
                <input type="text" class=":required :alpha" id="ApeEstu" name="SegApeEstu" value="" required><br>
                <label for="DUIEstu">DUI Estudiante:</label>
                <input type="text" class=":required :number :length;9" id="DUIEstu" name="DUIEstu" value="" required><br>
                <label for="PassEstu">Password Estudiante:</label>
                <input type="Password" class=":required" id="PassEstu" name="PassEstu" value="" required><br>
                <label for="RePassEstu">Reconfirmar Password Estudiante:</label>
                <input type="Password" class=":same_as;PassEstu :required" id="RePassEstu" name="PassEstu" value=""required><br>
                <label for="TelMovEstu">Telefono Movil:</label>
                <input type="text" class=":Movil :required :length;8" id="TelMovEstu" name="TelMovEstu" value="" required><br>
                <label for="EmailEstu">Email Estudiante:</label>
                <input type="text" class=":email :required" id="EmailEstu" name="EmailEstu" value="" required><br>
                </fieldset>
                <fieldset>
                    <legend>Seleccion de Genero:</legend>
                    <div>
                        <select id="GeneroEstu" class=":required" name="SexoEstu">
                            <option value="">Seleccionar</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>

                        </select>
                    </div>

                </fieldset>
                <input type="submit" value="Enviar">
            </form>


    </body>
</html>
