<?php

require_once 'conexion.php';

class Curso extends Conexion{

  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarCursos(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM cursos");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}