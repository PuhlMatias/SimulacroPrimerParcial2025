<?php
include_once "claseCliente.php";
include_once "claseVenta.php";
include_once "claseMoto.php";
include_once "claseEmpresa.php";

//Creamos 2 objCliente
$objCliente1 = new Cliente("Matias","Puhl",true,"DNI",46257237);
$objCliente2 = new Cliente("Walter","Heredia",true,"DNI",45347662);

//Creamos 2 objMoto
$objMoto1 = new Moto(11,2230000,2022,"Benelli imperiable 400",0.85,true);
$objMoto2 = new Moto(12,58400,2021,"Zanella zr 150 Ohc",0.70,true);
$objMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",0.55,false);

//Creamos arreglos con las motos y otro con los clientes
$coleccionDeClientes = [$objCliente1, $objCliente2];
$coleccionDeMotos =  [$objMoto1, $objMoto2, $objMoto3];

//Creamos un objEmpresa
$objEmpresa = new Empresa ("Alta Gama","Av Argenetina 123",$coleccionDeClientes,
$coleccionDeMotos,$ventasRealizadas=[]);

//Creamos una coleccion de codigos
$colCodigosMoto =  [11,12,13];
//Invocamos el metodo registrarVenta y lo mostramos 
$registroDeVenta = $objEmpresa->registrarVenta($colCodigosMoto,$objCliente2);



//Creamos una coleccion de codigos
$colCodigosMoto2 =  [0];
//Invocamos el metodo registrarVenta y lo mostramos 
$registroDeVenta2 = $objEmpresa->registrarVenta($colCodigosMoto2,$objCliente2);



//Creamos una coleccion de codigos
$colCodigosMoto3 =  [2];
//Invocamos el metodo registrarVenta y lo mostramos 
$registroDeVenta3 = $objEmpresa->registrarVenta($colCodigosMoto3,$objCliente2);


//Invocamos el metodo de retornarVentasXCliente
$ventasPorCliente = $objEmpresa->retornarVentasXCliente("DNI",46257237);
$ventasPorCliente2 = $objEmpresa->retornarVentasXCliente("DNI",45347662);

//Mostramos el objEmpresa
echo $objEmpresa . "\n";