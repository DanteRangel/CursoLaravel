<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Direccion;
use Cotizador\Empresa;
use Session;
class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("Direccion.index",['direcciones'=>Direccion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Direccion.create",['empresas'=>Empresa::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'direccion_postal'=>'required|string',
            'id_empresa'=>'required|numeric',
            'longitud'=>'required|numeric',
            'latitud'=>'required|numeric',
            ]);
        $direccion=Direccion::create([
            'direccion_postal'=>$request->direccion_postal,
            'id_empresa'=>$request->id_empresa,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud
            ]);


        $request->session()->flash('create','La direccion '.$direccion->direccion_postal.' ha sido creada satisfactoriamente');
        return redirect('admin/Direccion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Direccion.edit',['empresas'=>Empresa::all(),'direccion'=>Direccion::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'direccion_postal'=>'required|string',
            'id_empresa'=>'required|numeric',
            'longitud'=>'required|numeric',
            'latitud'=>'required|numeric',
        ]);
        $direccion=Direccion::find($id);
        $direccion->direccion_postal=$request->direccion_postal;
        $direccion->id_empresa=$request->id_empresa;
        $direccion->latitud=$request->latitud;
        $direccion->longitud=$request->longitud;


        $request->session()->flash('update','La dirección '.$direccion->direccion_postal.' ha sido modificada satisfactoriamente');
        $direccion->save();
        return redirect('admin/Direccion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $direccion=Direccion::find($id);
        Session::flash('delete','La dirección '.$direccion->direccion_postal.' se ha eliminado satisfactoriamente');
        $direccion->delete();
        return redirect('admin/Direccion');

    }
}
