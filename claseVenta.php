<?php
class Venta{
    //Atributos
    private int $numero;
    private string $fecha;
    private $cliente; //Referencia Obj cliente
    private $coleccionMotos; //Array obj motos
    private float $precioFinal;

    //Metodo constructor
    public function __construct(
        int $numero,
        string $fecha,
        $cliente,
        $coleccionMotos,
        float $precioFinal)
    {
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->cliente=$cliente;
        $this->coleccionMotos=$coleccionMotos;
        $this->precioFinal=$precioFinal;
    }

    //METODOS DE ACCESO
    //getters
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function getColccionMotos(){
        return $this->coleccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //setters
    public function setNumero(int $numero){
        $this->numero=$numero;
    }
    public function setFecha(string $fecha){
        $this->fecha=$fecha;
    }
    public function setReferenciaCliente($cliente){
        $this->cliente=$cliente;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setPrecioFinal(float $precioFinal){
        $this->precioFinal=$precioFinal;
    }

    //Metodo toString 
    public function __toString()
    {
        return "Número de venta: " . $this->getNumero().
        "Fecha: " . $this->getFecha().
        "Información del cliente: ". $this->getCliente().
        "Moto: ".
        "Precio final: " . $this->getPrecioFinal();
    }

}