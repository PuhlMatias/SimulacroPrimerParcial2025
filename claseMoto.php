<?php
class Moto{
    //Atributos
    private int $codigo;
    private float $costo;
    private int $anioFabricacion;
    private string $descripcion;
    private float $incrementoAnual;
    private bool $activa;

    //Metodo constructor
    public function __construct(
        int $codigo,
        float $costo,
        int $anioFabricacion,
        string $descripcion,
        float $incrementoAnual,
        bool $activa)
    {
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->incrementoAnual=$incrementoAnual;
        $this->activa=$activa;
    }

    //METODOS DE ACCESO
    //getters
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getIncrementoAnual(){
        return $this->incrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }

    //setters
    public function setCodigo(int $codigo){
        $this->codigo=$codigo;
    }
    public function setCosto(float $costo){
        $this->costo=$costo;
    }
    public function setAnioFabricacion(int $anioFabricacion){
        $this->anioFabricacion=$anioFabricacion;
    }
    public function setDescripcion(string $descripcion){
        $this->descripcion=$descripcion;
    }
    public function setIncrementoAnual(float $incrementoAnual){
        $this->incrementoAnual=$incrementoAnual;
    }
    public function setActiva(bool $activa){
        $this->activa=$activa;
    }

    //Metodo toString
    public function __toString()
    {
        //Verificar si esta disponible
        $disponibilidad = $this->getActiva() ? 
        "Esta disponible" : "NO esta disponible";

        return "INFORMACION DE LA MOTO\n".
        "Codigo: " . $this->getCodigo().
        "Costo: ". $this->getCosto().
        "Año de fabricacion: ". $this->getAnioFabricacion().
        "Descripción: ". $this->getDescripcion().
        "Incremenro anual: ". $this->getIncrementoAnual().
        "Activa: ". $disponibilidad;
    }
}