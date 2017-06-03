<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Grupo;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Grupo.index',['grupos'=>Grupo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Grupo.create');
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
            'nombre'=>'required|string'
            ]);
        Grupo::create([
            'nombre'=>$request->nombre
            ]);
        $request->session()->flash('create','El grupo '.$request->nombre.' ha sido guardado exitosamente');
        return redirect('/admin/Grupo');
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
        return view('Grupo/edit',['grupo'=>Grupo::find($id)]);
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
            'nombre'=>'required|string'
            ]);
        $grupo=Grupo::find($id);
        $grupo->nombre=$request->nombre;
        $request->session()->flash('update','El grupo '.$request->nombre.' ha sido guardado exitosamente');
        $grupo->save();
        return redirect('/admin/Grupo');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $grupo=Grupo::find($id);

        $request->session()->flash('delete','El grupo '.$grupo->nombre.' ha sido eliminado exitosamente');
        $grupo->delete();
        return redirect('admin/Grupo');
    }
}
