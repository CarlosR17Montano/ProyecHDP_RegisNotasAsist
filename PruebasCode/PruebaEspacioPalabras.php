<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("../Conex.php");


        $sqlSelecConteMaterDoce = "SELECT COUNT(`DocenteAsigMat`) FROM `registrodocentemat` WHERE  `DocenteAsigMat`='CG20221-1'";
        $ObteConteo = mysqli_query($con, $sqlSelecConteMaterDoce);
        $RegisConteo = mysqli_fetch_array($ObteConteo);
            
        echo "Hola tengo ".$RegisConteo['COUNT(`DocenteAsigMat`)']."<br>";
        if ($RegisConteo['COUNT(`DocenteAsigMat`)'] <= 2) {
            echo "Aqui estra el insert".$RegisConteo['COUNT(`DocenteAsigMat`)'];
        } else {
            echo "Aqui solo se muestra";
        }