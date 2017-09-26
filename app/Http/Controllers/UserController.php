<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
  public function showChangePass(){
    return view('users.change');
    }

  public function UpdateChangePass(Request $request)
  {

     $rules = [
         'mypassword' => 'required',
         'npassword' => 'required|confirmed|min:6|max:12',
     ];

     $messages = [
         'mypassword.required' => 'El campo es requerido',
         'npassword.required' => 'El campo es requerido',
         'npassword.confirmed' => 'Los passwords no coinciden',
         'npassword.min' => 'El mínimo permitido son 6 caracteres',
         'npassword.max' => 'El máximo permitido son 18 caracteres',
     ];

     $validator = Validator::make($request->all(), $rules, $messages);
     if ($validator->fails()){
         return redirect('change-pass-show')->withErrors($validator);
     }
     else{
         if (Hash::check($request->mypassword, Auth::user()->password)){
             $user = new User;
             $user->where('email', '=', Auth::user()->email)
                  ->update(['password' => bcrypt($request->npassword)]);
             return redirect('profile')->with('status', 'Password cambiado con éxito');
         }
         else
         {
             return redirect('change-pass-show')->with('message', 'Contraseña Incorrecta');
         }
     }
  }

}
