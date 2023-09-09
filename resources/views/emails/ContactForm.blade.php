@extends('layouts.layoutEmail')

@section('content')
<p>Nome: <b>{{ $data['nome'] }}</b></p>
<p>Email: <b>{{ $data['email'] }}</b> </p>
<p>Telefone: <b>{{ $data['telefone'] }}</b></p>
<p>Seguimento: <b>{{ $data['seguimento'] }}</b></p>
<p>Serviço: <b>{{ $data['servico'] }}</b></p>
<p>Dúvida: <b>{{ $data['duvida'] }}</b></p>
@endsection
