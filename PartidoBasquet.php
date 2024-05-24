<?php

include_once("Partido.php");

class PartidoBasquet extends Partido{
    private $cantInfracciones;
    private $coefPenalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $vCantidadInfracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$vCantidadInfracciones);
        $this->cantInfracciones = $vCantidadInfracciones;
        $this->coefPenalizacion = 0.75;
    }

    public function getCantidadInfracciones(){
        return $this->cantInfracciones;
    }
    public function getCoeficientePenalizacion(){
        return $this->coefPenalizacion;
    }

    public function setCantidadInfracciones($vCantidadInfracciones){
        $this->cantInfracciones = $vCantidadInfracciones;
    }
    public function setCoeficientePenalizacion($vCoefPenalizacion){
        $this->coefPenalizacion = $vCoefPenalizacion;
    }
     
    public function __toString()
    {
        $cadena = "\n".parent::__toString()."\n";
        $cadena.= "Cantidad de Infracciones: ".$this->getCantidadInfracciones();
        $cadena.= "Coeficiente de Penalización: ".$this->getCoeficientePenalizacion();
        return $cadena;
    }
}