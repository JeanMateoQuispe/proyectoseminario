<?php
//Importar la conexion
require_once 'conexion.php';

//la clase matricula heredara los metodos de la clase conexion
class Matricula extends Conexion{

  //Almacena la conexion
  private $conexion;

  //Pasamos la conexion
  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarMatriculas(){
    try{
      //Preparamos la consulta
      $consulta = $this->conexion->prepare("CALL spu_listar_matricula()");
      //Ejecutamos la consulta
      $consulta->execute();

      //Presentaremos los datos obtenidos como ARRAY asociativo
      $tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);
      //Retornamos los datos obtenidos
      return $tabla;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

//   public function listarMatriculados($id_matricula){
//     try{
//       $consulta = $this->conexion->prepare("CALL spu_listar_matricula(?)");
//       $consulta->execute(array($id_matricula));
//       return $consulta->fetchAll(PDO::FETCH_ASSOC);
//     }
//     catch(Exception $e){
//       die($e->getMessage());
//     }

//   }

  public function registrarMatriculas($datos = []){
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];
    try{
      $consulta = $this->conexion->prepare("CALL spu_registrar_(?,?,?,?,?,?,?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["alumno"],
          $datos["fechanac"],
          $datos["numdoc"],
          $datos["iddocente"],
          $datos["idcarrera"],
          $datos["periodo"],
          $datos["semestre"],
          $datos["fechainicio"],
          $datos["fechafinal"],
          $datos["pago"]
 

        )
      );
    }
    catch(Exception $e){
      $respuesta["message"] = "No se ha podido completar el proceso. Código error: ". $e->getCode();
    }
    return $respuesta;
  }

  // public function registrarMatriculas($datos = []){
  //   $respuesta = [
  //     "status"  => false,
  //     "message" => ""
  //   ];
  //   try{
  //     $consulta = $this->conexion->prepare("CALL spu_registrar_matricula(?,?,?,?,?,?,?,?,?,?)");
  //     $respuesta["status"] = $consulta->execute(
  //       array(
  //         $datos["alumno"],
  //         $datos["fechanac"],
  //         $datos["numdoc"],
  //         $datos["iddocente"],
  //         $datos["idcarrera"],
  //         $datos["periodo"],
  //         $datos["semestre"],
  //         $datos["fechainicio"],
  //         $datos["fechafinal"],
  //         $datos["pago"]
  //       )
  //     );
  //   }
  //   catch(Exception $e){
  //     $respuesta["message"] = "No se ha podido completar el proceso. Código error: ". $e->getCode();
  //   }
  //   return $respuesta;
  // }
}