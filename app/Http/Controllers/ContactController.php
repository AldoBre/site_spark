<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Mail\ConfirmSendEmail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'seguimento' => 'required',
            'servico' => 'required',
            'duvida' => 'required',
        ]);

        Mail::to('contato@belmiratech.com.br')->send(new ContactForm($request));
        Mail::to($request->email)->send(new ConfirmSendEmail($request));

        return response()->json(['message' => 'E-mail enviado com sucesso!']);
    }
}
