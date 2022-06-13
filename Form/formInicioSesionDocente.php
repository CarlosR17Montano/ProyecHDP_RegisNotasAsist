<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FORMULARIO DE SESION</title>
        <script type="text/javascript" src="../Js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="../Js/vanadium.js"></script>
        <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/formulario.css" media="screen, tv, projection, print" />

    </head>
    <body>
        <h1>INICIO DE SESION DOCENTE</h1> 
        <form  action = "../Procesos/InicioSesionDocente.php" method = "post">
       <fieldset>
      <label>Ingreso de Datos</label>
      <label for="NomDocen">Codigo:</label>
                <input type="text" class=":required" name="NomUsuario" value="" required><br>
      <label for="PassDocen">Password:</label>
                <input type="Password" class=":required" name="PassUsuario" value="" required><br>
      </fieldset>
      <button>Ingreso</button>
      </form>
    </body>
</html>
