<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Marca;
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Marca/index',['marcas'=>Marca::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Marca/create');
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
            'descripcion'=>'required|string',
        ]);


        Marca::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
            ]);
        $request->session()->flash('create','La marca '.$request->nombre.' ha sido creada satisfactoriamente');
        return redirect('/admin/Marca');


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
        return view('Marca/edit',['marca'=>Marca::find($id)]);
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
            'descripcion'=>'required|string',
        ]);


        $marca=Marca::find($id);
        $marca->descripcion=$request->descripcion;
        $marca->nombre=$request->nombre;
        $request->session()->flash('update','La marca '.$request->nombre.' ha sido actualizada satisfactoriamente');
        $marca->save();
        return redirect('/admin/Marca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $marca=Marca::find($id);
        $request->session()->flash('delete','La marca '.$marca->nombre.' ha sido eliminada satisfactoriamente');
        $marca->delete();
        return redirect('/admin/Marca');

    }
}
