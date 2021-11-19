<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticaController extends Controller
{
    public function register(Request $request){
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required',
        ]);
      
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
      
        return response()->json([
          'msg' => 'Ususari creat correctament'
        ], 200);
    }

    public function login(Request $request){

        $request->validate([
          'email' => 'required|email',
          'password' => 'required',
        ]);
      
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
          throw ValidationException::withMessages([
            'email' => ['Usuari o contressenya són incorrectes.'],
          ]);
        }
        
        $token = $user->createToken("paraula clau")->plainTextToken;

        return response()->json([
          'token' => $token,
          'msg' => 'Login correcte'
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
          'msg' => 'Logout correcte'
        ]);
    }
}
