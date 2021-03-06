<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>FORMULARIO DE INGRESO DE DOCENTE</title>
        <script type="text/javascript" src="../Js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <h2>FORMULARIO DE INGRESO DE DOCENTE</h2>
    
            <form name="formDocenteAgregar" action="../Procesos/ProcesoRegistroDocente.php" method="POST">
                <fieldset>
                    <legend>Datos del Docente</legend>
                    <label for="NomDocen">Nombres del Docente:</label>
                    <input type="text" class=":required :alpha" id="NomDocen" name="NomDocen" value="" required><br>
                    <label for="PriApeDocen">Primer Apellido del Docente:</label>
                    <input type="text" class=":required :alpha" id="ApeDocen" name="PriApeDocen" value="" required><br>
                    <label for="SegApeDocen">Segundo Apellido del Docente:</label>
                    <input type="text" class=":required :alpha" id="ApeDocen" name="SegApeDocen" value="" required><br>
                    <label for="DUIDocen">DUI Docente:</label>
                    <input type="text" class=":required :number :length;9" id="DUIDocen" name="DUIDocen" value="" required><br>
                    <label for="PassDocen">Password Docente:</label>
                    <input type="Password" class=":required" id="PassDocen" name="PassDocen" value="" required><br>
                    <label for="RePassDocen">Reconfirmar Password Docente:</label>
                    <input type="Password" class=":same_as;PassDocen :required" id="RePassDocen" name="PassDocen" value=""required><br>
                    <label for="TelMovDocen">Telefono Movil:</label>
                    <input type="text" class=":Movil :required :length;8" id="TelMovDocen" name="TelMovDocen" value="" required><br>
                    <label for="EmailDocen">Email Docente:</label>
                    <input type="text" class=":email :required" id="EmailDocen" name="EmailDocen" value="" required><br>
                </fieldset>
                <fieldset>
                    <legend>Seleccion de Genero:</legend>
                    <div>
                        <select id="GeneroDocen" class=":required" name="SexoDocen">
                            <option value="">Seleccionar</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>

                        </select>
                    </div>

                </fieldset>
                <input type="submit" value="Enviar">
            </form>

            <?php
        
        ?>      
    </body>
</html>
