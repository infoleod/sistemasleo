<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Image;
use App\User;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtenemos el ultimo ID Product para cargar el nombre de la imageName
        $lastIdProduct = Product::all()->max('id');

        //Guardamos la imagen en el directorio publico con el nombre del producto
        $image = $request->image;
        $imageName = $lastIdProduct . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/products/';
        $image->move($imagePath, $imageName);

        //Obtenemos el ultimo Id guardado y le sumamos uno
        $lastIdImage = Image::all()->max('id');
        $insertIdImage = $lastIdImage + 1;

        //Guardamos la imagen en la tabla images
        Image::create([
            'id'          => $insertIdImage,
            'source'      => '/' . $imagePath . $imageName,
            'description' => 'Image uploaded from product ' . $insertIdImage
        ]);

        //Creamos y guardamos un nuevo producto
        $productTitle = $request->get('title');
        $product = new Product(array(
          'title'         => $productTitle,
          'slug'          => str_slug($productTitle),
          'description'   => $request->get('description'),
          'price'         => $request->get('price') * 100,
          'quant_sold'    => $request->get('quant_sold'),
          'user_id'       => Auth::user()->id,
          'category_id'   => $request->get('category_id'),
          'image_id'      => $insertIdImage
        ));
        $product->save();
        return redirect('product-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Traemos el producto por medio del id
        $product = Product::where('id', $id)->first();
        // Guardamos el tipo de formulario, si es Show, Edit o Delete
        $typeOfOperation = 'show';

        $userName = User::where('id', $product->user_id)->first();
        $userName = $userName->name;

        // los retornamos a la vista SHOW dentro de la carpeta PRODUCTS el elemento
        return view('product.show', compact('product','typeOfOperation' , 'userName'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Traemos el producto por medio del id
      $product = Product::where('id', $id)->first();
      // los retornamos a la vista edit dentro de la carpeta PRODUCTS el elemento
      return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update($id)
    public function update(Request $request, $id)
    {
      //busco el ID del Product para cargar el nombre de la imageName

      $idProduct = Product::find($id);

      if ($request->image) {

        //Guardamos la imagen en el directorio publico con el nombre del producto
        $image = $request->image;
        $imageName = $idProduct->id . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/products/';
        $image->move($imagePath, $imageName);

        //Obtenemos el ultimo Id guardado y le sumamos uno
        $lastIdImage = Image::all()->max('id');
        $insertIdImage = $lastIdImage + 1;

        //Guardamos la imagen en la tabla images
        Image::create([
          'id'          => $insertIdImage,
          'source'      => '/' . $imagePath . $imageName,
          'description' => 'Image uploaded from product ' . $insertIdImage
        ]);

      } else {
        //Mantenemos el mismo ID Imagen
        $insertIdImage = $idProduct->image_id;
      }

      $product = Product::find($id);

      $product->title = $request->title;
      $product->price = $request->price *100;
      $product->quant_sold = $request->quant_sold;
      $product->category_id=$request->category_id;
      $product->description = $request->description;
      $product->image_id = $insertIdImage;

      $product->save();

      return redirect('product-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId,$idUser)
    {
      $product = Product::find($productId);
      $product->delete();
      return redirect('profile');
    }
}
