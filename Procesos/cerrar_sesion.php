<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 session_start();
  unset($_SESSION["CodigoDocente"]); 
    session_destroy();
  header("Location: https://campus.ues.edu.sv/login/index.php");
  exit;
  