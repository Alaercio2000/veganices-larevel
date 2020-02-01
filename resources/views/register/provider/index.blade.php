@extends('layouts.auth')

@section('title','Cadastro Profissional')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/register/style.css')}}">
@endsection

@section('content')
<h3 class="text-center font-weight-normal py-3">Cadastro Profissional</h3>
<form method="POST" class="p-3">
    @csrf
    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control" placeholder="Nome da empresa">
    </div>
    <div class="form-group">
        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail de acesso">
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
    </div>
    <div class="form-group">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repita a senha">
    </div>
    <div class="form-group">
        <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Digite o CNPJ">
    </div>
    <div class="form-group">
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone para contato">
    </div>
    <div class="form-group">
        <input class="btn btn-success w-100 mt-3" type="submit" value="Cadastrar">
    </div>

    <h6 class="py-2 text-secondary">
        Não é Profissional?
        <a href="{{route('register')}}"> Cadastrar-se</a>
    </h6>
</form>

@endsection
