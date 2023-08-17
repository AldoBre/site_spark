<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{


    public function sendResetPasswordLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
    ], [
        'email.exists' => 'O e-mail especificado não foi encontrado em nossa base de dados.',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'message' => 'E-mail não encontrado.'
        ], 404);
    }

    $token = Str::random(64);
    $now = Carbon::now();

    $existingToken = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->first();

    if ($existingToken) {
        $tokenCreatedAt = Carbon::parse($existingToken->created_at);
        // Verificar se o token existente ainda é válido antes de atualizar
        if ($now->diffInMinutes($tokenCreatedAt) <= 60) {
            // Atualizar o token
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => $now
                ]);
        } else {
            // O token existente está expirado, insira um novo token
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => $now
            ]);
        }
    } else {
        // Insira o novo token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => $now
        ]);
    }

    try {
        Notification::send($user, new ResetPasswordNotification($token));
        return response()->json([
            'message' => 'E-mail enviado com sucesso.'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Erro ao enviar e-mail.'
        ], 500);
    }
}

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();

        if(!$updatePassword){
            return response()->json(["message" => "Token inválido ou usuário não encontrado."], 500);
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return response()->json(["message" => "Senha Atualizada com sucesso"]);
    }
}
