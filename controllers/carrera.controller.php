<?php

require_once '../models/carrera.model.php';

if (isset($_POST['operacion'])){

  $carrera = new Carrera();

  if ($_POST['operacion'] == 'listar'){
    $datos = $carrera->listarCarreras();

    if($datos){
      echo json_encode($datos);
    }
  }
}
