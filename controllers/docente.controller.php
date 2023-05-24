<?php

require_once '../models/docente.model.php';

if (isset($_POST['operacion'])){

  $docente = new Docente();

  if ($_POST['operacion'] == 'listar'){
    $datos = $docente->listarDocentes();

    if($datos){
      echo json_encode($datos);
    }
  }
}
