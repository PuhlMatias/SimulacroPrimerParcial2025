<?php
include_once 'claseMoto.php';
include_once 'claseVenta.php';
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

    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
        $motos = $this->getMotos();
        $cantidad = count($motos);
        $i = 0;
        $encontrado = false;
    
        while ($i < $cantidad && !$encontrado) {
            $motoActual = $motos[$i]; // accedo a la moto por índice
            if ($motoActual->getCodigo() == $codigoMoto) {
                $motoEncontrada = $motoActual;
                $encontrado = true;
            }
            $i++;
        }
    
        return $motoEncontrada;
    }

public function registrarVenta($colCodigosMoto, $objCliente) {
    $importeFinal = 0;
    $colMotos = [];

    $objVenta = null;
    if($objCliente->getEstadoDeBaja()){
        foreach ($colCodigosMoto as $codigo){
            $objMoto = $this->retornarMoto($codigo);
            if($objMoto != null &&  $objMoto->getActiva()){
                $colMotos[] = $objMoto;
            }
        }
    }
    if(count($colMotos)>0){
        $cantVenta = count($this->getVentasHechas());
        $objVenta = new Venta($cantVenta+1,date("Y"),$objCliente);
        foreach($colMotos as $unaMoto){
            $objVenta->incorporarMoto($unaMoto);
        }
        $importeFinal = $objVenta->getPrecioFinal();
    }
    return $importeFinal;
}



public function retornarVentasXCliente($tipo,$numDoc){
        $colVentasCliente = array();
        $colVenta = $this->getVentasHechas();

    foreach ($colVenta as $venta){
        $objCliente = $venta->getCliente();

        if ($objCliente->getTipoDocumento() == $tipo && $objCliente->getDocumento() == $numDoc){
            $colVentasCliente = array_push($colVentasCliente,$venta);
        }
    }
    return $colVentasCliente;
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