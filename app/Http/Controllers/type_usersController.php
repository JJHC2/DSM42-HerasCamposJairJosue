<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\type_user;
use App\Models\usuarios;
use Illuminate\Routing\Controller;

class type_usersController extends Controller
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
        $typeuser = type_user::Select('type_users.id','type_users.type','usuarios.name')
        ->join('usuarios','usuarios.id','=','type_users.users_id')->where('type','LIKE','%'.$busqueda.'%')->orWhere('name','LIKE','%'.$busqueda.'%')->latest('id')->paginate(50);
        $data = [
            'typeuser'=>$typeuser,
            'busqueda'=>$busqueda,
        ];
        return view('type_user.index'  ,compact('typeuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = usuarios::all('id','name');
        return view('type_user.add' ,compact('usuarios'));
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
        $typeuser=type_user::create($input);
        return redirect()->route('type_user.index', compact('typeuser'))->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeuser = type_user::find($id);
        return view('type_user.show')->with('typeusers',$typeuser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios=usuarios::all('id','name');
    
        $typeuser = type_user::findOrFail($id); 
        

        return view('type_user.edit', compact('typeuser','usuarios'));
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
        $typeuser = type_user::findOrFail($id);
        $input=$request->all();
        $typeuser->update($input);
        return redirect()->route('type_user.index')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeuser = type_user::find($id);
        $typeuser->delete();
        return redirect()->route('type_user.index')->with('eliminar','Ok');
    }
}
