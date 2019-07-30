<?php
namespace Geeks\model;

class DB
{
  // private $host = "remotemysql.com";
  // private $db = "WL7EFoixXi";
  // private $user = "WL7EFoixXi";
  // private $pass = "EaXLYf4TyF";

  private $host = "localhost";
  private $db = "ctoSummit";
  private $user = "root";
  private $pass = "";

  public $conexion=null;
  public $resultado;

  function __construct()
  {

  }


  public function conectar(){
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
