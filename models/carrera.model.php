<?php

require_once 'conexion.php';

class Carrera extends Conexion{

  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarCarreras(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM carreras");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}