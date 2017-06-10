<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Empresa;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Empresa.index',['empresas'=>Empresa::all()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empresa.create');
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
            'nombre'=>'required|string',
            'razon_social'=>'required|string'
            ]);
        $empresa=Empresa::create([
            'nombre'=>$request->nombre,
            'razon_social'=>$request->razon_social]);
        $request->session()->flash('create','La empresa '.$empresa->nombre.' ha sido creada satisfactoriamente');
        return redirect('admin/Empresa');
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
        return view('Empresa.edit',['empresa'=>Empresa::find($id)]);
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
            'nombre'=>'required|string',
            'razon_social'=>'required|string'
        ]);
        $empresa=Empresa::find($id);
        $empresa->nombre=$request->nombre;
        $empresa->razon_social=$request->razon_social;
        $request->session()->flash('update','La empresa '.$empresa->nombre.' ha sido modificada satisfactoriamente');
        $empresa->save();
        return redirect('admin/Empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $empresa=Empresa::find($id);

        $request->session()->flash('delete','La empresa '.$empresa->nombre.' se ha eliminado satisfactoriamente');
        $empresa->delete();
        return redirect('admin/Empresa');
        
    }


}
