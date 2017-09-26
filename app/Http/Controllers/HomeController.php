<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('profile');
    }
    public function product()
    {
      return view('product.product-list');
    }
    public function edit()
    {
      return view('profile-edit');
    }
    public function category()
    {
      $categoriesNameList = Category::pluck('name','slug');
      return $categoriesNameList;
    }
    public function update(Request $request){
      //busco el ID del User para cargar el nombre de la imageName
      $idUser = Auth::user();

      if ($request->image) {

        //Guardamos la imagen en el directorio publico con el nombre del usuario
        $image = $request->image;
        $imageName = $idUser->id . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/profile/';
        $image->move($imagePath, $imageName);

        //Obtenemos el ultimo Id guardado y le sumamos uno
        $lastIdImage = Image::all()->max('id');
        $insertIdImage = $lastIdImage + 1;

        //Guardamos la imagen en la tabla images
        Image::create([
          'id'          => $insertIdImage,
          'source'      => '/' . $imagePath . $imageName,
          'description' => 'Image uploaded from user ' . $insertIdImage
        ]);

      } else {
        //Mantenemos el mismo ID Imagen
        $user = Auth::user();
        $insertIdImage = $user->image_id;
      }
      $user = Auth::user();

      $user->name= $request->name;
      $user->surname= $request->surname;
      $user->email= $request->email;
      $user->phone= $request->phone;
      $user->image_id= $insertIdImage;

      $user->save();

      return redirect('profile');
    }

}
