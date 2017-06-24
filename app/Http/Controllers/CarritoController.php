<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CarritoController extends Controller
{
	public function __construct(){
		if(!Session::has('carrito')){
    		Session::put('carrito');
    	}
	}
    public function addCar(Request $request){
    	$carrito=Session::get('carrito');
//return $request->producto['precio'];
    	$producto=$request->producto;
    	$carrito[$request->id]=[
    		'id'=>$request->id,
    		'cantidad'=>1,
    		'precio'=>$producto['precio'],
    		'total'=>1*$producto['precio']
    	];
    	Session::forget('carrito');
    	Session::put('carrito',$carrito);
    	$arreglo=$this->allData($carrito);
    	$arreglo['carrito']=Session::get('carrito');
    	return $arreglo;

    }
    public function allData($carrito){
    	$totales=0;
    	$contador=0;

    	foreach ($carrito as $objeto) {
    		$totales+=$objeto['total'];
    		//return $objeto;
    		$contador++;
    	}
    	return ['totales'=>$totales,'no_Productos'=>$contador];
    }
    public function deleteItem(Request $request){
    	$carrito=Session::get('carrito');
    	unset($carrito[$request->id]);
    	Session::forget('carrito');
    	Session::put('carrito',$carrito);
    	$arreglo=$this->allData($carrito);
    	$arreglo['carrito']=Session::get('carrito');
    	return $arreglo;

    }
    public function destroy(Request $request){
    	Session::forget('carrito');
    	return 0;
    }
    public function getCar(Request $request){
    	if(!Session::has('carrito')){
    		Session::put('carrito');
    	}
    	$carrito=Session::get('carrito');
    	$arreglo=$this->allData($carrito);
    	$arreglo['carrito']=Session::get('carrito');
    	return $arreglo;

    }
}
