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
}
