<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\User as Usuario;
use Session;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Usuario::all();
        return view('User.index',['usuarios'=>Usuario::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
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
            'nombre'=>'string|required',
            'telefono'=>'string|required',
            'correo'=>'email|required|unique:Usuario',
            'password'=>'string|required',
            ]);

        Usuario::create([
            'nombre'=>$request->nombre,
            'correo'=>$request->correo,
            'telefono'=>$request->telefono,
            'password'=>bcrypt($request->password)]);
        $request->session()->flash('create','El ususario '.$request->nombre.' ha sido creado satisfactoriamente');
        return redirect('/admin/User');
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
        //return Usuario::find($id);
        
    return view('User.edit',['user'=>Usuario::find($id)]);
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
            'nombre'=>'string|required',
            'telefono'=>'string|required',
            'correo'=>'email|required|unique:Usuario,correo,'.$id,
            'password'=>'string|required',
        ]);  
        $user=Usuario::find($id);
        $user->nombre=$request->nombre;
        $user->telefono=$request->telefono;
        $user->correo=$request->correo;
        $user->password=bcrypt($request->password);
        $user->save();
        $request->session()->flash('update','El ususario '.$request->nombre.' ha sido modificado con exito');
        return redirect('/admin/User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
    $user=Usuario::find($id);
    $request->session()->flash('delete','El ususario '.$user->nombre.' ha sido eliminado con exito');
    //Session::flash('delete','El ususario '.$user->nombre.' ha sido eliminado con exito');
    $user->delete();
    ///Usuario::destroy(array());   ids
    return redirect('/admin/User');

    }
}
