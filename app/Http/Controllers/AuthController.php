<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $token = auth()->attempt($validated);
            return response()->json(['message' => 'Login bem-sucedido', 'token' => $token]);
        } else {

            $userExists = User::where('email', $validated['email'])->exists();

            if ($userExists) {
                return response()->json(['message' => 'E-mail ou senha inválidos'], 401);
            } else {
                return response()->json(['message' => 'Credenciais inválidas'], 401);
            }
        }

    }

    public function getUserData()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }
    }

    public function checkAuth(Request $request)
    {
        try{
            $token = $request->input('token');

            if($token && Auth::guard('api')->check()){
                return response()->json(['isValid' => true]);
            }else{
                return response()->json(['isValid' => false]);
            }
        }catch(\Exception $e){
            return response()->json(['isValid' => false]);
        }
    }

    public function logout(Request $request)
    {
        try{
            auth()->logout();

            return response()->json(['message' => 'Você saiu com sucesso!']);
        }catch(\Exception $e){
            return response()->json(['message' => 'Erro ao tentar sair'],500);
        }
    }
}
