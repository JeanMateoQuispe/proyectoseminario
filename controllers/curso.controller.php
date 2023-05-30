<?php

require_once '../models/curso.model.php';

if (isset($_POST['operacion'])){

  $curso = new Curso();

  if ($_POST['operacion'] == 'listar'){
    $datos = $curso->listarCursos();

    if($datos){
      echo json_encode($datos);
    }
  }
}
