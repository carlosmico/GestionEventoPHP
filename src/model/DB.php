<?php
namespace Geeks\model;

$server = null;

class DB
{
  private $host = "";
  private $db = "";
  private $user = "";
  private $pass = "";

  public $conexion=null;
  public $resultado;

  function __construct()
  {

  }

  public function cargaConfiguracion(){
    if(isset($_ENV['DB_DATABASE'])){
      $this->host = "remotemysql.com";
      $this->db = "WL7EFoixXi";
      $this->user = "WL7EFoixXi";
      $this->pass = "EaXLYf4TyF";
    }else{
      $this->host = "localhost";
      $this->db = "ctoSummit";
      $this->user = "root";
      $this->pass = "";
    }
  }

  public function conectar(){

    $this->cargaConfiguracion();

    $error=null;
    try {
        $this->conexion = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
    } catch (PDOException $e) {
        $error=$e->getMessage();
    }
    return $error;
  }

  public function consultaSimple($query){
    $error=null;

    $this->resultado = $this->conexion->query($query)->fetchAll();

    return $error;
  }

  public function consultaPreparada($query,$params){
    $error=null;
    $sentencia = $this->conexion->prepare($query);
    $this->resultado=$sentencia;

    foreach ($params as $key => &$value) {
      $sentencia->bindParam($key, $value);
    }

    $error=$sentencia->execute();

    return $error;
  }
}

 ?>
