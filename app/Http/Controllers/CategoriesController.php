<?php

namespace App\Http\Controllers;


use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\products;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         /* Select * from products (ELOQUEN ORM DE LARAVEL) */
         $categories = categories::Select('categories.id','products.name_p','categories.name_category')
         ->join('products','products.id','=','categories.product_id')->get();
         return view('categories.index'  ,compact('categories'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = products::all('id','name_p');
        return view('categories.add' ,compact('products'));
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
        $categories=categories::create($input);
        return redirect()->route('categories.index', compact('categories'))->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = categories::find($id);
        return view('categories.show')->with('categories',$categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=products::all('id','name_p');
        $categories = categories::findOrFail($id);    
        return view('categories.edit', compact('categories','products'));
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
        $categories = categories::findOrFail($id);
        $input=$request->all();
        $categories->update($input);
        return redirect()->route('categories.index')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=categories::findOrFail($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('eliminar','Ok');
        //return $id_cat;
    }
}
