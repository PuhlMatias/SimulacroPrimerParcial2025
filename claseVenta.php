<?php
class Venta{
    //Atributos
    private $numero;
    private $fecha;
    private $cliente; //Referencia Obj cliente
    private $coleccionMotos; //Array de motos
    private $precioFinal;

    //Metodo constructor
    public function __construct(
        $numero,
        $fecha,
        $cliente,
        )
    {
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->cliente=$cliente;
        $this->coleccionMotos=[];
        $this->precioFinal=0;
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
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //setters
    public function setNumero($numero){
        $this->numero=$numero;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function setReferenciaCliente($cliente){
        $this->cliente=$cliente;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal=$precioFinal;
    }

    //Metodo toString 
    public function __toString()
    {
        $infoMotos = "";
        foreach ($this->getColeccionMotos() as $moto) {
            $infoMotos .= $moto . "\n";
        }

        return "\nNúmero de venta: " . $this->getNumero().
        "\nFecha: " . $this->getFecha().
        "\nInformación del cliente: ". $this->getCliente().
        "\nMotos: ". $infoMotos .
        "\nPrecio final: " . $this->getPrecioFinal();
    }

    /** Metodo que agregar una moto a la coleccion y la retorna
     * @param Moto $objMoto
     * @return array
     */
    public function incorporarMoto($objMoto){
        $retorno = false;
        $activa = $objMoto->getActiva();
        if ($activa)
        {
            // Guardo la moto que entra en un array
            $coleccion = $this->getColeccionMotos(); # Obtengo 
            $coleccion[] = $objMoto; # Almaceno
            $this->setColeccionMotos($coleccion); # Modifico
            // Actualizacion de la variable precioFinal con la funcion darPrecioVenta
            $precioMoto = $objMoto->darPrecioVenta(); # Obtengo el precio de venta
            $precio = $this->getPrecioFinal(); # Obtengo el precio final
            $this->setPrecioFinal($precio + $precioMoto); # Actualizo el precio final
            $retorno = true;
        }
        return $retorno;

    }

}