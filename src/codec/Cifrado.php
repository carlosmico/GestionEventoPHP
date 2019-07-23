<?php
namespace Geeks\codec;

class Cifrado{

    private $fraseArray=null;
    private $fraseSalida=null;
    private $alfabetoArray=null;
    private $alfabetoCesarArray=null;

    function __construct (){

    }

    private function frase2Array($frase){
        // Recorremos cada carácter de la cadena
        for($i=0;$i<strlen($frase);$i++){
            $this->fraseArray[]=$frase[$i];
        }
    }

    private function construirAlfabeto($paso){
        for($i=65;$i<91;$i++){
            $this->alfabetoArray[]=chr($i);
        }
        for($i=65+$paso;$i<91;$i++){
            $this->alfabetoCesarArray[]=chr($i);
        }
        for($i=65;$i<65+$paso;$i++){
            $this->alfabetoCesarArray[]=chr($i);
        }
    }

    function cesar($paso,$frase){
        $this->frase2Array(strtoupper($frase));
        $this->construirAlfabeto($paso);
        for($i=0;$i<count($this->fraseArray);$i++){
            $clave = array_search($this->fraseArray[$i], $this->alfabetoArray); 
            $this->fraseSalida[]=$this->alfabetoCesarArray[$clave];
        }
        return [$this->fraseArray,$this->fraseSalida];
    }
}