<?php

namespace App\Http\Controllers;


use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class ProductsController extends Controller
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
        $productos = products::where('name_p','LIKE','%'.$busqueda.'%')->orWhere('color','LIKE','%'.$busqueda.'%')->
        orWhere('price','LIKE','%'.$busqueda.'%')->orWhere('size','LIKE','%'.$busqueda.'%')->orWhere('existence','LIKE','%'.$busqueda.'%')->
        orWhere('description','LIKE','%'.$busqueda.'%')->latest('id')->paginate(20);
        $data = [
            'products'=>$productos,
            'busqueda'=>$busqueda,
        ];
        return view('products.index'  ,compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        products::create($request->all());
            return redirect()->route('products.index')->with('agregar','Ok');
            // COn esto podemos ver lo que nos envia el formulario en un array
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
       $product = products::find($id);
      // return $product;
        return view('products.show' ,compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $products = products::all();
    
        $products = products::findOrFail($id); 
        

        return view('products.edit', compact('products'));
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
        $products = products::findOrFail($id);
        $input=$request->all();
        $products->update($input);
        return redirect()->route('products.index')->with('editar','Ok');
        //return view('products.index', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('eliminar','Ok');
    }
}
