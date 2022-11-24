<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=$request->busqueda;
        /* Select * from products (ELOQUEN ORM DE LARAVEL) */
        $usuarios = usuarios::where('name','LIKE','%'.$busqueda.'%')->
        orWhere('phone_number','LIKE','%'.$busqueda.'%')->latest('id')->paginate(50);
        $data = [
            'usuarios'=>$usuarios,
            'busqueda'=>$busqueda,
        ];
        return view('usuarios.index'  ,compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.add');
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
        usuarios::create($input);
        return redirect()->route('usuarios.index')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = usuarios::find($id);
        return view('usuarios.show' ,compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = usuarios::all();
    
        $usuarios = usuarios::findOrFail($id); 
        

        return view('usuarios.edit', compact('usuarios'));
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
        $usuarios = usuarios::find($id);
        $input=$request->all();
        $usuarios->update($input);
        return redirect()->route('usuarios.index')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=usuarios::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('eliminar','Ok');
    }
}
