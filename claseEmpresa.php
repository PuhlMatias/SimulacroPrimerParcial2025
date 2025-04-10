<?php
class Empresa{
    //Atributos
    private string $denominacion;
    private string $direccion;
    private array $clientes; //Obj cliente
    private array $motos; //Obj motos
    private array $ventasHechas; //Obj ventas

    //Metodo constructor
    public function __construct(
        string $denominacion,
        string $direccion,
        array $clientes,
        array $motos,
        array $ventasHechas)
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
    public function setDenominacion(string $denominacion){
        $this->denominacion=$denominacion;
    }
    public function setDireccion(string $direccion){
        $this->direccion=$direccion;
    }
    public function setClientes(array $clientes){
        $this->clientes=$clientes;
    }
    public function setMotos(array $motos){
        $this->motos=$motos;
    }
    public function setVentasHechas(array $ventasHechas){
        $this->ventasHechas=$ventasHechas;
    }

    /** Metodo que retorna el obj moto que coincide con el codigoMoto
     * @param int $codigoMoto
     * @return objMoto/null
     */
    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
        foreach ($this->getMotos() as $moto) {
            if ($moto->getCodigo() == $codigoMoto) {
                $motoEncontrada = $moto;
                break; 
            }
        }
        return $motoEncontrada;
    }

/**
* Método que registra una venta a un cliente con una colección de códigos de moto.
* @param array $colCodigosMoto
* @param Cliente $objCliente
* @return float
*/
public function registrarVenta($colCodigosMoto, $objCliente) {
    $motosAVender = [];
    $precioFinal = 0;
    
    foreach ($colCodigosMoto as $codigo) {
        $moto = $this->retornarMoto($codigo);
        if ($moto !== null && $moto->getActiva()) {
            $motosAVender[] = $moto;
            $precioFinal += $moto->darPrecioVenta();
        }
    }
    if (count($motosAVender) > 0) {
        $nuevaVenta = new Venta(count($this->ventasHechas) + 1,"10/04/2025", $objCliente, $motosAVender, $precioFinal);
        $this->ventasHechas[] = $nuevaVenta;
        return $precioFinal;
    } else {
        return 0; // No se pudo concretar ninguna venta
    }
}

    /** Metodo que retorna las ventas realizaas al cliente
     * @param string $tipo
     * @param int $numDoc
     * @return array/string
     */
    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = [];

    foreach ($this->getVentasHechas() as $venta){
        $cliente = $venta->getCliente();
        if ($cliente->getTipoDocumento() == $tipo && 
        $cliente->getDocumento() == $numDoc){
            $ventasCliente[] = $venta;
        }
        }
        if (count($ventasCliente) > 0) {
            $ventas = $ventasCliente;
        }else{
            $ventas = "No se han realizado ventas a este cliente.";
        }
        return $ventas;
    }

    //Metodo toString
    public function __toString()
    {
        $infoClientes = "";
        foreach ($this->getClientes() as $cliente) {
            $infoClientes .= $cliente . "\n";
        }
    
        $infoMotos = "";
        foreach ($this->getMotos() as $moto) {
            $infoMotos .= $moto . "\n";
        }
    
        $infoVentas = "";
        foreach ($this->getVentasHechas() as $venta) {
            $infoVentas .= $venta . "\n";
        }
        return "\nDenominación: " . $this->getDenominacion().
        "\nDirección: " . $this->getDireccion().
        "\nClientes: ". $infoClientes.
        "\nMotos: " . $infoMotos.
        "\nVentas realizadas: ". $infoVentas;
    }
}