<?php
class Empresa{
    //Atributos
    private $denominacion;
    private $direccion;
    private $clientes; // array cliente
    private $motos; // array motos
    private $ventasHechas; // array ventas

    //Metodo constructor
    public function __construct(
        $denominacion,
        $direccion,
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

    /** Metodo que retorna el obj moto que coincide con el codigoMoto
     * @param int $codigoMoto
     * @return objMoto/null
     */
    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
        $contador = count($this->getMotos());
        $encontrado = false;
        $i = 0;
        $motos = $this->getMotos();
        while($i < $contador && !$encontrado){
            if ($motos[$i]->getCodigo() == $codigoMoto) {
                $motoEncontrada = $motos[$i];
                $encontrado = true;
            }
            $i++;
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
        if ($moto != null && $moto->getActiva()) {
            $motosAVender[] = $moto;
            $precioFinal += $moto->darPrecioVenta();
        }
    }
    if (count($motosAVender) > 0) {
        $nuevaVenta = new Venta(count($this->getVentasHechas()) + 1,"10/04/2025", $objCliente,);
        $ventasReali = $this->getVentasHechas();
        $ventasReali[]= $nuevaVenta;
        foreach($colCodigosMoto as $unaMoto){
            $nuevaVenta->incorporarMoto($unaMoto);
        }
        $precioFinal = $nuevaVenta->getPrecioFinal();
    } 
    return $precioFinal;
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
        if ($cliente->getTipoDocumento() == $tipo && $cliente->getDocumento() == $numDoc){
            $ventasCliente[] = $venta;
        }
        }
        return $ventasCliente;
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