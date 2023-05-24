<?php
//Incorporamos el modelo (logica)
require_once '../models/matricula.model.php';

//si existe alguna operacion en curso
if(isset($_POST['operacion'])){
  //instaciamos la clase matricula
  $matricula = new Matricula();

  //si la operacion es listar
  if($_POST['operacion'] == 'listar'){
    //Ejecutamos el metodo y guardamos el resultado
    $datos = $matricula->listarMatriculas();

    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'registrar'){
    $datosGuardar = [
      "alumno"            => $_POST['alumno'],
      "fechanac"          => $_POST['fechanac'],
      "mundoc"            => $_POST['numdoc'],
      "iddocente"         => $_POST['iddocente'],
      "idcarrera"         => $_POST['idcarrera'],
      "periodo"           => $_POST['periodo'],
      "semestre"          => $_POST['semestre'],
      "fechainicio"       => $_POST['fechainicio'],
      "fechafinal"        => $_POST['fechafinal'],
      "pago"              => $_POST['pago']
    ];

    $respuesta = $plato->registrarMatriculas($datosGuardar);
    echo json_encode($respuesta );
  }

}