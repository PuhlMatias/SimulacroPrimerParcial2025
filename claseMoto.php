<?php
class Moto{
    //Atributos
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $incrementoAnual;
    private $activa;

    //Metodo constructor
    public function __construct(
        $codigo,
        $costo,
        $anioFabricacion,
        $descripcion,
        $incrementoAnual,
        $activa)
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
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion=$anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function setIncrementoAnual($incrementoAnual){
        $this->incrementoAnual=$incrementoAnual;
    }
    public function setActiva($activa){
        $this->activa=$activa;
    }

    //Metodo toString
    public function __toString()
    {
        //Verificar si esta disponible
        $disponibilidad = $this->getActiva() ? 
        "Esta disponible" : "NO esta disponible";

        return "INFORMACION DE LA MOTO\n".
        "\nCodigo: " . $this->getCodigo().
        "\nCosto: ". $this->getCosto().
        "\nAño de fabricacion: ". $this->getAnioFabricacion().
        "\nDescripción: ". $this->getDescripcion().
        "\nIncremento anual: ". $this->getIncrementoAnual().
        "\nActiva: ". $disponibilidad;
    }
    
    /** Metodo para dar el precio de venta de la moto
     * @return float
     */
    public function darPrecioVenta(){
        $anio = date("Y");
        $aniosTranscurridos = $anio-$this->getAnioFabricacion();
        if($this->getActiva()==true){
            $venta = $this->getCosto()+$this->getCosto()*
            ($aniosTranscurridos*$this->getIncrementoAnual());
        }else{
            $venta = -1;
        }
        return $venta;
    }
}
?>