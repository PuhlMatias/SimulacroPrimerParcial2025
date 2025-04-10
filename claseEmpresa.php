<?php
class Empresa{
    //Atributos
    private string $denominacion;
    private $direccion;
    private $clientes; //Obj cliente
    private $motos; //Obj motos
    private $ventasHechas; //Obj ventas

    //Metodo constructor
    public function __construct(
        string $denominacion,
        string $direccion,
        $clientes,
        $motos,
        $ventasHechas)
    {
        $this->denominacion=$denominacion;
        $this->direccion=$direccion;
        $this->clientes=$clientes;
        $this->motos=$motos;
        $this->ventasHechas=$ventasHechas;
    }

    //METODOS DE ACCESO
    //getters
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getClientes(){
        return $this->clientes;
    }
    public function getMotos(){
        return $this->motos;
    }
    public function getVentasHechas(){
        return $this->ventasHechas;
    }

    //setters
    public function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setClientes($clientes){
        $this->clientes=$clientes;
    }
    public function setMotos($motos){
        $this->motos=$motos;
    }
    public function setVentasHechas($ventasHechas){
        $this->ventasHechas=$ventasHechas;
    }

    //Metodo toString
    public function __toString()
    {
        return "Denominación: " . $this->getDenominacion().
        "Dirección: " . $this->getDireccion().
        "Clientes: ". $this->getClientes().
        "Motos: " . $this->getMotos().
        "Ventas realizadas: ". $this->getVentasHechas();
    }

}