<?php

include_once("Partido.php");

class PartidoFutbol extends Partido{
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores =0.13;   
        $this->coefJuveniles = 0.19;   
        $this->coefMayores = 0.27;   
    }

    public function getCoefMenores(){
        return $this->coefMenores;
    }
    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }
    public function getCoefMayores(){
        return $this->coefMayores;
    }

    public function setCoefMenores($vCoefMenores){
        $this->coefMenores = $vCoefMenores;
    }
    public function setCoefJuveniles($vCoefJuveniles){
        $this->coefJuveniles = $vCoefJuveniles;
    }
    public function setCoefMayores($vCoefMayores){
        $this->coefMayores = $vCoefMayores;
    }

    public function __toString()
    {
        $cadena = "\n".parent::__toString()."\n";
        $cadena.= "Coeficiente de Menores: ".$this->getCoefMenores();
        $cadena.= "Coeficiente de Juveniles: ".$this->getCoefJuveniles();
        $cadena.= "Coeficiente de Mayores: ".$this->getCoefMayores();
        return $cadena;
    }
}