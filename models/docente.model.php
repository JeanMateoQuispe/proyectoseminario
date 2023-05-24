<?php

require_once 'conexion.php';

class Docente extends Conexion{

  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarDocentes(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM docentes");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}