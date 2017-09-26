<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         // Traemos los productos
        //  $products = Product::with('category')->paginate(10);
         $products = Product::paginate(10);
         // los retornamos a la vista LIST dentro de la carpeta PRODUCTS
         return view('product.list', compact('products'));
     }


     // Creamos una funcion para traernos las categorias de ese producto
     public function byCategory($slug)
     {
         // Traemos el primer registro que traiga el Where
         $products = Category::where('slug', $slug)->first()             // Traemos solo el primer registro
           ->products()          // Buscamos el metodo Products (se define dentro del modelo de Categoria es una funcion que trae el producto de ESA categoria)
           ->Paginate(10);       // Luego de todo esto lo paginamos

         // Guardamos el valor del Slug en la variable category_slug
         $category_slug = $products->first()->Category->name;

         // los retornamos a la vista LIST dentro de la carpeta PRODUCTS
         return view('product.list', compact('products','category_slug'));
     }

     // Creamos una funcion para traernos las categorias de ese producto
     public function titleSearch($titleSearch)
     {
         // Traemos el primer registro que traiga el Where
         $products = Product::where('title','like','%' . $titleSearch . '%')->Paginate(10);

         // los retornamos a la vista LIST dentro de la carpeta PRODUCTS
         return view('product.list', compact('products'));
     }

     public function pruebaHeader()
     {
         // RETORNAMOS SOLO HEADER PARA PRUEBAS
         return view('product.header');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
