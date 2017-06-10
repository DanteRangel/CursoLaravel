<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Direccion;
use Cotizador\Empresa;
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
            'id_empresa'=>'required|numeric'
            ]);
        $direccion=Direccion::create([
            'direccion_postal'=>$request->direccion_postal,
            'id_empresa'=>$request->id_empresa]);


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
        //
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
        //
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
        $request->session()->flash('delete','La direccion '.$direccion->direccion_postal.'  ha sido eliminada satisifactoriamente');
        $direccion->delete();


        return redirect('admin/Direccion');

    }
}
