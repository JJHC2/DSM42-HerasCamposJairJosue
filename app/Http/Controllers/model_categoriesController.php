<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\model_categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class model_categoriesController extends Controller
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
        $modelcat = model_categories::Select('model_categories.description','categories.name_category','model_categories.id')->join('categories','categories.id','=','model_categories.categories_id')
        ->where('description','LIKE','%'.$busqueda.'%')->orWhere('name_category','LIKE','%'.$busqueda.'%')->
        latest('id')->paginate(50);
        $data = [
            'modelcat'=>$modelcat,
            'busqueda'=>$busqueda,
        ];
        return view('model_categories.index'  ,compact('modelcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all('id','name_category');
        return view('model_categories.add' ,compact('categories'));
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
        model_categories::create($input);
        return redirect()->route('model_categories.index')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelcategorie = model_categories::find($id);
        return view('model_categories.show')->with('modelcategories',$modelcategorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categories=categories::all('id','name_category');
    
        $modelcate=model_categories::findOrFail($id); 
        
        return view('model_categories.edit', compact('modelcate','categories'));
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
        $modelcat = model_categories::findOrFail($id);
        $input=$request->all();
        $modelcat->update($input);
        return redirect()->route('model_categories.index')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelcat=model_categories::findOrFail($id);
        $modelcat->delete();
        return redirect()->route('model_categories.index')->with('eliminar','Ok');
    }
}
