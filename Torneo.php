<?php

class Torneo extends Partido{
    private $coleccionPartidos;
    private $partePremio;

    public function __construct(array $vColeccionPartidos, int $vPartePremio)
    {
        $this->coleccionPartidos = $vColeccionPartidos;
        $this->partePremio = $vPartePremio;
    }

    public function getColeccionPartidos() {
        return $this->coleccionPartidos;
    }
    public function getPartePremio() {
        return $this->partePremio;
    }

    public function setColeccionPartidos($vColeccionPartidos){
        $this->coleccionPartidos = $vColeccionPartidos;
    }
    public function setPartePremio($vPartePremio){
        $this->coleccionPartidos = $vPartePremio;
    }

    public function __toString()
    {
        $coleccion = $this->getColeccionPartidos();
        $cadena="------- COLECCIÓN DE PARTIDOS -------- \n";
        foreach($coleccion as $partido){
            $partidoo = $partido;
            return $partidoo;
        }
        $cadena .="\n-------------------------------\n";
        $cadena .="Parte del premio: $".$this->getPartePremio();
        return $cadena;
    }

    
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $partido = new Partido(1, $fecha, $OBJEquipo1, 2, $OBJEquipo2, 1);
        $Eq1=$partido->getObjEquipo1();
        $Eq2=$partido->getObjEquipo2();
        $cantJugadores1=$OBJEquipo1->getCantJugadores();
        $cantJugadores2=$OBJEquipo2->getCantJugadores();
        $catEquipo1=$OBJEquipo1->getObjCategoria();
        $catEquipo2=$OBJEquipo2->getObjCategoria();
        if($cantJugadores1==$cantJugadores2 && $catEquipo1==$catEquipo2){
           $ColeccionDePartidos = $this->getColeccionPartidos();
           $ColeccionDePartidos[] = $partido;
           $this->setColeccionPartidos($ColeccionDePartidos); 
        }   
        return $partido;
    }

    public function darGanadores($deporte){
        $coleccionPartidos=$this->getColeccionPartidos();
        $coleccionObjetos=[];
        foreach($coleccionPartidos as $partido){
            $ObjEqGanador=parent::darEquipoGanador();
            if($deporte == "Futbol" && $partido instanceof PartidoFutbol){
                $coleccionObjetos[] = $ObjEqGanador;
            }else if($deporte == "Basquet" && $partido instanceof PartidoBasquet){
                $coleccionObjetos[] = $ObjEqGanador;
            }
        }
        return $coleccionObjetos;
    }

    public function calcularPremioPartido($partido){
        $coeficientePartido=$partido->coeficientePartido();
        $importePremio= $this->getPartePremio();
        $EquipoGanador=$partido->darEquipoGanador();

        $premio = $coeficientePartido * $importePremio;

        $total = [ "Equipo Ganador" => $EquipoGanador,
                    "Premio: $" => $premio];
        return $total; 
    }
}