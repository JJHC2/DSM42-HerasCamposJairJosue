<?php

namespace App\Http\Controllers;

use App\Models\inventories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\usuarios;
use App\Models\products;

class inventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=$request->busqueda;
        /*Select * From inventories*/
        $inventories = inventories::Select('inventories.id','inventories.status','products.name_p','usuarios.name','inventories.product_id','inventories.usuario_id')
        ->join('products','products.id','=','inventories.product_id')->join('usuarios','usuarios.id','=','inventories.usuario_id')
        ->where('name','LIKE','%'.$busqueda.'%')->orWhere('name_p','LIKE','%'.$busqueda.'%')->paginate(50);
         $data = [
             'inventories'=>$inventories,
             'busqueda'=>$busqueda,
         ];
        return view('inventories.index' ,compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios=usuarios::all('id','name');
        $products=products::all('id','name_p');
        return view('inventories.add', compact('usuarios','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        inventories::create($input);
        return redirect('inventories')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventorie = inventories::find($id);
        return view('inventories.show')->with('inventories',$inventorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = products::all('id','name_p');
        $usuarios=usuarios::all('id','name');
        $inventories = inventories::findOrFail($id); 
        

        return view('inventories.edit', compact('inventories','products','usuarios'));
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
        $inventories = inventories::findOrFail($id);
        $input=$request->all();
        $inventories->update($input);
        return redirect()->route('inventories.index')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventories = inventories::find($id);
        $inventories->delete();
        return redirect()->route('inventories.index')->with('eliminar','Ok');
    }
}
