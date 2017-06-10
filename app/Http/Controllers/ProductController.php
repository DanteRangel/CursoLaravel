<?php

namespace Cotizador\Http\Controllers;

use Illuminate\Http\Request;
use Cotizador\Producto;
use Cotizador\Marca;
use Cotizador\Grupo;
use Storage;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Producto.index',['productos'=>Producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Producto.create',[
            'marcas'=>Marca::all(),'grupos'=>Grupo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //return public_path();
        //return storage_path('app');
        //return  app_path();
        //esto es para obtener todo el requeste sin las cabeceras de http
        //return $request->all();

        //$nombre=$request->file_image->getClientOriginalName();
        //$extencion=$request->file_image->extension();
        //return $nombre;

        //  GUARDANDO CON EL ELEMENTO REQUEST Y STORE Y STOREAS
        //$request->file_image->store('images','local'); 
        //return $request->file_image->storeAs('images',$nombre,'local');
        //echo $request->file_image->getRealPath();
        //  CREANDO BASE 64 DE REQUEST
        //return 'data:image/'.$extencion.';base64,'.base64_encode(file_get_contents($request->file_image->getRealPath()));
  /*      $request->file_image->storeAs('images',$nombre,'escritorio');
        if(!Storage::exists('/images/'.$nombre)){
            Storage::put('/img/'.$nombre,File::get($request->file_image));
        Storage::put('/images/'.$nombre,file_get_contents($request->file_image->getRealPath()));

        Storage::move('/images/'.$nombre,'/images2/'.$nombre);
        //Storage::disk('public')    
        Storage::copy('/images2/'.$nombre,'/images/'.$nombre);
        File::copy(storage_path('app').'/images/'.$nombre,'/home/danterangelrobles/Escritorio/'.'estesNuevoNombre.'.$extencion);
        File::copy('/home/danterangelrobles/Escritorio/Modelo_de_Datos_Cotizador.png',storage_path('app/images/'));
        return 1;
        }


        $directorios= Storage::allDirectories();

        foreach ($directorios as $key => $v) {
            if(Storage::disk('escritorio')->exists($v)){

            }else{
                Storage::disk('escritorio')->makeDirectory($v);
            }

        }
        
        return 0;

*/




     
        $this->validate($request,[
            'costo'=>'required|numeric',
            'precio'=>'required|numeric',
            'nombre'=>'required|string',
            'descripcion'=>'required|string',
            'file_image'=>'required|image',
            'id_marca'=>'required|integer',
            'id_grupo'=>'required|integer',
            'stock'=>'required|integer'
            ]);
            $ext=$request->file_image->extension();
            $base_64='data:image/'.$ext.';base64,'.base64_encode(File::get($request->file_image));
        $producto=Producto::create([
            'costo'=>$request->costo,
            'precio'=>$request->precio,
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'id_marca'=>$request->id_marca,
            'id_grupo'=>$request->id_grupo,
            'stock'=>$request->stock,
            'img'=>$base_64,
            ]);


        $request->session()->flash('create','Se ha creado el producto '.$request->nombre.' satisfactoriamente');

        return redirect('admin/Producto');

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
        $producto=Producto::find($id);
        return view('Producto.edit',['producto'=>$producto,
            'marcas'=>Marca::all(),'grupos'=>Grupo::all()]);   

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
            'costo'=>'required|numeric',
            'precio'=>'required|numeric',
            'nombre'=>'required|string',
            'descripcion'=>'required|string',
            'id_marca'=>'required|integer',
            'id_grupo'=>'required|integer',
            'stock'=>'required|integer'
            ]);

        $producto=Producto::find($id);
        if($request->file_image){
            $this->validate($request,[
                'file_image'=>'required|image']);
                //'file_image'=>'required|image|max:300|dimensions:ratio=640/200'
            $ext=$request->file_image->extension();
            $base_64='data:image/'.$ext.';base64,'.base64_encode(File::get($request->file_image));
            $producto->img=$base_64;
        }

        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->id_marca=$request->id_marca;
        $producto->id_grupo=$request->id_grupo;
        $producto->precio=$request->precio;
        $producto->costo=$request->costo;
        $producto->stock=$request->stock;
        $request->session()->flash('update','El producto '.$producto->nombre.' se ha actualizado satisfactoriamente');
        $producto->save();
        return redirect('admin/Producto');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $producto=Producto::find($id);


        $request->session()->flash('delete','El producto '.$producto->nombre.'  se ha eliminado satisfactoriamente');
        $producto->delete();
        return redirect('admin/Producto');
    }
}
