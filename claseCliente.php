<?php
class Cliente{
    //Atributos
    private string $nombre;
    private string $apellido;
    private bool $estadoDeBaja;
    private string $tipoDocumento;
    private int $documento;

    //Metodo constructor
    public function __construct(
        string $nombre,
        string $apellido,
        bool $estadoDeBaja,
        string $tipoDocumento,
        int $documento)
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
    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }
    public function setApellido(string $apellido){
        $this->apellido=$apellido;
    }
    public function setEstadoDeBaja(bool $estadoDeBaja){
        $this->estadoDeBaja=$estadoDeBaja;
    }
    public function setTipoDocumento(string $tipoDocumento){
        $this->tipoDocumento=$tipoDocumento;
    }
    public function setDucumento(int $documento){
        $this->documento=$documento;
    }

    //Metodo toString
    public function __toString()
    {
        //Verificar si esta de baja
        $estadoBaja = $this->getEstadoDeBaja() ? 
        "Si está dado de baja" : "No está dado de baja";

        return "Nombre: " . $this->getNombre().
        "\nApellido: " . $this->getApellido().
        "Estado de baja: " . $estadoBaja.
        "Tipo de documento: " . $this->getTipoDocumento().
        "Documento: " . $this->getDocumento();
    }
}