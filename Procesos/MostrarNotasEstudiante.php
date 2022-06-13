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
        <link rel="stylesheet" type="text/css" href="../Js/CSS/cssHorizontal.css" media="screen, tv, projection, print" />
     <link rel="stylesheet" type="text/css" href="../Js/CSS/style.css" media="screen, tv, projection, print" />
        <link rel="stylesheet" type="text/css" href="../Js/CSS/tablas.css" media="screen, tv, projection, print" />
    
    </head>
    <body>
         <?php
        session_start();
        if ($_SESSION["TipUser"] == 2) {
            echo "<p class='usuario'>Bienvenid@ " . $_SESSION["CodigoEstu"] . " " . $_SESSION["NombreEstu"] . " " . $_SESSION["ApellidosEstu"];
            echo" <a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";
            $CodigoNotaEstudiante = $_SESSION["CodigoEstudiante"];
            ?>
        <table border="2px"> 
            <tbody>
                <tr>
                    <td>Materia</td>
                    <td>Codigo</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Actividad</td>
                    <td>Porcentaje</td>
                    <td>Nota</td>
                    <td>Promedio Obtenido</td>
                    <td>Nota Total</td>
                    <td>Estado</td>
                </tr>
                <tr>
                    <?php
                    $sql = "SELECT materia.NombreMateria,
       materia.CodMateriaAnio,
       notasmaterias.Actividad1,
       notasmaterias.Porcentaje1,
       notasmaterias.Nota1,
       notasmaterias.NotaFnl1,
       notasmaterias.Actividad2,
       notasmaterias.Porcentaje2,
       notasmaterias.Nota2,
       notasmaterias.NotaFnl2,
       notasmaterias.Actividad3,
       notasmaterias.Porcentaje3,
       notasmaterias.Nota3,
       notasmaterias.NotaFnl3,
       notasmaterias.Actividad4,
       notasmaterias.Porcentaje4,
       notasmaterias.Nota4,
       notasmaterias.NotaFnl4,
       notasmaterias.Actividad5,
       notasmaterias.Porcentaje5,
       notasmaterias.Nota5,
       notasmaterias.NotaFnl5,
       notasmaterias.Actividad6,
       notasmaterias.Porcentaje6,
       notasmaterias.Nota6,
       notasmaterias.NotaFnl6,
       notasmaterias.Actividad7,
       notasmaterias.Porcentaje7,
       notasmaterias.Nota7,
       notasmaterias.NotaFnl7,
       notasmaterias.Actividad8,
       notasmaterias.Porcentaje8,
       notasmaterias.Nota8,
       notasmaterias.NotaFnl8,
       notasmaterias.Actividad9,
       notasmaterias.Porcentaje9,
       notasmaterias.Nota9,
       notasmaterias.NotaFnl9,
       notasmaterias.Actividad10,
       notasmaterias.Porcentaje10,
       notasmaterias.Nota10,
       notasmaterias.NotaFnl10,
       notasmaterias.EstadoMateria,
       estudiante.CodigoEstudiante
  FROM (notas_asistencias_bd.notasmaterias notasmaterias
        INNER JOIN notas_asistencias_bd.estudiante estudiante
           ON (notasmaterias.CodEstudiante = estudiante.CodigoEstudiante))
       INNER JOIN notas_asistencias_bd.materia materia
          ON (notasmaterias.CodMateria = materia.CodMateriaAnio)
 WHERE estudiante.CodigoEstudiante = '$CodigoNotaEstudiante'";
                    $Regis1 = mysqli_query($con, $sql);
                    if (mysqli_num_rows($Regis1) > 0) {
                        // output data of each row
                        while ($ValRegis1 = mysqli_fetch_assoc($Regis1)) {
                            ?>
                        <tr>
                            <td><?php echo $ValRegis1["NombreMateria"]; ?></td>
                            <td><?php echo $ValRegis1["CodMateriaAnio"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad1"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje1"]; ?></td>
                            <td><?php echo $ValRegis1["Nota1"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl1"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad2"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje2"]; ?></td>
                            <td><?php echo $ValRegis1["Nota2"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl2"]; ?></td>
                         
                            <td><?php echo $ValRegis1["Actividad3"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje3"]; ?></td>
                            <td><?php echo $ValRegis1["Nota3"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl3"]; ?></td>
                        
                            <td><?php echo $ValRegis1["Actividad4"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje4"]; ?></td>
                            <td><?php echo $ValRegis1["Nota4"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl4"]; ?></td>
                         
                            <td><?php echo $ValRegis1["Actividad5"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje5"]; ?></td>
                            <td><?php echo $ValRegis1["Nota5"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl5"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad6"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje6"]; ?></td>
                            <td><?php echo $ValRegis1["Nota6"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl6"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad7"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje7"]; ?></td>
                            <td><?php echo $ValRegis1["Nota7"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl7"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad8"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje8"]; ?></td>
                            <td><?php echo $ValRegis1["Nota8"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl8"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad9"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje9"]; ?></td>
                            <td><?php echo $ValRegis1["Nota9"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl9"]; ?></td>
                       
                            <td><?php echo $ValRegis1["Actividad10"]; ?></td>
                            <td><?php echo $ValRegis1["Porcentaje10"]; ?></td>
                            <td><?php echo $ValRegis1["Nota10"]; ?></td>
                            <td><?php echo $ValRegis1["NotaFnl10"]; ?></td>
                           <?php $sumaNotaFinal = ($ValRegis1["NotaFnl1"]+$ValRegis1["NotaFnl2"]+$ValRegis1["NotaFnl3"]+$ValRegis1["NotaFnl4"]+$ValRegis1["NotaFnl5"]+$ValRegis1["NotaFnl6"]+$ValRegis1["NotaFnl7"]+$ValRegis1["NotaFnl8"]+$ValRegis1["NotaFnl9"]+$ValRegis1["NotaFnl10"])?>
                            <td><?php echo $sumaNotaFinal; ?></td>
                            <td><?php echo $ValRegis1["EstadoMateria"]; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
            </table>
            <?php
            echo "0 results";
        }
         } else {
            echo "<p>No tienes permisos de gestion</>";
        }
        mysqli_close($con);
        ?>


    </body>
</html>
