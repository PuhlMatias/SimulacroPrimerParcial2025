<?php
class Cliente{
    //Atributos
    private $nombre;
    private $apellido;
    private $estadoDeBaja;
    private $tipoDocumento;
    private $documento;

    //Metodo constructor
    public function __construct(
        $nombre,
        $apellido,
        $estadoDeBaja,
        $tipoDocumento,
        $documento)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->estadoDeBaja=$estadoDeBaja;
        $this->tipoDocumento=$tipoDocumento;
        $this->documento=$documento;
    }

    //METODOS DE ACCESO
    //getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstadoDeBaja(){
        return $this->estadoDeBaja;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getDocumento(){
        return $this->documento;
    }

    //setters
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setEstadoDeBaja($estadoDeBaja){
        $this->estadoDeBaja=$estadoDeBaja;
    }
    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento=$tipoDocumento;
    }
    public function setDucumento($documento){
        $this->documento=$documento;
    }

    //Metodo toString
    public function __toString()
    {
        $estadoBaja = $this->getEstadoDeBaja() ? "NO esta de baja" : "SI esta de baja";
        return "\nNombre: " . $this->getNombre().
        "\nApellido: " . $this->getApellido().
        "\nEstado de baja: " . $estadoBaja.
        "\nTipo de documento: " . $this->getTipoDocumento().
        "\nDocumento: " . $this->getDocumento();
    }
}
?>