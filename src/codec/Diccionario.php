<?php
namespace Geeks\codec;

class Diccionario{
    private $diccionarioNombres=[
        "Luis",
        "Maria",
        "Pedro",
        "Juan",
        "Lucia",
        "Juande"
    ];

    function __construct (){

    }

    public function getNombre(){
        return $this->diccionarioNombres[rand(0,count($this->diccionarioNombres)-1)];
    }

}